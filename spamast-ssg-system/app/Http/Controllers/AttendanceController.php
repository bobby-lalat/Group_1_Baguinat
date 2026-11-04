<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;

class AttendanceController extends Controller
{
    private const STATUSES = ['present', 'late', 'absent'];

    /**
     * The events module owns the events table. Find which column holds the event's name,
     * so this module keeps working whichever name the events developer chose.
     * Returns null when the events table does not exist yet.
     */
    private function eventTitleColumn(): ?string
    {
        if (! Schema::hasTable('events')) {
            return null;
        }

        foreach (['title', 'name', 'event_name'] as $column) {
            if (Schema::hasColumn('events', $column)) {
                return $column;
            }
        }

        return 'id';
    }

    private function events()
    {
        $column = $this->eventTitleColumn();

        if ($column === null) {
            return collect();
        }

        return DB::table('events')
            ->select('id', DB::raw("`{$column}` as label"))
            ->orderByDesc('id')
            ->get();
    }

    private function eventLabel(int $eventId): string
    {
        $column = $this->eventTitleColumn();

        if ($column === null) {
            return 'Event #' . $eventId;
        }

        $value = DB::table('events')->where('id', $eventId)->value($column);

        return $value !== null ? (string) $value : 'Event #' . $eventId;
    }

    private function timeOrderError(array $data): ?string
    {
        if (! empty($data['time_in']) && ! empty($data['time_out']) && $data['time_out'] < $data['time_in']) {
            return 'Time out cannot be earlier than time in.';
        }

        return null;
    }

    /** View attendance records (with optional filters). */
    public function index(Request $request)
    {
        $column = $this->eventTitleColumn();

        $query = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.student_id')
            ->select('attendances.*', 'users.name as student_name', 'users.email as student_email');

        if ($column !== null) {
            $query->leftJoin('events', 'events.id', '=', 'attendances.event_id')
                ->addSelect(DB::raw("events.`{$column}` as event_label"));
        }

        if ($request->filled('event_id')) {
            $query->where('attendances.event_id', $request->input('event_id'));
        }

        if ($request->filled('status') && in_array($request->input('status'), self::STATUSES, true)) {
            $query->where('attendances.status', $request->input('status'));
        }

        $records = $query->orderByDesc('attendances.created_at')->paginate(15)->withQueryString();

        return view('attendance.index', [
            'records' => $records,
            'events' => $this->events(),
            'statuses' => self::STATUSES,
        ]);
    }

    /** Show the "record attendance" form. */
    public function create()
    {
        return view('attendance.create', [
            'students' => DB::table('users')->orderBy('name')->get(['id', 'name', 'email']),
            'events' => $this->events(),
            'statuses' => self::STATUSES,
        ]);
    }

    /** Save a new attendance record linked to a student and an event. */
    public function store(Request $request)
    {
        $eventRules = ['required', 'integer'];
        if (Schema::hasTable('events')) {
            $eventRules[] = Rule::exists('events', 'id');
        }

        $data = $request->validate([
            'student_id' => ['required', 'integer', Rule::exists('users', 'id')],
            'event_id' => $eventRules,
            'status' => ['required', Rule::in(self::STATUSES)],
            'time_in' => ['nullable', 'date_format:H:i'],
            'time_out' => ['nullable', 'date_format:H:i'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ]);

        if ($error = $this->timeOrderError($data)) {
            return back()->withInput()->withErrors(['time_out' => $error]);
        }

        $alreadyRecorded = Attendance::where('student_id', $data['student_id'])
            ->where('event_id', $data['event_id'])
            ->exists();

        if ($alreadyRecorded) {
            return back()->withInput()->withErrors([
                'student_id' => 'This student already has an attendance record for this event.',
            ]);
        }

        Attendance::create($data);

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded.');
    }

    /** Show the edit form (used to add time out or fix the status). */
    public function edit(Attendance $attendance)
    {
        $student = DB::table('users')->where('id', $attendance->student_id)->first(['name', 'email']);

        return view('attendance.edit', [
            'attendance' => $attendance,
            'studentName' => $student->name ?? ('Student #' . $attendance->student_id),
            'eventLabel' => $this->eventLabel((int) $attendance->event_id),
            'statuses' => self::STATUSES,
        ]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(self::STATUSES)],
            'time_in' => ['nullable', 'date_format:H:i'],
            'time_out' => ['nullable', 'date_format:H:i'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ]);

        if ($error = $this->timeOrderError($data)) {
            return back()->withInput()->withErrors(['time_out' => $error]);
        }

        $attendance->update($data);

        return redirect()->route('attendance.index')->with('success', 'Attendance updated.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index')->with('success', 'Attendance record deleted.');
    }
}

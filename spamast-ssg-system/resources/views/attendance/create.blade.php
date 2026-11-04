@extends('attendance.layout')

@section('title', 'Record Attendance')

@section('content')
    <div class="head">
        <h1>Record Attendance</h1>
        <a class="btn ghost" href="{{ route('attendance.index') }}">&larr; Back to records</a>
    </div>

    @if ($events->isEmpty())
        <div class="alert warn">
            No events found. Attendance needs the events module's table (<code>events</code>) to exist and contain at least one event.
            Pull the latest work from the team, run <code>php artisan migrate</code>, and add an event first.
        </div>
    @endif

    <div class="card form-card">
        <form method="POST" action="{{ route('attendance.store') }}">
            @csrf

            <div class="field">
                <label for="student_id">Student</label>
                <select id="student_id" name="student_id" required>
                    <option value="">Select a student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @selected(old('student_id') == $student->id)>{{ $student->name }} ({{ $student->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="event_id">Event</label>
                <select id="event_id" name="event_id" required>
                    <option value="">Select an event</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" @selected(old('event_id') == $event->id)>{{ $event->label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" @selected(old('status', 'present') === $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="field">
                    <label for="time_in">Time in</label>
                    <input type="time" id="time_in" name="time_in" value="{{ old('time_in') }}">
                </div>
                <div class="field">
                    <label for="time_out">Time out</label>
                    <input type="time" id="time_out" name="time_out" value="{{ old('time_out') }}">
                </div>
            </div>

            <div class="field">
                <label for="remarks">Remarks (optional)</label>
                <textarea id="remarks" name="remarks" rows="2" maxlength="255">{{ old('remarks') }}</textarea>
            </div>

            <button class="btn" type="submit">Save attendance</button>
        </form>
    </div>

    <script>
        // Pre-fill "Time in" with the current local time when the form is first opened.
        (function () {
            var input = document.getElementById('time_in');
            if (input && !input.value) {
                var now = new Date();
                var h = String(now.getHours()).padStart(2, '0');
                var m = String(now.getMinutes()).padStart(2, '0');
                input.value = h + ':' + m;
            }
        })();
    </script>
@endsection

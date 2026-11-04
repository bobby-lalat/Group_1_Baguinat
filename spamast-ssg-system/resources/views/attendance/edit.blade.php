@extends('attendance.layout')

@section('title', 'Edit Attendance')

@section('content')
    <div class="head">
        <h1>Edit Attendance</h1>
        <a class="btn ghost" href="{{ route('attendance.index') }}">&larr; Back to records</a>
    </div>

    <div class="card form-card">
        <form method="POST" action="{{ route('attendance.update', $attendance->id) }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Student</label>
                <div class="readonly">{{ $studentName }}</div>
            </div>

            <div class="field">
                <label>Event</label>
                <div class="readonly">{{ $eventLabel }}</div>
            </div>

            <div class="field">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" @selected(old('status', $attendance->status) === $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="field">
                    <label for="time_in">Time in</label>
                    <input type="time" id="time_in" name="time_in" value="{{ old('time_in', $attendance->time_in ? substr($attendance->time_in, 0, 5) : '') }}">
                </div>
                <div class="field">
                    <label for="time_out">Time out</label>
                    <input type="time" id="time_out" name="time_out" value="{{ old('time_out', $attendance->time_out ? substr($attendance->time_out, 0, 5) : '') }}">
                </div>
            </div>

            <div class="field">
                <label for="remarks">Remarks (optional)</label>
                <textarea id="remarks" name="remarks" rows="2" maxlength="255">{{ old('remarks', $attendance->remarks) }}</textarea>
            </div>

            <button class="btn" type="submit">Save changes</button>
        </form>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Sanction | SPAMAST SSG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #1f2937;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 18px 0 7px;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            box-sizing: border-box;
            font: inherit;
        }

        textarea { min-height: 90px; }

        button, .back {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 18px;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font: inherit;
        }

        button { background: #176b4d; color: white; }
        .back { background: #e5e7eb; color: #1f2937; }
        .error { color: #b91c1c; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Sanction Record</h1>

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('sanctions.update', $sanction) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="student_id">Student ID *</label>
        <input id="student_id" name="student_id"
               value="{{ old('student_id', $sanction->student_id) }}" required maxlength="50">

        <label for="student_name">Student Name *</label>
        <input id="student_name" name="student_name"
               value="{{ old('student_name', $sanction->student_name) }}" required>

        <label for="event_name">Event Name *</label>
        <input id="event_name" name="event_name"
               value="{{ old('event_name', $sanction->event_name) }}" required>

        <label for="sanction_type">Applicable Sanction *</label>
        <select id="sanction_type" name="sanction_type" required>
            @foreach (['Warning', 'Community Service', 'Written Explanation', 'Other'] as $type)
                <option value="{{ $type }}" @selected(old('sanction_type', $sanction->sanction_type) === $type)>
                    {{ $type }}
                </option>
            @endforeach
        </select>

        <label for="reason">Reason / Violation</label>
        <textarea id="reason" name="reason">{{ old('reason', $sanction->reason) }}</textarea>

        <label for="sanction_date">Sanction Date</label>
        <input type="date" id="sanction_date" name="sanction_date"
               value="{{ old('sanction_date', $sanction->sanction_date?->format('Y-m-d')) }}">

        <label for="status">Status *</label>
        <select id="status" name="status" required>
            <option value="pending" @selected(old('status', $sanction->status) === 'pending')>Pending</option>
            <option value="in_progress" @selected(old('status', $sanction->status) === 'in_progress')>In Progress</option>
            <option value="completed" @selected(old('status', $sanction->status) === 'completed')>Completed</option>
        </select>

        <button type="submit">Update Sanction</button>
        <a class="back" href="{{ route('sanctions.index') }}">Cancel</a>
    </form>
</div>
</body>
</html>

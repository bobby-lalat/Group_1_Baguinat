<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Sanction | SPAMAST SSG</title>
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
            box-shadow: 0 2px 10px #0000000d;
        }
        h1 { color: #173b2d; }
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
        .actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }
        button, .back {
            border: 0;
            border-radius: 6px;
            padding: 12px 18px;
            font: inherit;
            cursor: pointer;
            text-decoration: none;
        }
        button { background: #176b4d; color: white; }
        .back { background: #e5e7eb; color: #1f2937; }
        .error { color: #b91c1c; font-size: 14px; }
        .errors {
            background: #fee2e2;
            padding: 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Add Sanction Record</h1>
    <p>Enter the student, event, and applicable sanction details.</p>

    @if ($errors->any())
        <div class="errors">
            <strong>Please correct the following:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sanctions.store') }}" method="POST">
        @csrf

        <label for="student_id">Student ID *</label>
        <input id="student_id" name="student_id" value="{{ old('student_id') }}" required maxlength="50">
        @error('student_id') <div class="error">{{ $message }}</div> @enderror

        <label for="student_name">Student Name *</label>
        <input id="student_name" name="student_name" value="{{ old('student_name') }}" required maxlength="255">
        @error('student_name') <div class="error">{{ $message }}</div> @enderror

        <label for="event_name">Event Name *</label>
        <input id="event_name" name="event_name" value="{{ old('event_name') }}" required maxlength="255">
        @error('event_name') <div class="error">{{ $message }}</div> @enderror

        <label for="sanction_type">Applicable Sanction *</label>
        <select id="sanction_type" name="sanction_type" required>
            <option value="">Select a sanction</option>
            <option value="Warning" @selected(old('sanction_type') === 'Warning')>Warning</option>
            <option value="Community Service" @selected(old('sanction_type') === 'Community Service')>Community Service</option>
            <option value="Written Explanation" @selected(old('sanction_type') === 'Written Explanation')>Written Explanation</option>
            <option value="Other" @selected(old('sanction_type') === 'Other')>Other</option>
        </select>
        @error('sanction_type') <div class="error">{{ $message }}</div> @enderror

        <label for="reason">Reason / Violation</label>
        <textarea id="reason" name="reason">{{ old('reason') }}</textarea>
        @error('reason') <div class="error">{{ $message }}</div> @enderror

        <label for="sanction_date">Sanction Date</label>
        <input type="date" id="sanction_date" name="sanction_date" value="{{ old('sanction_date') }}">
        @error('sanction_date') <div class="error">{{ $message }}</div> @enderror

        <label for="status">Status *</label>
        <select id="status" name="status" required>
            <option value="pending" @selected(old('status', 'pending') === 'pending')>Pending</option>
            <option value="in_progress" @selected(old('status') === 'in_progress')>In Progress</option>
            <option value="completed" @selected(old('status') === 'completed')>Completed</option>
        </select>
        @error('status') <div class="error">{{ $message }}</div> @enderror

        <div class="actions">
            <button type="submit">Save Sanction</button>
            <a class="back" href="{{ route('sanctions.index') }}">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>

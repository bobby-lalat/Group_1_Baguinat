<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sanctions Management | SPAMAST SSG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #1f2937;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #0000000d;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        h1 { margin-top: 0; color: #173b2d; }
        a.button {
            background: #176b4d;
            color: white;
            padding: 11px 16px;
            border-radius: 6px;
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 22px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }
        th { background: #edf4ef; }
        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #fef3c7;
            font-size: 12px;
        }
        .success {
            background: #dcfce7;
            padding: 12px;
            border-radius: 6px;
            margin: 15px 0;
        }
        .edit { color: #176b4d; font-weight: bold; }
        .empty { text-align: center; padding: 30px; color: #6b7280; }
        .table-wrap { overflow-x: auto; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <h1>Sanctions Management</h1>
            <p>SPAMAST Supreme Student Government</p>
        </div>
        <a class="button" href="{{ route('sanctions.create') }}">+ Add Sanction</a>
    </div>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="success">
            Please check the form for errors.
        </div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Event</th>
                <th>Sanction</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($sanctions as $sanction)
                <tr>
                    <td>{{ $sanction->student_id }}</td>
                    <td>{{ $sanction->student_name }}</td>
                    <td>{{ $sanction->event_name }}</td>
                    <td>{{ $sanction->sanction_type }}</td>
                    <td>{{ $sanction->sanction_date?->format('M d, Y') ?? '—' }}</td>
                    <td>
                        <span class="status">
                            {{ str($sanction->status)->replace('_', ' ')->title() }}
                        </span>
                    </td>
                    <td>
                        <a class="edit" href="{{ route('sanctions.edit', $sanction) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty">
                        No sanction records yet. Click "Add Sanction" to get started.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{ $sanctions->links() }}
</div>
</body>
</html>

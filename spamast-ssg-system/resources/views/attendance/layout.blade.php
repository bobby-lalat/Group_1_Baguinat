<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Attendance') - SPAMAST SSG</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f6ff; color: #1e293b; min-height: 100vh; }
        .top { background: #fff; display: flex; align-items: center; justify-content: space-between; padding: 16px 32px; box-shadow: 0 2px 10px rgba(30, 64, 175, .08); flex-wrap: wrap; gap: 12px; }
        .brand { color: #1d4ed8; font-weight: 700; font-size: 20px; }
        .brand span { display: block; font-size: 10px; letter-spacing: 3px; color: #64748b; font-weight: 600; }
        nav a { margin-left: 18px; color: #1e293b; text-decoration: none; font-weight: 600; font-size: 14px; }
        nav a:hover { color: #1d4ed8; }
        main { max-width: 1000px; margin: 32px auto; padding: 0 20px; }
        h1 { font-size: 24px; color: #1e2a5e; }
        .head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
        .card { background: #fff; border-radius: 16px; padding: 24px; box-shadow: 0 10px 30px rgba(30, 64, 175, .08); overflow-x: auto; }
        .btn { display: inline-block; background: #1d4ed8; color: #fff; border: none; padding: 10px 18px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; text-decoration: none; }
        .btn:hover { background: #1e40af; }
        .btn.ghost { background: #e8f0ff; color: #1d4ed8; }
        .btn.danger { background: #dc2626; }
        .btn.small { padding: 6px 12px; font-size: 13px; }
        .filters { display: flex; gap: 10px; margin-bottom: 18px; flex-wrap: wrap; }
        select, input, textarea { padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; font-family: inherit; background: #fff; }
        select:focus, input:focus, textarea:focus { outline: none; border-color: #1d4ed8; box-shadow: 0 0 0 3px rgba(29, 78, 216, .15); }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th { text-align: left; padding: 10px; color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px 10px; border-bottom: 1px solid #eef2f7; vertical-align: middle; }
        td small { display: block; color: #64748b; font-size: 12px; }
        .actions { display: flex; gap: 6px; }
        .badge { padding: 4px 10px; border-radius: 999px; font-size: 12px; font-weight: 700; }
        .badge.present { background: #dcfce7; color: #166534; }
        .badge.late { background: #fef3c7; color: #92400e; }
        .badge.absent { background: #fee2e2; color: #b91c1c; }
        .alert { padding: 12px 16px; border-radius: 10px; margin-bottom: 18px; font-size: 14px; }
        .alert.ok { background: #dcfce7; color: #166534; }
        .alert.bad { background: #fee2e2; color: #b91c1c; }
        .alert.warn { background: #fef3c7; color: #92400e; }
        .alert ul { margin-left: 18px; }
        .form-card { max-width: 560px; margin: 0 auto; }
        .field { margin-bottom: 18px; }
        .field label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 6px; }
        .field select, .field input, .field textarea { width: 100%; }
        .row { display: flex; gap: 14px; }
        .row .field { flex: 1; }
        .readonly { background: #f1f5f9; padding: 10px 12px; border-radius: 10px; font-size: 14px; }
        .empty { text-align: center; color: #64748b; padding: 30px 0; }
        .pagination { display: flex; list-style: none; gap: 6px; margin-top: 18px; justify-content: center; flex-wrap: wrap; }
        .pagination a, .pagination span { display: block; padding: 6px 12px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 13px; text-decoration: none; color: #1d4ed8; background: #fff; }
        .pagination .active span { background: #1d4ed8; color: #fff; border-color: #1d4ed8; }
        .pagination .disabled span { color: #94a3b8; }
    </style>
</head>
<body>
    <header class="top">
        <div class="brand">SPAMAST SSG <span>EVENT MANAGEMENT SYSTEM</span></div>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('attendance.index') }}">Records</a>
            <a href="{{ route('attendance.create') }}">Record Attendance</a>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div class="alert ok">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert bad">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPAMAST SSG</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #e8f1ff, #dbe9ff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #1e293b;
        }
        .card {
            background: #fff;
            width: 100%;
            max-width: 420px;
            padding: 40px 36px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(30, 64, 175, 0.12);
        }
        .brand { text-align: center; margin-bottom: 28px; }
        .brand h2 { color: #1d4ed8; font-size: 26px; }
        .brand span {
            display: block;
            font-size: 11px;
            letter-spacing: 3px;
            color: #64748b;
            margin-top: 4px;
        }
        h1 { font-size: 22px; color: #1e2a5e; margin-bottom: 6px; }
        .sub { color: #64748b; font-size: 14px; margin-bottom: 24px; }
        label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 6px; }
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            margin-bottom: 18px;
            outline: none;
        }
        input:focus { border-color: #1d4ed8; box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.15); }
        button {
            width: 100%;
            padding: 13px;
            background: #1d4ed8;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover { background: #1e40af; }
        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 14px;
            margin-bottom: 18px;
        }
        .switch { text-align: center; margin-top: 20px; font-size: 14px; color: #64748b; }
        .switch a { color: #1d4ed8; font-weight: 600; text-decoration: none; }
        .back { display: block; text-align: center; margin-top: 14px; font-size: 13px; color: #64748b; text-decoration: none; }
    </style>
</head>
<body>
    <div class="card">
        <div class="brand">
            <h2>SPAMAST SSG</h2>
            <span>EVENT MANAGEMENT SYSTEM</span>
        </div>

        <h1>Welcome back</h1>
        <p class="sub">Log in to your account to continue.</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>

        <p class="switch">No account yet? <a href="{{ route('register') }}">Register here</a></p>
        <a class="back" href="{{ url('/') }}">&larr; Back to home</a>
    </div>
</body>
</html>

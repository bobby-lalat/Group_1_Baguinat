
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPAMAST SSG | Event Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f8ff;
            color: #172554;
            line-height: 1.6;
        }

        header {
            background: #ffffff;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
            color: #1d4ed8;
        }

        .logo span {
            display: block;
            font-size: 11px;
            color: #64748b;
            letter-spacing: 2px;
        }

        nav {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #1e293b;
            font-weight: bold;
            font-size: 14px;
        }

        .nav-button {
            background: #1d4ed8;
            color: white;
            padding: 10px 17px;
            border-radius: 8px;
        }

        .hero {
            padding: 90px 8%;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .hero-content {
            max-width: 650px;
        }

        .tag {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 7px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        h1 {
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1.12;
            margin-bottom: 20px;
        }

        h1 span {
            color: #2563eb;
        }

        .hero p {
            color: #475569;
            font-size: 17px;
            max-width: 560px;
            margin-bottom: 28px;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .button {
            display: inline-block;
            padding: 13px 23px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .primary {
            background: #1d4ed8;
            color: white;
        }

        .secondary {
            background: white;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }

        .hero-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            min-width: 260px;
            max-width: 310px;
            width: 100%;
            box-shadow: 0 15px 40px rgba(30, 64, 175, 0.12);
        }

        .hero-card .symbol {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .hero-card h2 {
            font-size: 23px;
            margin-bottom: 10px;
        }

        .hero-card p {
            font-size: 15px;
            margin-bottom: 0;
        }

        .features {
            padding: 75px 8%;
            text-align: center;
        }

        .section-label {
            color: #2563eb;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .features h2 {
            font-size: 34px;
            margin: 10px 0;
        }

        .section-description {
            color: #64748b;
            margin-bottom: 35px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            text-align: left;
        }

        .feature {
            background: white;
            padding: 25px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(30, 64, 175, 0.09);
        }

        .feature-icon {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .feature h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .feature p {
            color: #64748b;
            font-size: 14px;
        }

        .cta {
            margin: 0 8% 70px;
            padding: 45px 25px;
            background: #1e40af;
            color: white;
            border-radius: 18px;
            text-align: center;
        }

        .cta h2 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .cta p {
            color: #dbeafe;
            margin-bottom: 22px;
        }

        footer {
            padding: 25px 8%;
            background: #ffffff;
            color: #64748b;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
                align-items: flex-start;
                padding: 65px 6%;
            }

            .hero-card {
                max-width: 100%;
            }

            .feature-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 550px) {
            header {
                padding: 16px 5%;
                flex-wrap: wrap;
            }

            nav {
                flex-wrap: wrap;
            }

            .hero {
                padding: 50px 5%;
            }

            .features {
                padding: 55px 5%;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .features h2 {
                font-size: 28px;
            }

            .cta {
                margin: 0 5% 45px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            SPAMAST SSG
            <span>EVENT MANAGEMENT SYSTEM</span>
        </div>

        <nav>
            <a href="#home">Home</a>
            <a href="#features">Features</a>
            <a href="{{ route('login') }}" class="nav-button">Login</a>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="hero-content">
                <span class="tag">STUDENT LEADERSHIP • CAMPUS EVENTS</span>

                <h1>
                    Every Event.<br>
                    Every Student.<br>
                    <span>One System.</span>
                </h1>

                <p>
                    Welcome to the SPAMAST SSG Event Management System.
                    A centralized platform designed to organize campus
                    events, manage student participation, monitor attendance,
                    and keep track of sanctions.
                </p>

                <div class="buttons">
                    <a href="{{ route('register') }}" class="button primary">
                        Get Started →
                    </a>

                    <a href="#features" class="button secondary">
                        Explore Features
                    </a>
                </div>
            </div>

            <div class="hero-card">
                <div class="symbol">🎓</div>
                <h2>Organize. Participate. Lead.</h2>
                <p>
                    Bringing student organizations and campus activities
                    together through one organized digital platform.
                </p>
            </div>
        </section>

        <section class="features" id="features">
            <span class="section-label">What You Can Do</span>
            <h2>Everything in One Place</h2>
            <p class="section-description">
                Tools to support student affairs and event management.
            </p>

            <div class="feature-grid">
                <article class="feature">
                    <div class="feature-icon">👥</div>
                    <h3>Register Students</h3>
                    <p>
                        Organize student information and maintain
                        accessible registration records.
                    </p>
                </article>

                <article class="feature">
                    <div class="feature-icon">📅</div>
                    <h3>Manage Events</h3>
                    <p>
                        Keep campus activities organized with clear
                        event information and schedules.
                    </p>
                </article>

                <article class="feature">
                    <div class="feature-icon">✓</div>
                    <h3>Attendance</h3>
                    <p>
                        Record and monitor student attendance during
                        school activities and events.
                    </p>
                </article>

                <article class="feature">
                    <div class="feature-icon">📋</div>
                    <h3>Sanctions</h3>
                    <p>
                        Maintain organized records of event-related
                        sanctions and student accountability.
                    </p>
                </article>
            </div>
        </section>

        <section class="cta" id="register">
            <h2>Be Part of Every Campus Event</h2>
            <p>
                Stay organized, stay informed, and stay involved.
            </p>

            <a href="{{ route('register') }}" class="button secondary">
                Register Now
            </a>
        </section>
    </main>

    <footer>
        <p>
            © <span id="year"></span> SPAMAST SSG Event Management System.
            All rights reserved.
        </p>
    </footer>

    <script>
        document.getElementById("year").textContent =
            new Date().getFullYear();
    </script>

</body>
</html>

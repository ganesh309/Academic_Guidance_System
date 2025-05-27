<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
            padding: 0;
            position: fixed;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 25px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-title {
            color: white;
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            text-align: center;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: #60a5fa;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: #93c5fd;
            color: white;
        }

        .sidebar a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        .logout-section {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
        }

        .logout-btn {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
            border: 2px solid transparent;
            color: white;
            padding: 14px 20px;
            border-radius: 12px;
            width: 100%;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-transform: uppercase;
        }

        .logout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 50%, #7f1d1d 100%);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 
                0 8px 25px rgba(220, 38, 38, 0.4),
                0 15px 35px rgba(220, 38, 38, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .logout-btn:hover::before {
            left: 100%;
        }

        .logout-btn:active {
            transform: translateY(-1px) scale(0.98);
            box-shadow: 
                0 4px 15px rgba(220, 38, 38, 0.3),
                inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .logout-btn i {
            margin-right: 10px;
            font-size: 16px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1;
        }

        .logout-btn:hover i {
            transform: translateX(-2px) rotate(-10deg) scale(1.1);
            text-shadow: 
                0 0 8px rgba(255, 255, 255, 0.8),
                0 2px 4px rgba(0, 0, 0, 0.3);
            animation: logoutIconPulse 0.6s ease-in-out;
        }

        @keyframes logoutIconPulse {
            0%, 100% {
                transform: translateX(-2px) rotate(-10deg) scale(1.1);
            }
            50% {
                transform: translateX(-4px) rotate(-15deg) scale(1.2);
            }
        }

        .logout-btn:focus {
            outline: 3px solid rgba(220, 38, 38, 0.5);
            outline-offset: 2px;
        }

        .main-content {
            margin-left: 250px;
            padding: 0;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
            color: white;
            padding: 25px 40px;
            font-size: 2rem;
            font-weight: 300;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .header-content {
            position: relative;
            z-index: 1;
            font-size: clamp(1.5rem, 4vw, 2rem);
            text-align: center;
        }

        .profile-section {
            padding: 40px;
        }

        .profile-card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #1e40af, #3b82f6, #60a5fa);
        }

        .profile-title {
            color: #1e40af;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .profile-title i {
            margin-right: 10px;
            color: #3b82f6;
        }

        .profile-table {
            margin: 0;
            width: 100%;
        }

        .profile-table td {
            padding: 15px 20px;
            border: none;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .profile-table tr:last-child td {
            border-bottom: none;
        }

        .profile-table tr:hover {
            background: #f8fafc;
            transition: background 0.2s ease;
        }

        .profile-label {
            font-weight: 600;
            color: #475569;
            width: 40%;
            position: relative;
        }

        .profile-label::after {
            content: '';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 3px;
            background: #3b82f6;
            border-radius: 50%;
        }

        .profile-value {
            color: #1e293b;
            font-weight: 500;
        }

        .profile-row {
            transition: all 0.2s ease;
        }

        .profile-row:hover .profile-label::after {
            background: #1e40af;
            transform: translateY(-50%) scale(1.5);
        }

        /* Hamburger Menu Toggle */
        .hamburger {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            cursor: pointer;
            font-size: 24px;
            color: white;
            background: rgba(30, 64, 175, 0.9);
            padding: 10px;
            border-radius: 8px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: 250px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .hamburger {
                display: block;
            }

            .header {
                padding: 20px;
                font-size: 1.5rem;
            }

            .header-content {
                margin-left: 0;
                text-align: center;
            }

            .profile-section {
                padding: 20px;
            }

            .profile-card {
                padding: 25px;
            }
        }

        @media (max-width: 768px) {
            .profile-table {
                display: block;
            }

            .profile-table tr {
                display: flex;
                flex-direction: column;
                margin-bottom: 15px;
                background: #f8fafc;
                border-radius: 8px;
                padding: 10px;
            }

            .profile-table td {
                display: block;
                border: none;
                padding: 8px 0;
            }

            .profile-label {
                width: 100%;
                margin-bottom: 5px;
            }

            .profile-label::after {
                display: none;
            }

            .profile-value {
                font-size: 1rem;
            }

            .profile-card {
                padding: 20px;
            }

            .profile-title {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                max-width: 300px;
            }

            .sidebar-header {
                padding: 20px 15px;
            }

            .sidebar-title {
                font-size: 18px;
            }

            .sidebar a {
                padding: 12px 20px;
                font-size: 14px;
            }

            .logout-section {
                bottom: 15px;
                left: 15px;
                right: 15px;
            }

            .logout-btn {
                padding: 12px 15px;
                font-size: 13px;
            }

            .header {
                padding: 15px;
            }

            .profile-section {
                padding: 15px;
            }

            .profile-card {
                padding: 15px;
            }

            .profile-title {
                font-size: 18px;
            }
        }

        /* Animation for page load */
        .profile-card {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="hamburger">
        <i class="fas fa-bars"></i>
    </div>

    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="sidebar-title">Mentee Dashboard</h3>
        </div>
        
        <div class="sidebar-nav">
            <a href="{{ route('mentee.dashboard') }}" class="active">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="{{ route('mentee.interaction', ['mentee_id' => $mentee->id]) }}">
                <i class="fas fa-users"></i> Interaction
            </a>
        </div>

        <div class="logout-section">
            <form action="{{ route('mentee.logout') }}" method="GET">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="header-content">
                The <span style="font-weight: 700;">Neotia</span> University
            </div>
        </div>
        
        <div class="profile-section">
            <div class="profile-card">
                <h4 class="profile-title">
                    <i class="fas fa-user-circle"></i> Profile
                </h4>
                <table class="table profile-table">
                    <tr class="profile-row">
                        <td class="profile-label">Mentee Name</td>
                        <td class="profile-value">{{ $student->fname ?? 'N/A' }} {{ $student->lname ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Mentee ID</td>
                        <td class="profile-value">{{ $student->uid ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Mobile Number</td>
                        <td class="profile-value">{{ $student->mobile ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Email ID</td>
                        <td class="profile-value">{{ $student->email ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Gender</td>
                        <td class="profile-value">{{ $student->gender_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Under academic of</td>
                        <td class="profile-value">{{ $student->academic_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">School</td>
                        <td class="profile-value">{{ $student->school_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Degree</td>
                        <td class="profile-value">{{ $student->degree_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Batch</td>
                        <td class="profile-value">{{ $student->batch_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Semester</td>
                        <td class="profile-value">{{ $student->semester_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">Country</td>
                        <td class="profile-value">{{ $student->country_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">State</td>
                        <td class="profile-value">{{ $student->state_name ?? 'N/A' }}</td>
                    </tr>
                    <tr class="profile-row">
                        <td class="profile-label">District</td>
                        <td class="profile-value">{{ $student->district_name ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
 @include('layouts.footer')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hamburger = document.querySelector(".hamburger");
            const sidebar = document.querySelector(".sidebar");
            const mainContent = document.querySelector(".main-content");

            hamburger.addEventListener("click", function() {
                sidebar.classList.toggle("active");
                mainContent.classList.toggle("shifted");
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener("click", function(event) {
                if (window.innerWidth <= 992 && !sidebar.contains(event.target) && !hamburger.contains(event.target)) {
                    sidebar.classList.remove("active");
                    mainContent.classList.remove("shifted");
                }
            });
        });
    </script>
</body>

</html>
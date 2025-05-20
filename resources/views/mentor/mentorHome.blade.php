<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Home</title>
    <link href="{{ asset('css/bootstraps.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary-color: #2563EB;
            --primary-dark: #1E40AF;
            --secondary-color: #64748B;
            --accent-color: #3B82F6;
            --hover-color: #EFF6FF;
            --bg-color: #F8FAFC;
            --border-color: #E2E8F0;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 0;
            color: #334155;
        }

        .sidebar {
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #2563EB 0%, #1E40AF 100%);
            padding: 32px 20px;
            position: fixed;
            box-shadow: var(--card-shadow);
            z-index: 10;
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo {
            color: white;
            font-size: 22px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 16px 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 8px;
            margin: 6px 0;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            margin-left: 280px;
            padding: 40px 50px;
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 24px 32px;
            font-size: 22px;
            border-radius: 12px;
            margin-bottom: 40px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 30%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIgY3g9IjAiIGN5PSIwIiByPSIxNTAiLz48Y2lyY2xlIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiIGN4PSI1MCIgY3k9IjUwIiByPSI3NSIvPjwvc3ZnPg==') no-repeat center right;
            opacity: 0.5;
        }

        .header span {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .profile-card {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .profile-card h4 {
            color: var(--primary-color);
            font-size: 26px;
            margin-bottom: 30px;
            padding-bottom: 18px;
            border-bottom: 2px solid var(--border-color);
            position: relative;
        }

        .profile-card h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 80px;
            height: 2px;
            background-color: var(--primary-color);
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table tr:not(:last-child) {
            border-bottom: 1px solid #EDF2F7;
        }

        .table tr:hover {
            background-color: var(--hover-color);
        }

        .table td {
            padding: 18px 12px;
            color: var(--secondary-color);
            transition: all 0.2s ease;
        }

        .table tr:first-child td {
            border-top: 1px solid #EDF2F7;
        }

        .table td:first-child {
            font-weight: 600;
            color: var(--primary-dark);
            width: 30%;
            border-left: 1px solid #EDF2F7;
            border-radius: 8px 0 0 8px;
        }

        .table td:last-child {
            border-right: 1px solid #EDF2F7;
            border-radius: 0 8px 8px 0;
        }

        .btn-logout {
            width: 100%;
            padding: 14px;
            margin-top: auto;
            border: none;
            background-color: rgba(220, 38, 38, 0.85);
            color: white;
            transition: all 0.3s ease;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(220, 38, 38, 0.2);
        }

        .btn-logout i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .btn-logout:hover {
            background-color: rgb(220, 38, 38);
            box-shadow: 0 6px 12px rgba(220, 38, 38, 0.3);
        }
        
        .btn-logout:hover i {
            transform: rotate(90deg);
        }
        
        .btn-logout::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.8s ease;
        }
        
        .btn-logout:hover::before {
            left: 100%;
        }
        
        /* Responsive styling */
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }
            .main-content {
                margin-left: 240px;
                padding: 30px 40px;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 20px;
            }
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            .profile-card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-logo">Mentor Dashboard</div>
        <div class="sidebar-divider"></div>
        
        <a href="{{ route('mentor.dashboard') }}" class="active">
            <i class="fas fa-home"></i>Home
        </a>
        <a href="{{ route('mentor.mentees') }}">
            <i class="fas fa-users"></i>Mentees
        </a>
        <a href="{{ route('mentor.interaction') }}">
            <i class="fas fa-comments"></i>Interaction
        </a>
        <a href="#">
            <i class="fas fa-eye"></i>View Interaction
        </a>
        <a href="#">
            <i class="fas fa-lock"></i>Change Password
        </a>
        
        <div class="sidebar-divider"></div>
        
        <form action="{{ route('mentor.logout') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-logout">
                <i class="fas fa-sign-out-alt"></i>Logout
            </button>
        </form>
    </div>

    <div class="main-content">
        <div class="header">
            The <span>Neotia</span> University
        </div>
        
        <div class="profile-card">
            <h4>Profile</h4>
            <table class="table">
                <tr>
                    <td><b>Faculty Name</b></td>
                    <td>{{ $faculty->fname ?? 'N/A' }} {{ $faculty->lname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Faculty ID</b></td>
                    <td>{{ $faculty->uid ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>School ID</b></td>
                    <td>{{ $faculty->school ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mobile Number</b></td>
                    <td>{{ $faculty->mobile ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Email ID</b></td>
                    <td>{{ $faculty->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Date of Joining</b></td>
                    <td>{{ $faculty->date_of_joining ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Remarks</b></td>
                    <td>Mentoring starts from 10-12-2024</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>
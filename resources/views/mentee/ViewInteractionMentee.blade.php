<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Interaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 50%, #f87171 100%);
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            width: 100%;
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.2);
            cursor: pointer;
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
            background: linear-gradient(135deg, #b91c1c 0%, #dc2626 50%, #ef4444 100%);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
        }

        .logout-btn:hover::before {
            left: 100%;
        }

        .logout-btn:active {
            transform: translateY(-1px) scale(0.98);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .logout-btn i {
            margin-right: 8px;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .logout-btn:hover i {
            transform: translateX(-2px) rotate(-10deg);
            color: #fecaca;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        }

        .main-content {
            margin-left: 250px;
            padding: 40px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .profile-card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
            animation: slideUp 0.6s ease-out;
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

        .profile-card h4 {
            color: #1e40af;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .profile-card h4 i {
            margin-right: 10px;
            color: #3b82f6;
        }

        .table {
            margin: 0;
            width: 100%;
        }

        .table td {
            padding: 15px 20px;
            border: none;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:hover {
            background: #f8fafc;
            transition: background 0.2s ease;
        }

        .table td:first-child {
            font-weight: 600;
            color: #475569;
            width: 40%;
            position: relative;
        }

        .table td:first-child::after {
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

        .table td:last-child {
            color: #1e293b;
            font-weight: 500;
        }

        .table tr:hover td:first-child::after {
            background: #1e40af;
            transform: translateY(-50%) scale(1.5);
        }

        .form-select {
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
            color: #1e293b;
            font-weight: 500;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            appearance: none;
        }

        .form-select:focus {
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .form-select option {
            padding: 10px;
            color: #1e293b;
        }

        .form-select:hover {
            border-color: #60a5fa;
            background-color: #f8fafc;
        }

        #detailsTable {
            margin-top: 25px;
            background: #f8fafc;
            border-radius: 10px;
            padding: 20px;
            min-height: 60px;
            border: 2px dashed #cbd5e1;
            transition: all 0.3s ease;
        }

        #detailsTable:not(:empty) {
            background: white;
            border: 2px solid #e2e8f0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .text-danger {
            color: #dc2626 !important;
            font-weight: 600;
            text-align: center;
            padding: 20px;
            font-size: 1rem;
        }

        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .loading::after {
            content: '';
            width: 40px;
            height: 40px;
            border: 4px solid #e2e8f0;
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
                padding: 20px;
            }

            .hamburger {
                display: block;
            }

            .profile-card {
                padding: 25px;
            }
        }

        @media (max-width: 768px) {
            .table {
                display: block;
            }

            .table tr {
                display: flex;
                flex-direction: column;
                margin-bottom: 15px;
                background: #f8fafc;
                border-radius: 8px;
                padding: 10px;
            }

            .table td {
                display: block;
                border: none;
                padding: 8px 0;
            }

            .table td:first-child {
                width: 100%;
                margin-bottom: 5px;
            }

            .table td:first-child::after {
                display: none;
            }

            .table td:last-child {
                font-size: 1rem;
            }

            .profile-card {
                padding: 20px;
            }

            .profile-card h4 {
                font-size: 20px;
            }

            .form-select {
                font-size: 14px;
                padding: 10px 14px;
            }

            #detailsTable {
                padding: 15px;
            }

            .loading::after {
                width: 30px;
                height: 30px;
                border-width: 3px;
            }

            .text-danger {
                font-size: 0.9rem;
                padding: 15px;
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
                padding: 10px 15px;
                font-size: 13px;
            }

            .main-content {
                padding: 15px;
            }

            .profile-card {
                padding: 15px;
            }

            .profile-card h4 {
                font-size: 18px;
            }

            .form-select {
                font-size: 13px;
                padding: 8px 12px;
                background-size: 14px 10px;
            }

            #detailsTable {
                margin-top: 20px;
                padding: 10px;
            }

            .loading::after {
                width: 25px;
                height: 25px;
                border-width: 2px;
            }
        }
    </style>
</head>

<body>
    @php
        $user = 'mentee';
    @endphp
    <div class="hamburger">
        <i class="fas fa-bars"></i>
    </div>

    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="sidebar-title">Mentee Dashboard</h3>
        </div>
        
        <div class="sidebar-nav">
            <a href="{{ route('mentee.dashboard') }}">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="{{ route('mentee.interaction', ['mentee_id' => $mentee_id]) }}" class="active">
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
        <div class="profile-card">
            <h4><i class="fas fa-user-tie"></i> Basic Details</h4>
            <table class="table">
                <tr>
                    <td>Mentor Name</td>
                    <td>{{ $mentor->fname ?? 'N/A' }} {{ $mentor->lname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>School ID</td>
                    <td>{{ $mentor->school ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td>{{ $mentor->mobile ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Email ID</td>
                    <td>{{ $mentor->email ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>

        <div class="profile-card">
            <h4><i class="fas fa-comments"></i> Interaction Details</h4>
            <select id="dateSelector" class="form-select">
                <option value="">Select Date</option>
                @foreach ($dates as $date)
                    <option value="{{ $date->date }}">{{ $date->date }}</option>
                @endforeach
            </select>

            <div id="detailsTable" class="mt-4"></div>
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

            // jQuery AJAX for date selection
            $('#dateSelector').on('change', function() {
                let selectedDate = $(this).val();

                if (selectedDate !== "") {
                    // Show loading state
                    $('#detailsTable').html('<div class="loading"></div>');
                    
                    $.ajax({
                        url: "{{ route('interactions.fetch.mentee', ['mentee_id' => $mentee_id]) }}",
                        method: "GET",
                        data: { date: selectedDate },
                        success: function(response) {
                            $('#detailsTable').html(response);
                        },
                        error: function() {
                            $('#detailsTable').html('<p class="text-danger">Failed to load data. Try again.</p>');
                        }
                    });
                } else {
                    $('#detailsTable').html('');
                }
            });
        });
    </script>
</body>

</html>
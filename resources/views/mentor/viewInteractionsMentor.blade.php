<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee</title>
    <link href="{{ asset('css/bootstraps.css')}}" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/google-fonts/1.0.0/families/Poppins.css" rel="stylesheet">
    <style>
        :root {
            --primary-red: #a00000;
            --primary-red-hover: #c00000;
            --primary-red-light: rgba(160, 0, 0, 0.1);
            --primary-yellow: #ffc107;
            --primary-yellow-light: #fef9c3;
            --primary-yellow-hover: #ffca2c;
            --text-dark: #343a40;
            --text-light: #6c757d;
            --white: #ffffff;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            position: relative;
            overflow-x: hidden;
        }

        /* Sidebar styles */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: linear-gradient(145deg, var(--primary-red), #800000);
            padding: 30px 0;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: var(--box-shadow);
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .sidebar:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: -1;
            opacity: 0.5;
        }

        .sidebar-logo {
            padding: 0 20px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-logo h3 {
            color: var(--white);
            font-weight: 700;
            font-size: 1.4rem;
            margin: 0;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: var(--transition);
            margin: 2px 0;
            border-radius: 0 25px 25px 0;
            position: relative;
            font-weight: 500;
        }

        .sidebar a:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 0;
            background-color: var(--primary-yellow);
            transition: var(--transition);
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            padding-left: 30px;
        }

        .sidebar a:hover:before, .sidebar a.active:before {
            height: 100%;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar form {
            padding: 0 20px;
            margin-top: auto;
            width: 100%;
        }

        .sidebar .btn-light {
            background-color: #e71d36;
            color: var(--white);
            border: none;
            padding: 16px 0px;
            border-radius: 5px;
            width: 80%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1;
            margin-top: 15px;
            margin-bottom: 50px;
            font-weight: 500;
        }
        
        .sidebar .btn-light:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
            z-index: -1;
        }
        
        .sidebar .btn-light:hover {
            background-color: #ff1f35;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 12px rgba(231, 29, 54, 0.4);
            color: var(--white);
        }
        
        .sidebar .btn-light:hover:before {
            left: 100%;
        }
        
        .sidebar .btn-light:active {
            transform: translateY(0) scale(0.98);
            box-shadow: 0 2px 4px rgba(231, 29, 54, 0.3);
        }

        /* Main content styles */
        .main-content {
            margin-left: 220px;
            padding: 20px;
            transition: var(--transition);
        }

        .header {
            background-color: var(--primary-red);
            color: var(--white);
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: var(--box-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .profile-card {
            background: var(--white);
            padding: 25px;
            border-radius: 8px;
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
            border-top: 4px solid var(--primary-red);
            position: relative;
            overflow: hidden;
        }

        .profile-card:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            border-width: 0 40px 40px 0;
            border-style: solid;
            border-color: var(--primary-yellow) var(--primary-yellow-light);
            transition: var(--transition);
        }

        .profile-card h4 {
            color: var(--primary-red);
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-yellow-light);
            display: flex;
            align-items: center;
        }

        .profile-card h4:before {
            content: '';
            width: 30px;
            height: 4px;
            background-color: var(--primary-red);
            margin-right: 10px;
            border-radius: 2px;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
        }

        .table tr:hover {
            background-color: var(--primary-red-light);
        }

        .table td {
            padding: 12px 15px;
            vertical-align: middle;
            border-color: #e9ecef;
        }

        .table td b {
            color: var(--text-dark);
            font-weight: 600;
        }

        .form-select {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--text-dark);
            background-color: var(--white);
            transition: var(--transition);
            box-shadow: none;
            margin-bottom: 20px;
        }

        .form-select:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 0.25rem var(--primary-red-light);
        }

        /* Custom select styling */
        .custom-select-wrapper {
            position: relative;
            margin-bottom: 20px;
        }

        .custom-select-wrapper:after {
            content: '\f107';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: var(--primary-red);
            pointer-events: none;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .sidebar {
                width: 190px;
            }
            .main-content {
                margin-left: 190px;
            }
        }

        @media (max-width: 767.98px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
            }
            .sidebar.active {
                width: 250px;
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .toggle-sidebar {
                display: block !important;
            }
        }

        .info-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            margin-left: 5px;
            font-size: 0.75rem;
            font-weight: 600;
            background-color: var(--primary-yellow);
            color: var(--text-dark);
        }

        /* Additional visual enhancements */
        .shadow-hover {
            transition: var(--transition);
        }

        .shadow-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Button for mobile toggle */
        .toggle-sidebar {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background-color: var(--primary-red);
            color: var(--white);
            border: none;
            border-radius: 5px;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
            box-shadow: var(--box-shadow);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .profile-card {
            animation: fadeIn 0.5s ease forwards;
        }

        .profile-card:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        /* Close button styling */
        .btn-danger {
            background: linear-gradient(60deg, #d8b61e, #d8b61e );
            border: none;
            font-weight: 600;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            padding: 12px 35px;
            border-radius: 25px;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            font-size: 1.1rem;
            z-index: 1;
            color: white;
        }
        
        .btn-danger:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
            z-index: -1;
        }
        
        .btn-danger:hover {
            background: linear-gradient(145deg, #c00000, var(--primary-red));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 20px rgba(160, 0, 0, 0.4);
            color: white;
        }
        
        .btn-danger:hover:before {
            left: 100%;
        }
        
        .btn-danger:active {
            transform: translateY(0) scale(0.98);
            box-shadow: 0 2px 4px rgba(160, 0, 0, 0.2);
        }
        
        .btn-danger i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }
        
        .btn-danger:hover i {
            transform: rotate(90deg);
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(160, 0, 0, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(160, 0, 0, 0); }
            100% { box-shadow: 0 0 0 0 rgba(160, 0, 0, 0); }
        }
        
        .btn-pulse {
            animation: pulse 2s infinite;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#dateSelector').on('change', function () {
            let selectedDate = $(this).val();

            if (selectedDate !== "") {
                $.ajax({
                    url: "{{ route('interactions.fetch',$mentee->mentee_id) }}",
                    method: "GET",
                    data: {
                        date: selectedDate
                    },
                    success: function (response) {
                        $('#detailsTable').html(response);
                    },
                    error: function () {
                        $('#detailsTable').html('<p class="text-danger">Failed to load data. Try again.</p>');
                    }
                });
            } else {
                $('#detailsTable').html('');
            }
        });

        // For mobile sidebar toggle
        $('.toggle-sidebar').on('click', function() {
            $('.sidebar').toggleClass('active');
        });
    });
</script>

</head>

<body>
    <!-- Mobile sidebar toggle button -->
    <button class="toggle-sidebar d-md-none">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar col-md-2">
        <div class="sidebar-logo">
            <h3>Mentor Portal</h3>
        </div>
        <a href="{{ route('mentor.dashboard') }}">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="{{ route('mentor.mentees') }}">
            <i class="fas fa-users"></i> Mentees
        </a>
        <form action="{{ route('mentor.logout') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-light mt-3">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h2>Mentee Profile</h2>
            <span class="info-badge">
                <i class="fas fa-user-circle"></i> Mentor View
            </span>
        </div>
        
        <div class="profile-card shadow-hover">
            <h4><i class="fas fa-id-card me-2"></i>Basic Details</h4>
            <table class="table">
                <tr>
                    <td width="30%"><b>Mentee Name</b></td>
                    <td>{{ $mentee->fname ?? 'N/A' }} {{ $mentee->lname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mentee ID</b></td>
                    <td>{{ $mentee->uid ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>School ID</b></td>
                    <td>{{ $mentee->school ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mobile Number</b></td>
                    <td>{{ $mentee->mobile ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Email ID</b></td>
                    <td>{{ $mentee->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>SGPA</b></td>
                    <td>{{ $mentee->sgpa ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>
        
        <div class="profile-card shadow-hover">
            <h4><i class="fas fa-clipboard-list me-2"></i>Interaction Details</h4>
            <div class="custom-select-wrapper">
                <select id="dateSelector" class="form-select">
                    <option value="">Select Date</option>
                    @foreach ($dates as $date)
                    <option value="{{ $date->date }}">{{ $date->date }}</option>
                    @endforeach
                </select>
            </div>

            <div id="detailsTable" class="table mt-4">
                <!-- Ajax content will load here -->
            </div>
        </div>
        
        <!-- Close button -->
        <div class="text-center mb-4">
            <a href="{{ route('mentor.mentees') }}" class="btn btn-danger px-5 py-2">
                <i class="fas fa-times-circle me-2"></i>Close
            </a>
        </div>
    </div>
</body>

</html>
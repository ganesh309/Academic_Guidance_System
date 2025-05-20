
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentees</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
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
            --danger-color: #DC2626;
            --warning-color: #F59E0B;
            --info-color: #0EA5E9;
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

        .main-content {
            margin-left: 280px;
            padding: 40px 50px;
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 24px 32px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
        }

        .header h2 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: 0.5px;
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

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            color: var(--primary-color);
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
            position: relative;
        }

        .card-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 60px;
            height: 2px;
            background-color: var(--primary-color);
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            padding: 14px 12px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            position: relative;
        }
        
        .table thead th:first-child {
            border-radius: 8px 0 0 0;
        }
        
        .table thead th:last-child {
            border-radius: 0 8px 0 0;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: var(--hover-color);
        }

        .table tbody td {
            padding: 14px 12px;
            border-top: none;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            font-size: 14px;
        }

        .btn {
            border-radius: 6px;
            font-weight: 500;
            padding: 8px 14px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 2px;
            border: none;
        }

        .btn i {
            margin-right: 6px;
            font-size: 14px;
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 13px;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #B91C1C;
            box-shadow: 0 4px 6px rgba(220, 38, 38, 0.2);
        }

        .btn-warning {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-warning:hover {
            background-color: #D97706;
            box-shadow: 0 4px 6px rgba(245, 158, 11, 0.2);
        }

        .btn-info {
            background-color: var(--info-color);
            color: white;
        }

        .btn-info:hover {
            background-color: #0284C7;
            box-shadow: 0 4px 6px rgba(14, 165, 233, 0.2);
        }

        .btn-secondary {
            background-color: #94A3B8;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #64748B;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }

        .modal-content {
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-bottom: none;
            padding: 20px 24px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
        }

        .btn-close {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            opacity: 1;
            transition: all 0.2s ease;
        }

        .btn-close:hover {
            background-color: rgba(255, 255, 255, 0.5);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 16px 24px;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
            margin-bottom: 16px;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .form-label {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 8px;
            display: block;
        }

        /* Responsive styling */
        @media (max-width: 1024px) {
            .sidebar {
                width: 205px;
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
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dynamically attach event listeners to all modals
            document.querySelectorAll('.modal').forEach(function(modal) {
                modal.addEventListener('shown.bs.modal', function() {
                    const timeInput = modal.querySelector('input[type="time"]');
                    if (timeInput) {
                        timeInput.focus();
                    }
                });
            });
        });
    </script>
</head>

<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar">
            <div class="sidebar-logo">Mentor Dashboard</div>
            <div class="sidebar-divider"></div>
            
            <a href="{{ route('mentor.dashboard') }}">
                <i class="fas fa-home"></i>Home
            </a>
            <a href="{{ route('mentor.mentees') }}" class="active">
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
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </button>
            </form>
        </div>
        
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h2>The Neotia University</h2>
            </div>

            <!-- Current Mentees Table -->
            <div class="table-section">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Current Mentees</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mentee ID</th>
                                        <th>Name</th>
                                        <th>UID</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Semester</th>
                                        <th>Department</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($mentees->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">No mentees found.</td>
                                        </tr>
                                    @else
                                        @foreach ($mentees as $mentee)
                                            <tr>
                                                <td>{{ $mentee->id ?? 'N/A' }}</td>
                                                <td>{{ ($mentee->fname ?? '') . ' ' . ($mentee->lname ?? '') }}</td>
                                                <td>{{ $mentee->uid ?? 'N/A' }}</td>
                                                <td>{{ $mentee->mobile ?? 'N/A' }}</td>
                                                <td>{{ $mentee->email ?? 'N/A' }}</td>
                                                <td>{{ $mentee->semester ?? 'N/A' }}</td>
                                                <td>{{ $mentee->degree ?? 'N/A' }}</td>
                                                <td>{{ $mentee->gender ?? 'N/A' }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_{{ $mentee->id }}">
                                                        <i class="fas fa-calendar-alt"></i>Set Appointment
                                                    </button>

                                                    <div class="modal fade" id="exampleModalCenter_{{ $mentee->id }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle_{{ $mentee->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle_{{ $mentee->id }}">Set Appointment</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('set-appointment', $mentee->id) }}" method="POST">
                                                                    @method('POST')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <label class="form-label" for="meeting_time_{{ $mentee->id }}">Select Time</label>
                                                                        <input type="time" id="meeting_time_{{ $mentee->id }}" name="time" class="form-control">
                                                                        <label class="form-label" for="date_{{ $mentee->id }}">Select Date</label>    
                                                                        <input type="date" id="date_{{ $mentee->id }}" name="date" class="form-control" placeholder="Focus me on open">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Send Mail</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('new-interaction', $mentee->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pencil-alt"></i>New Interaction
                                                    </a>
                                                    <a href="{{ route('view-interactions', $mentee->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>View Interactions
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Neotia University - Mentor Interaction</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/google-fonts/1.0.0/families/Open+Sans.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #a00000;
            --primary-light: #cc0000;
            --secondary-color: #333333;
            --accent-color: #f9b234;
            --light-bg: #f8f9fa;
            --white: #ffffff;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f0f2f5;
            color: var(--secondary-color);
            position: relative;
            min-height: 100vh;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), #800000);
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: var(--transition);
        }

        .sidebar-header {
            padding: 15px 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-header h3 {
            color: var(--white);
            font-size: 1.3rem;
            margin: 0;
            font-weight: 600;
        }

        .sidebar-menu {
            padding: 0;
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
            transition: var(--transition);
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 25px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-left: 4px solid var(--accent-color);
        }

        .sidebar-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .logout-btn {
            margin: 20px 25px;
        }

        .logout-btn button {
            background-color: #e71d36;
            color: var(--white);
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            width: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        
        .logout-btn button:before {
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
        
        .logout-btn button:hover {
            background-color: #ff1f35;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 12px rgba(231, 29, 54, 0.4);
        }
        
        .logout-btn button:hover:before {
            left: 100%;
        }
        
        .logout-btn button:active {
            transform: translateY(0) scale(0.98);
            box-shadow: 0 2px 4px rgba(231, 29, 54, 0.3);
        }

        .logout-btn button i {
            margin-right: 8px;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px;
            padding: 0;
            min-height: 100vh;
            background-color: var(--light-bg);
            transition: var(--transition);
        }

        .header {
            background-color: var(--white);
            padding: 15px 30px;
            box-shadow: var(--box-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .header h3 {
            color: var(--primary-color);
            margin: 0;
            font-weight: 700;
            display: flex;
            align-items: center;
        }

        .header h3 img {
            height: 40px;
            margin-right: 10px;
        }

        .content-wrapper {
            padding: 30px;
        }

        .page-title {
            margin-bottom: 25px;
            color: var(--secondary-color);
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .page-title i {
            color: var(--primary-color);
            margin-right: 10px;
            font-size: 1.8rem;
        }

        /* Form card styles */
        .form-card {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .form-card-header {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 15px 25px;
            font-weight: 600;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
        }

        .form-card-header i {
            margin-right: 10px;
        }

        .form-card-body {
            padding: 25px;
        }

        /* Form controls */
        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #dce0e5;
            padding: 10px 15px;
            transition: var(--transition);
            background-color: #f9fafc;
        }

        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(160, 0, 0, 0.15);
        }

        textarea.form-control {
            min-height: 100px;
        }

        /* Button styles */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background-color: var(--primary-light);
            border-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .btn-light {
            background-color: #e9ecef;
            border-color: #dee2e6;
            color: var(--secondary-color);
            padding: 10px 25px;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-light:hover {
            background-color: #dde1e4;
            border-color: #c8cccf;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
            }
        }

        @media (max-width: 767.98px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
            }
            .sidebar.show {
                width: 250px;
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .toggle-sidebar {
                display: block !important;
            }
            .form-row {
                flex-direction: column;
                gap: 10px;
            }
        }

        .toggle-sidebar {
            display: none;
            background: none;
            border: none;
            color: var(--primary-color);
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Mentor Portal</h3>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('mentor.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('mentor.mentees') }}">
                    <i class="fas fa-users"></i> My Mentees
                </a>
            </li>
        </ul>
        <div class="logout-btn">
            <form action="{{ route('mentor.logout') }}" method="GET">
                @csrf
                <button type="submit">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <button class="toggle-sidebar">
                <i class="fas fa-bars"></i>
            </button>
            <h2>
             The Neotia University
            </h2>
            <div class="user-info">
                <i class="fas fa-user-circle"></i> Mentor
            </div>
        </div>

        <div class="content-wrapper">
            <h4 class="page-title">
                <i class="fas fa-clipboard-list"></i> New Mentorship Interaction
            </h4>

            <div class="form-card">
                <div class="form-card-header">
                    <i class="fas fa-comments"></i> Interaction Details
                </div>
                <div class="form-card-body">
                    <form action="{{ route('submit-new-interaction', $id) }}" method="POST">
                        @csrf
                        @method('POST')
                        
                        <div class="form-row">
                            <div class="form-group mb-3">
                                <label class="form-label">Interaction Date</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Attendance Status</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                    <select name="attendance" id="attendance" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                        <option value="Late">Late</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Interaction Summary</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
                                <textarea name="interaction" id="interaction" class="form-control" placeholder="Describe your interaction with the mentee" required></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Problem Identified</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-exclamation-circle"></i></span>
                                <textarea name="problem_understood" id="problem_understood" class="form-control" placeholder="Describe any problems identified during the interaction" required></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Remedial Action</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tools"></i></span>
                                <textarea name="remedy" id="remedy" class="form-control" placeholder="Describe remedial actions taken or suggested" required></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Changes Observed</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-chart-line"></i></span>
                                <textarea name="observation" id="observation" class="form-control" placeholder="Note any changes or improvements observed" required></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('mentor.mentees') }}" class="btn btn-light me-2">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Submit Interaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
        
        // Set default date to today
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;
        });
    </script>
</body>
</html>
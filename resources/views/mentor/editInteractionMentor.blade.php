<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Interaction - The Neotia University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            min-height: 100vh;
            color: #2c3e50;
        }

        .container-fluid {
            padding: 0;
        }

        /* Sidebar Styles */
        .sidebar {
            background: linear-gradient(135deg, #072b7e, #521b49);
            min-height: 100vh;
            padding: 2rem 0;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.3);
            position: fixed;
            width: 280px;
            z-index: 1000;
        }

        .sidebar .logo {
            text-align: center;
            padding: 0 1.5rem 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
        }

        .sidebar .logo h4 {
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 0.2rem 1rem;
            border-radius: 12px;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
        }

        .sidebar a i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

        .sidebar .logout-btn {
            margin: 2rem 1rem 0;
        }

        .sidebar .logout-btn button {
            width: 100%;
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
            color: white;
            padding: 0.75rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 385px;
            margin-left: 7px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(220, 38, 38, 0.2);
        }

        .sidebar .logout-btn button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .sidebar .logout-btn button:hover::before {
            left: 100%;
        }

        .sidebar .logout-btn button:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .sidebar .logout-btn button:active {
            transform: translateY(-1px) scale(0.98);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .sidebar .logout-btn button i {
            transition: transform 0.3s ease;
        }

        .sidebar .logout-btn button:hover i {
            transform: translateX(2px);
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
            background: white;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            padding: 1.5rem 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
            width: 80%;
        }

        .header h3 {
            color: white;
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }

        .header .subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            margin-top: 0.25rem;
        }

        /* Form Card */
        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgb(0, 0, 0);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
            width: 80%;
        }

        .form-card h5 {
            color: #1e3a8a;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
        }

        .form-card h5 i {
            margin-right: 0.75rem;
            color: #2563eb;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 0.5rem;
            color: #2563eb;
            width: 16px;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 0.875rem 1.25rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            background: white;
        }

        .form-control:hover {
            border-color: #cbd5e0;
        }

        /* Textarea specific styling */
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Submit Button */
        .submit-btn {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: none;
            color: white;
            padding: 1rem 3rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .form-card {
                padding: 2rem 1.5rem;
            }

            .header {
                padding: 1rem 1.5rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 0.5rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Success/Error Messages */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="logo">
                    <h4><i class="fas fa-graduation-cap"></i> Mentor Portal</h4>
                </div>
                <a href="{{ route('mentor.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('mentor.mentees') }}">
                    <i class="fas fa-users"></i> Mentees
                </a>
                <div class="logout-btn">
                    <form action="{{ route('mentor.logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Header -->
                <div class="header">
                    <h3><i class="fas fa-university"></i> The Neotia University</h3>
                    <div class="subtitle">Mentor Dashboard - Edit Interaction</div>
                </div>

                <!-- Form Card -->
                <div class="form-card">
                    <h5><i class="fas fa-edit"></i> Edit Interaction Details</h5>
                    
                    <form action="{{ route('submit-edited-interaction',[$mentee_id, $interaction_id,$date]) }}" method="POST" id="interactionForm">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-calendar-check"></i> Attendance
                                    </label>
                                    <input type="text" name="attendance" value="{{ old('attendance', $interaction->attendance) }}" class="form-control" placeholder="Enter attendance status">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-comments"></i> Interaction Type
                                    </label>
                                    <input type="text" name="interaction" value="{{ old('interaction', $interaction->interaction) }}" class="form-control" placeholder="Describe the interaction">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-lightbulb"></i> Problem Understood
                            </label>
                           <input type="text" name="problem_understood" value="{{ old('problem_understood', $interaction->problem_understood) }}" id="problem_understood" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tools"></i> Remedial Action Taken
                            </label>
                            <input type="text" name="remedy" value="{{ old('remedy', $interaction->remedy) }}" id="remedy" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-chart-line"></i> Changes Observed
                            </label>
                            <input type="text" name="observation" value="{{ old('observation', $interaction->observation) }}" id="observation" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="submit-btn">
                                <i class="fas fa-save"></i> Update Interaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Form submission with loading state and proper redirect
        document.getElementById('interactionForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.submit-btn');
            
            // Show loading state
            submitBtn.innerHTML = '<span class="loading"></span>Updating...';
            submitBtn.disabled = true;
            
            // Allow the form to submit naturally - Laravel will handle the redirect
            // Don't prevent default - let the form submit to the Laravel route
        });

        // Auto-expand textareas
        document.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });

        // Mobile sidebar toggle (if needed)
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>
</html>
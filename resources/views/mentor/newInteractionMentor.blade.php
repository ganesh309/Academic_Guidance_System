<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
    <link rel="stylesheet" href="{{ asset('css/newInteractionMentor.css') }}">

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3  style="font-size: 22px; letter-spacing: 1px; ">Mentor Dashboard</h3>
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

@include('layouts.footer')
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
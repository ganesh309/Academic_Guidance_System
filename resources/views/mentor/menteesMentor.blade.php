<!DOCTYPE html>
<html lang="en">
    @include('layouts.header')
    <link rel="stylesheet" href="{{ asset('css/menteesMentor.css') }}">
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-logo">Mentor Dashboard</div>
            <div class="sidebar-divider"></div>

            <a href="{{ route('mentor.dashboard') }}">
                <i class="fas fa-home"></i>Home
            </a>
            <a href="{{ route('mentor.mentees') }}" class="active">
                <i class="fas fa-users"></i> My Mentees
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

        <!-- Main Content -->
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
                                    @forelse ($mentees as $mentee)
                                    <tr>
                                        <td>{{ $mentee->id ?? 'N/A' }}</td>
                                        <td>{{ $mentee->fname }} {{ $mentee->lname }}</td>
                                        <td>{{ $mentee->uid ?? 'N/A' }}</td>
                                        <td>{{ $mentee->mobile ?? 'N/A' }}</td>
                                        <td>{{ $mentee->email ?? 'N/A' }}</td>
                                        <td>{{ $mentee->semester ?? 'N/A' }}</td>
                                        <td>{{ $mentee->degree ?? 'N/A' }}</td>
                                        <td>{{ $mentee->gender ?? 'N/A' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#appointmentModal{{ $mentee->id }}">
                                                <i class="fas fa-calendar-alt"></i> Set Appointment
                                            </button>
                                            
                                            <a href="{{ route('new-interaction', $mentee->id) }}" 
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i> New Interaction
                                            </a>
                                            
                                            <a href="{{ route('view-interactions', $mentee->id) }}" 
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> View Interactions
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No mentees found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    @foreach ($mentees as $mentee)
    <div class="modal fade" id="appointmentModal{{ $mentee->id }}" tabindex="-1" 
         aria-labelledby="appointmentModalLabel{{ $mentee->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="appointmentModalLabel{{ $mentee->id }}">
                        Set Appointment for {{ $mentee->fname }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('set-appointment', $mentee->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="date_{{ $mentee->id }}" class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="date_{{ $mentee->id }}" 
                                   name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time_{{ $mentee->id }}" class="form-label">Select Time</label>
                            <input type="time" class="form-control" id="time_{{ $mentee->id }}" 
                                   name="time" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Invitation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @include('layouts.footer')

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('shown.bs.modal', function() {
                    const timeInput = modal.querySelector('input[type="time"]');
                    if (timeInput) timeInput.focus();
                });
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/menteesMentor.css') }}">
<body>
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
    <!-- Sidebar -->
    <div class="d-flex">
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

    @include('layouts.footer')

</body>

</html>
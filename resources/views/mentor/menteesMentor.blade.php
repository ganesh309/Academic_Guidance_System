<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentees</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstraps.css')}}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #fef9c3;
            padding: 20px;
            position: fixed;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
        }

        .header {
            background-color: #a00000;
            color: white;
            padding: 10px;
            font-size: 24px;
        }

        .profile-card {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = document.getElementById('exampleModalCenter');
            myModal.addEventListener('shown.bs.modal', function() {
                document.getElementById('myInput').focus();
            });
        });
    </script>


</head>

<body>
    <!-- Sidebar -->

    <div class="d-flex">
        <div class="sidebar col-md-2">
            <a href="{{ route('mentor.dashboard') }}"> Home</a>
            <a href="{{ route('mentor.mentees') }}"> Mentees</a>
            <a href="{{ route('mentor.interaction') }}"> Interaction</a>
            <a href="#">View Interaction</a>
            <a href="#">Change Password</a>
            <form action="{{ route('mentor.logout') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-light mt-3">Logout</button>
            </form>
        </div>
        <div class="main-content">
            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <!-- Header -->
                <div class="header">
                    <h2>The Neotia University</h2>
                </div>

                <!-- Current Mentees Table -->
                <div class="table-section">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Current Mentees</h5>
                            <table class="table table-bordered">
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
                                    @foreach($mentees as $mentee)
                                    <tr>
                                        <td>{{ $mentee->id }}</td>
                                        <td>{{ $mentee->fname }} {{ $mentee->lname }}</td>
                                        <td>{{ $mentee->uid }}</td>
                                        <td>{{ $mentee->mobile }}</td>
                                        <td>{{ $mentee->email }}</td>
                                        <td>{{ $mentee->semester }}</td>
                                        <td>{{ $mentee->degree }}</td>
                                        <td>{{ $mentee->gender }}</td>
                                        <td>
                                            <!-- <a href="{{ route('set-appointment', $mentee->id) }}" class="btn btn-danger btn-sm"> <i class="bi bi-printer-fill"></i>Set Appointment </a> -->

                                            
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="bi bi-printer-fill"></i>Set Appointment
                                            </button>

                                            
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Set Appointment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('set-appointment', $mentee->id) }}" method="POST">
                                                            @method('POST')
                                                            @csrf
                                                        <div class="modal-body">
                                                        <label class="form-label" for="meeting_time">Select Time</label>
                                                        <input type="time" id="time" name="time" class="form-control">
                                                        <label class="form-label" for="date">Select Date</label>    
                                                        <input type="date" id="date" name="date" class="form-control" placeholder="Focus me on open">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send Mail</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>



                                            <a href="{{ route('new-interaction', $mentee->id) }}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i>New Interaction </a>
                                            <a href="{{ route('view-interactions', $mentee->id) }}" class="btn btn-info btn-sm"> <i class="bi bi-printer-fill"></i>View Interactions </a>


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
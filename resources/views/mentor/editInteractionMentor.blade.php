<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Neotia University - Interaction</title>
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
</head>
<body>
    <!-- Sidebar -->
    
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
    <!-- Header -->
    <div class="header">
        <h3>The Neotia University</h3>
    </div>

    <!-- Main Content -->

        <!-- Choose Mentee Card -->

        <!-- Interaction Card -->
        <div class="card p-4">
            <h5>Interaction</h5>
            <form action="{{ route('submit-edited-interaction',[$mentee_id, $interaction_id,$date]) }}" method="POST" >
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="form-label">Attendance</label>
                <input type="text" name="attendance" value="{{ old('attendance', $interaction->attendance) }}" id="attendance" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Interaction</label>
                <input type="text" name="interaction" value="{{ old('interaction', $interaction->interaction) }}"  id="interaction" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Problem Understood</label>
                <input type="text" name="problem_understood" value="{{ old('problem_understood', $interaction->problem_understood) }}"  id="problem_understood" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Remedial action taken</label>
                <input type="text" name="remedy" value="{{ old('remedy', $interaction->remedy) }}"  id="remedy" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Changes Observed</label>
                <input type="text" name="observation" value="{{ old('observation', $interaction->observation) }}"  id="observation" class="form-control" >
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
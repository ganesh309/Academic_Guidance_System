<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/editInteractionMentor.css') }}">

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
            <form action="{{ route('submit-edited-interaction',[$mentee_id, $interaction_id,$date]) }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label class="form-label">Attendance</label>
                    <input type="text" name="attendance" value="{{ old('attendance', $interaction->attendance) }}" id="attendance" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Interaction</label>
                    <input type="text" name="interaction" value="{{ old('interaction', $interaction->interaction) }}" id="interaction" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Problem Understood</label>
                    <input type="text" name="problem_understood" value="{{ old('problem_understood', $interaction->problem_understood) }}" id="problem_understood" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Remedial action taken</label>
                    <input type="text" name="remedy" value="{{ old('remedy', $interaction->remedy) }}" id="remedy" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Changes Observed</label>
                    <input type="text" name="observation" value="{{ old('observation', $interaction->observation) }}" id="observation" class="form-control">
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('layouts.footer')
</body>

</html>
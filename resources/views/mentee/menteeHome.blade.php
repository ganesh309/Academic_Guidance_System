<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="sidebar">
        <h5>Home</h5>
        <h5>Mentees</h5>
        <a href="{{ route('mentee.interaction') }}"> Interaction</a>
        <h5>View Interaction</h5>
        <h5>Change Password</h5>
        <form action="{{ route('mentee.logout') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-light mt-3">Logout</button>
        </form>


    </div>
    <div class="main-content">
        <div class="header">The <span class="fw-bold">Neotia</span> University</div>
        <div class="profile-card mt-3">
            <h4>Profile</h4>
            <table class="table">
                <tr>
                    <td><b>Mentee Name</b></td>
                    <td>{{ $student->fname ?? 'N/A' }} {{ $student->lname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mentee ID</b></td>
                    <td>{{ $student->uid ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mobile Number</b></td>
                    <td>{{ $student->mobile ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Email ID</b></td>
                    <td>{{ $student->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td>{{ $student->gender_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Under academic of </b></td>
                    <td>{{ $student->academic_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>School</b></td>
                    <td>{{ $student->school_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Degree</b></td>
                    <td>{{ $student->degree_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Batch</b></td>
                    <td>{{ $student->batch_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Semester</b></td>
                    <td>{{ $student->semester_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Country</b></td>
                    <td>{{ $student->country_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>State</b></td>
                    <td>{{ $student->state_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>District</b></td>
                    <td>{{ $student->district_name ?? 'N/A' }}</td>
                </tr>
            </table>
            
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Home</title>
    <link href="{{ asset('css/bootstraps.css')}}" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
        .highcharts-figure,
.highcharts-data-table table {
    min-width: 320px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

input[type="number"] {
    min-width: 50px;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

    </style>
</head>

<body>

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
        <div class="header">The <span class="fw-bold">Neotia</span> University</div>
        <div class="profile-card mt-3">
            <h4>Profile</h4>
            <table class="table">
                <tr>
                    <td><b>faculty Name</b></td>
                    <td>{{ $faculty->fname ?? 'N/A' }} {{ $faculty->lname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>faculty ID</b></td>
                    <td>{{ $faculty->uid ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>School ID</b></td>
                    <td>{{ $faculty->school ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mobile Number</b></td>
                    <td>{{ $faculty->mobile ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Email ID</b></td>
                    <td>{{ $faculty->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Date of Joining</b></td>
                    <td>{{ $faculty->date_of_joining ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Remarks</b></td>
                    <td>facultying starts from 10-12-2024</td>
                </tr>
            </table>




        </div>
    </div>





</body>

</html>
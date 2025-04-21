<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#dateSelector').on('change', function () {
            let selectedDate = $(this).val();

            if (selectedDate !== "") {
                $.ajax({
                    url: "{{ route('interactions.fetch',$mentee->mentee_id) }}",
                    method: "GET",
                    data: {
                        date: selectedDate
                    },
                    success: function (response) {
                        $('#detailsTable').html(response);
                    },
                    error: function () {
                        $('#detailsTable').html('<p class="text-danger">Failed to load data. Try again.</p>');
                    }
                });
            } else {
                $('#detailsTable').html('');
            }
        });
    });
</script>

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
        <div class="profile-card mt-3">
            <h4>Basic Details</h4>
            <table class="table">
                <tr>
                    <td><b>Mentee Name</b></td>
                    <td>{{ $mentee->fname ?? 'N/A' }} {{ $mentee->lname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mentee ID</b></td>
                    <td>{{ $mentee->uid ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>School ID</b></td>
                    <td>{{ $mentee->school ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Mobile Number</b></td>
                    <td>{{ $mentee->mobile ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Email ID</b></td>
                    <td>{{ $mentee->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>SGPA</b></td>
                    <td>{{ $mentee->sgpa ?? 'N/A' }}</td>
                </tr>
            </table>

        </div>
    </div>

    <div class="main-content">
        <div class="profile-card mt-3">
            <h4>Interaction Details</h4>
            <select id="dateSelector" class="form-select">
                <option value="">Select Date</option>
                @foreach ($dates as $date)
                <option value="{{ $date->date }}">{{ $date->date }}</option>
                @endforeach
            </select>

            <div id="detailsTable" class="table mt-4">
            </div>

        </div>
    </div>











</body>

</html>
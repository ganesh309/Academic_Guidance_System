<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
    <link rel="stylesheet" href="{{ asset('css/viewInteractionsMentor.css') }}">
<body>


    <!-- Mobile sidebar toggle button -->
    <button class="toggle-sidebar d-md-none">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar col-md-2">
        <div class="sidebar-logo">
            <h3>Mentor Portal</h3>
        </div>
        <a href="{{ route('mentor.dashboard') }}">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="{{ route('mentor.mentees') }}">
            <i class="fas fa-users"></i> Mentees
        </a>
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
            <h2>Mentee Profile</h2>
            <span class="info-badge">
                <i class="fas fa-user-circle"></i> Mentor View
            </span>
        </div>

        <div class="profile-card shadow-hover">
            <h4><i class="fas fa-id-card me-2"></i>Basic Details</h4>
            <table class="table">
                <tr>
                    <td width="30%"><b>Mentee Name</b></td>
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

        <div class="profile-card shadow-hover">
            <h4><i class="fas fa-clipboard-list me-2"></i>Interaction Details</h4>
            <div class="custom-select-wrapper">
                <select id="dateSelector" class="form-select">
                    <option value="">Select Date</option>
                    @foreach ($dates as $date)
                    <option value="{{ $date->date }}">{{ $date->date }}</option>
                    @endforeach
                </select>
            </div>

            <div id="detailsTable" class="table mt-4">
                <!-- Ajax content will load here -->
            </div>
        </div>

        <!-- Close button -->
        <div class="text-center mb-4">
            <a href="{{ route('mentor.mentees') }}" class="btn btn-danger px-5 py-2">
                <i class="fas fa-times-circle me-2"></i>Close
            </a>
        </div>
    </div>
</body>
@include('layouts.footer')
           <script>
        $(document).ready(function() {
            $('#dateSelector').on('change', function() {
                let selectedDate = $(this).val();

                if (selectedDate !== "") {
                    $.ajax({
                        url: "{{ route('interactions.fetch',$mentee->mentee_id) }}",
                        method: "GET",
                        data: {
                            date: selectedDate
                        },
                        success: function(response) {
                            $('#detailsTable').html(response);
                        },
                        error: function() {
                            $('#detailsTable').html('<p class="text-danger">Failed to load data. Try again.</p>');
                        }
                    });
                } else {
                    $('#detailsTable').html('');
                }
            });

            // For mobile sidebar toggle
            $('.toggle-sidebar').on('click', function() {
                $('.sidebar').toggleClass('active');
            });
        });
    </script> 

</html>
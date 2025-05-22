<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link href="{{ asset('css/mentorHome.css')}}" rel="stylesheet">
<body>

    <div class="sidebar">
        <div class="sidebar-logo">Mentor Dashboard</div>
        <div class="sidebar-divider"></div>

        <a href="{{ route('mentor.dashboard') }}" class="active">
            <i class="fas fa-home"></i>Home
        </a>
        <a href="{{ route('mentor.mentees') }}">
            <i class="fas fa-users"></i>Mentees
        </a>
        <a href="#">
            <i class="fas fa-lock"></i>Change Password
        </a>

        <div class="sidebar-divider"></div>

        <form action="{{ route('mentor.logout') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-logout">
                <i class="fas fa-sign-out-alt"></i>Logout
            </button>
        </form>
    </div>

    <div class="main-content">
        <div class="header">
                <h2>The Neotia University</h2>
            </div>

        <div class="profile-card">
            <h4>Profile</h4>
            <table class="table">
                <tr>
                    <td><b>Faculty Name</b></td>
                    <td>{{ $faculty->fname ?? 'N/A' }} {{ $faculty->lname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><b>Faculty ID</b></td>
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
                    <td>Mentoring starts from 10-12-2024</td>
                </tr>
            </table>
        </div>
    </div>
@include('layouts.footer')
</body>

</html>
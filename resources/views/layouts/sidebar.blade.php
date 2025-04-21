<!-- resources/views/layouts/sidebar.blade.php -->
<!-- Bootstrap CSS and SweetAlert -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Sidebar Styles -->
<style>
    body {
        background: #f0f2f5;
        height: 100vh;
        margin: 0;
        overflow-x: hidden;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(45deg, #1a1a2e, #16213e);
        padding-top: 20px;
        transition: all 0.3s;
        transform: perspective(800px) rotateY(0deg);
    }

    .sidebar:hover {
        transform: perspective(800px) rotateY(5deg);
        box-shadow: 5px 0 20px rgba(0,0,0,0.2);
    }

    .nav-btn {
        display: block;
        padding: 15px 25px;
        margin: 10px 15px;
        background: #0f3460;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s;
        transform: translateZ(0);
    }

    .nav-btn:hover {
        transform: translateZ(20px) scale(1.05);
        background: #e94560;
        color: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
</style>

<!-- Sidebar HTML -->
<div class="sidebar">
    <h2 class="text-white text-center mb-4">Dashboard</h2>
    <a href="{{ route('students.index') }}" class="nav-btn">Student List</a>
    <a href="{{ route('mentees.index') }}" class="nav-btn">Mentee List</a>
    <a href="{{ route('mentormentees.index') }}" class="nav-btn">Mentor & Mentee List</a>
    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="nav-btn">Logout</button>
    </form>
</div>

<body>
    <!-- Sidebar Navigation -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <div class="welcome-card">
                <h1 class="display-4">Welcome to Dashboard</h1>
                <p class="lead">Select an option from the sidebar to get started.</p>
            </div>

            <!-- Dynamic content section -->
            <div class="mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    @include('layouts.footer')
</body>
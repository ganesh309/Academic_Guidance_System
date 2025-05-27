<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/mentor.login.css') }}">
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-title">
                <h2>Login Here</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('mentor.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control with-icon" id="email" required placeholder="Enter your email">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control with-icon" id="password" required placeholder="Enter your password">
                            <i class="fas fa-eye-slash" id="togglePassword"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('mentor.change.password') }}">Forget Password?</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("togglePassword");

            toggleIcon.addEventListener("click", function() {
                const isPassword = passwordInput.type === "password";
                passwordInput.type = isPassword ? "text" : "password";
                toggleIcon.classList.toggle("fa-eye-slash", !isPassword);
                toggleIcon.classList.toggle("fa-eye", isPassword);
            });
        });
    </script>
    @include('layouts.footer')
</body>
</html>
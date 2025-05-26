<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: 'Arial', sans-serif;
        background: url('/images/Pic 1.jpeg') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Fade-In Animation for Login Box */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Bounce Animation for Logo */
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .login-container {
        text-align: center;
    }

    .card {
        width: 440px;
        height: 420px;
        background: rgba(26, 46, 77, 0.2) !important;
        border: 2px solid rgba(255, 255, 255, 0.7);
        border-radius: 15px;
        padding: 30px;
        backdrop-filter: blur(10px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        animation: fadeIn 1s ease-in-out;
    }

    .admin-logo {
        font-size: 50px;
        color: #fff;
        margin-bottom: 15px;
        animation: bounce 1.5s infinite;
    }

    /* Semi-Transparent Inputs */
    .form-control {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.5);
        color: white;
        padding-right: 40px;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.3);
        box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
        transform: scale(1.02);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.8);
    }

    #password {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    /* Eye Button Inside Password Field */
    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.8);
        cursor: pointer;
    }

    .toggle-password:focus {
        outline: none;
    }

    /* Button Effects */
    .btn-primary {
        transition: background-color 0.3s ease, transform 0.3s ease;
        font-weight: bold;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-primary:active {
        background-color: #003f7f;
        transform: scale(1);
    }
</style>

<body>

    <div class="login-container">
        <div class="card">
            <!-- Admin Logo -->
            <div class="admin-logo">
                <i class="fa-solid fa-user-shield"></i>
            </div>

            <h3 class="text-center mb-4 text-white">Admin Login</h3>

            <!-- Admin Login Form -->
            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Username</label>
                    <input type="text" name="email" class="form-control" id="email" required placeholder="Enter username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password</label>
                    <div class="input-group position-relative">
                        <input type="password" name="password" class="form-control" id="password" required placeholder="Enter password">
                        <button class="toggle-password" type="button">
                            <i class="fa-solid fa-eye-slash"></i>
                        </button>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <!-- Password Toggle Script -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.querySelector('.toggle-password');
            const passwordInput = document.getElementById('password');
            const icon = toggleBtn.querySelector('i');

            toggleBtn.addEventListener('click', function() {
                const isPassword = passwordInput.type === "password";
                passwordInput.type = isPassword ? "text" : "password";
                icon.classList.toggle("fa-eye-slash", !isPassword);
                icon.classList.toggle("fa-eye", isPassword);
            });
        });
    </script>

    @include('layouts.footer')
</body>

</html>
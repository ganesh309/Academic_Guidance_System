<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap and FontAwesome -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminLogin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body, html {
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
            0%, 100% {
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
</head>
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

    <!-- JS Libraries -->
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('popper.min.js') }}"></script>
    <script src="{{ asset('alert.js') }}"></script>


    <!-- SweetAlert + Password Toggle Script -->
    <script>
        window.onload = function () {
            @if (session('error'))
                Swal.fire({
                    title: 'Error',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif
        };

        document.querySelector('.toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        });
    </script>
</body>
</html>

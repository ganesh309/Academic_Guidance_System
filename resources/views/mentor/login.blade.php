<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('/images/Pic 2.jpeg') no-repeat center center fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }


        .card {
            width: 400px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s ease;
            transform: rotateY(0deg);
        }

        

        /* 3D Animation for Inputs */
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 10px;
            color: white;
            padding: 0.8rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .form-control:focus {
            transform: translateZ(10px); /* 3D pop-out effect */
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.3);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Input Icons */
        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.2rem;
        }

        .form-control.with-icon {
            padding-left: 2.5rem;
        }

        /* 3D Button */
        .btn-primary {
            background: linear-gradient(45deg, #ff6b6b, #ff8e53);
            border: none;
            border-radius: 10px;
            padding: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-5px) rotateX(15deg); /* 3D lift effect */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0) rotateX(0deg);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        /* Button Shine Effect */
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent
            );
            transition: 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        /* Labels */
        .form-label {
            color: white;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        /* Heading */
        h2 {
            color: white;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            animation: fadeInDown 1s ease;
        }

        /* Fade-In Animation */
        /* @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        } */

        /* Responsive Adjustments */
        @media (max-width: 576px) {
            .card {
                width: 90%;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <h2>Login Here</h2>
            <form action="{{ route('mentor.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="form-control with-icon" id="email" required placeholder="Enter your email">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" class="form-control with-icon" id="password" required placeholder="Enter your password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXV

b5KZnUuaS6mi6i5G6A==" crossorigin="anonymous"></script>
</body>
</html>
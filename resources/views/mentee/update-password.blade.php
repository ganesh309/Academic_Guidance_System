<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        body {
            background-color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 80%;
            max-width: 1500px;
            height: 700px;
            margin: 20px auto;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            display: flex;
            gap: 300px;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            opacity: 1;
            filter: none;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 0;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-position: 100% 0;
        }

        .password-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 1.5rem;
        }

        img {
            max-width: 350px;
        }

        .text-muted {
            font-size: 0.9rem;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px 0 0 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/images/forgot.png" alt="Password Update Image">
        <div class="auth-card">
            <div class="text-center mb-4">
                <i class="fas fa-lock password-icon"></i>
                <h2 class="font-weight-bold mb-3">Update Your Password</h2>
                <p class="text-muted">Enter and confirm your new password</p>
            </div>
            <form action="{{ route('mentee.save-password') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" name="password" class="form-control" id="password" 
                            placeholder="Enter new password" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" 
                            placeholder="Confirm new password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    Update Password <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        form.classList.add('was-validated');
                    }
                }, false);
            });
        });
    </script>
</body>
</html>
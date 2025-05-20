<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Enhanced Keyframes */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* Background Particles */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 4s ease-in-out infinite;
        }

        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            animation: fadeInUp 0.8s ease-out;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            position: relative;
            overflow: hidden;
        }

        .reset-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: pulse 6s infinite;
            pointer-events: none;
        }

        .reset-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .reset-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-size: 200% 200%;
            border: none;
            border-radius: 50px;
            padding: 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .reset-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.2);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: -1;
        }

        .reset-btn:hover::before {
            transform: scaleX(1);
        }

        .reset-btn:hover {
            letter-spacing: 2.5px;
            transform: translateY(-3px);
            animation: gradientFlow 3s ease infinite;
        }

        .success-message {
            animation: fadeInUp 0.5s ease-out;
            border-left: 4px solid #48bb78;
            transform: translateZ(0);
        }

        .form-title {
            position: relative;
            padding-bottom: 15px;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .form-control {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 10px 0 0 10px;
        }

        .password-icon {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Background Particles -->
    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="reset-card p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-lock password-icon"></i>
                        <h2 class="form-title" style="color: #2d3748;">Update Your Password</h2>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success success-message mb-4 p-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mb-4 p-3">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('mentor.save-password') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="password">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" name="password" class="form-control" id="password" 
                                    placeholder="Enter new password" required>
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" 
                                    placeholder="Confirm new password" required>
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn reset-btn w-100">
                            Update Password <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonColor: '#667eea',
            });
        @endif

        // Form Validation
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

        // Particle Animation
        const particleContainer = document.getElementById('particles');
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            const size = Math.random() * 10 + 5;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDuration = `${Math.random() * 3 + 2}s`;
            particleContainer.appendChild(particle);
            
            setTimeout(() => particle.remove(), 5000);
        }
        setInterval(createParticle, 300);
    </script>
</body>
</html>
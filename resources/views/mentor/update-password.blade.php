<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
 <link rel="stylesheet" href="{{ asset('css/update-password-mentor.css') }}">
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

    @include('layouts.footer')

    <script>
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
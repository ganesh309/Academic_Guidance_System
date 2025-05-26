<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link href="{{ asset('css/mentee.login.css')}}" rel="stylesheet">
<style>
    .input-group {
        position: relative;
    }

    .input-group .icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>

<body>
    <div class="background-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container">
        <div class="light-effect"></div>
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Sign in to continue your mentorship journey</p>
        </div>

        <form action="{{ route('mentee.login') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder=" " required>
                <label for="email">Email Address</label>
                <div class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" placeholder=" " required>
                <label for="password">Password</label>
                <div class="icon" id="togglePassword">
                    <!-- Eye closed SVG -->
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20C7 20 2.73 16.11 1 12c.73-1.82 1.79-3.48 3.06-4.94M9.88 9.88a3 3 0 0 0 4.24 4.24" />
                        <path d="M1 1l22 22" />
                    </svg>
                </div>
            </div>

            <!-- <div class="input-group">
                <input type="password" name="password" id="password" placeholder=" " required>
                
                <label for="password">Password</label>
                <div class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
            </div> -->

            <button type="submit" class="login-button">Sign In</button>
        </form>
        <div class="card-footer">
            <a href="{{ route('mentee.change.password') }}" style="color: #ffffff; text-decoration: none"> Forget Password?</a>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const passwordInput = document.getElementById("password");
                const toggleIcon = document.getElementById("togglePassword");
                const eyeIcon = document.getElementById("eyeIcon");

                const eyeOpenSVG = `
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            </svg>
        `;

                const eyeClosedSVG = `
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20C7 20 2.73 16.11 1 12c.73-1.82 1.79-3.48 3.06-4.94M9.88 9.88a3 3 0 0 0 4.24 4.24"/>
                <path d="M1 1l22 22"/>
            </svg>
        `;

                toggleIcon.addEventListener("click", () => {
                    const isPassword = passwordInput.type === "password";
                    passwordInput.type = isPassword ? "text" : "password";
                    toggleIcon.innerHTML = isPassword ? eyeOpenSVG : eyeClosedSVG;
                });
            });
        </script>


        @include('layouts.footer')
    </div>

</body>

</html>
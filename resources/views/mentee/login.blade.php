<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link href="{{ asset('css/mentee.login.css')}}" rel="stylesheet">

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
                <div class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
            </div>

            <button type="submit" class="login-button">Sign In</button>
        </form>
        <div class="card-footer">
            <a href="{{ route('mentee.change.password') }}" style="color: #ffffff; text-decoration: none"> Forget Password?</a>
        </div>
            @include('layouts.footer')
    </div>

</body>

</html>
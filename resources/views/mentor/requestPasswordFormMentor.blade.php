<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/mentor.login.css') }}">

<body>
    <div class="login-container">
        <div class="card">
            <div class="card-title">
                <h2>Request for New Password</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('mentor.request.password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" class="form-control with-icon" id="email" required placeholder="Enter your email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Request</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('mentor.login') }}" class="text-white"> Back</a>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    <!-- Bootstrap JS and Popper.js -->


</body>

</html>
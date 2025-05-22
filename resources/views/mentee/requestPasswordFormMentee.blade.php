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
                <form action="{{ route('mentee.request.password') }}" method="POST">
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
            <div >
                <a href="{{ route('mentee.login') }}" style="color: #ffffff; text-decoration: none"> Back</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXV
b5KZnUuaS6mi6i5G6A==" crossorigin="anonymous"></script>
    @include('layouts.footer')
</body>

</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Mentorship Platform</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('/images/Pic 3.jpeg') no-repeat center center fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        
        .login-container {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 50px 40px;
            width: 400px;
            max-width: 90%;
            overflow: hidden;
        }
        
        .light-effect {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            pointer-events: none;
            z-index: -1;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .login-header h2 {
            color: #fff;
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }
        
        .login-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 30px;
        }
        
        .input-group input {
            width: 100%;
            padding: 18px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            font-size: 16px;
            color: #fff;
            outline: none;
            transition: all 0.3s;
            font-family: 'Montserrat', sans-serif;
        }
        
        .input-group input::placeholder {
            color: transparent;
        }
        
        .input-group label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus,
        .input-group input:not(:placeholder-shown) {
            border-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: 0;
            left: 15px;
            font-size: 12px;
            background: rgba(142, 45, 226, 0.8);
            padding: 0 8px;
            border-radius: 8px;
            color: #fff;
        }
        
        .input-group .icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.3s;
        }
        
        .input-group input:focus ~ .icon,
        .input-group input:not(:placeholder-shown) ~ .icon {
            color: rgba(255, 255, 255, 0.9);
        }
        
        .login-button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(45deg, #8e2de2, #4a00e0);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 1px;
        }
        
        .login-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
        }
        
        .login-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .login-button:hover::after {
            left: 100%;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        
        .input-group input:focus {
            animation: pulse 1s infinite;
        }
    </style>
</head>
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
    </div>
</body>
</html>
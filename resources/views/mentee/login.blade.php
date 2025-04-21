<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: url('/images/Pic 3.jpeg') no-repeat center center fixed;
            display: flex;
            justify-content: center; 
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.15);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(255, 255, 255, 0.2);
            text-align: center;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 30px rgba(255, 255, 255, 0.3);
        }
        
        h2 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 40px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .input-block {
            position: relative;
            margin-bottom: 25px;
        }
        
        .bubble-wrapper {
            position: relative;
            display: inline-block;
            width: 320px;
            clip-path: inset(0 0 0 0);
        }
        
        .input-block input {
            width: 100%;
            padding: 18px 15px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            outline: none;
            font-size: 16px;
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
        }
        
        .input-block input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .bubble-wrapper::before,
        .bubble-wrapper::after,
        .bubble-wrapper .bubble {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            bottom: 10px;
            opacity: 1;
            z-index: 0;
            animation: bubble 2s infinite ease-in-out;
        }
        
        .bubble-wrapper::before {
            width: 6px;
            height: 6px;
            left: 20px;
        }
        
        .bubble-wrapper::after {
            width: 5px;
            height: 5px;
            right: 30px;
            animation-delay: 0.6s;
            animation-duration: 1.8s;
        }
        
        .bubble-wrapper .bubble:nth-child(1) {
            width: 8px;
            height: 8px;
            left: 50px;
            animation-delay: 1.2s;
            animation-duration: 2.5s;
        }
        
        .bubble-wrapper .bubble:nth-child(2) {
            width: 4px;
            height: 4px;
            right: 60px;
            animation-delay: 1.8s;
            animation-duration: 2.2s;
        }
        
        @keyframes bubble {
            0% {
                transform: translateY(0) translateX(0) scale(1);
                opacity: 1;
            }
            50% {
                transform: translateY(-30px) translateX(3px) scale(1.1);
                opacity: 0.6;
            }
            100% {
                transform: translateY(-60px) translateX(-2px) scale(1.2);
                opacity: 0;
            }
        }
        
        .input-block label {
            position: absolute;
            left: 15px;
            top: 15px;
            font-size: 16px;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            z-index: 2;
        }
        
        .input-block input:focus + label,
        .input-block input:not(:placeholder-shown) + label {
            transform: translateY(-38px);
            font-size: 12px;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            padding: 2px 6px;
            border-radius: 3px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }
        
        .login-button {
            cursor: pointer;
            outline: none;
            border: none;
            padding: 12px 30px;
            background: linear-gradient(45deg, #8e2de2, #4a00e0);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: pulse 2s infinite;
        }
        
        .login-button:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4), 0 0 20px rgba(255, 255, 255, 0.3);
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Here</h2>
        <form action="{{ route('mentee.login') }}" method="POST">
            @csrf
            <div class="input-block">
                <span class="bubble-wrapper">
                    <input type="email" name="email" required id="email" placeholder=" ">
                    <span class="bubble"></span>
                    <span class="bubble"></span>
                </span>
                <label for="email">Email</label>
            </div>
            <div class="input-block">
                <span class="bubble-wrapper">
                    <input type="password" name="password" required id="password" placeholder=" ">
                    <span class="bubble"></span>
                    <span class="bubble"></span>
                </span>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
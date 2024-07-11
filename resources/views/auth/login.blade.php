<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Sesuaikan lebar form sesuai kebutuhan */
        }

        .container form div {
            margin-bottom: 10px;
        }

        .container form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .container form input[type="text"],
        .container form input[type="email"],
        .container form input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .container form button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .container form button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-login a {
            display: inline-block;
            text-align: center;
            padding: 10px;
            border-radius: 3px;
            text-decoration: none;
            color: black;
            background-color: white; /* Background color for Google button */
            border: 1px solid #ccc; /* Border to distinguish from the background */
            font-size: 0; /* Hide text while keeping the link accessible */
        }

        .google {
            /* Remove background color */
        }

        .social-login a svg {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .social-login a span {
            font-size: 16px;
            color: black; /* Text color for Google button */
        }

        .social-login a svg,
        .social-login a span {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
        <div class="social-login">
            <a href="{{ route('login.google') }}" class="google">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px">
                    <path fill="#4285F4" d="M24 9.5c3.9 0 6.9 1.6 9 3.5l6.6-6.6C35.8 2.9 30.3 0 24 0 14.9 0 7.3 5.4 3.5 13.2l7.8 6.1C13.1 12 17.1 9.5 24 9.5z"/>
                    <path fill="#34A853" d="M46.2 24.5c0-1.4-.1-2.8-.4-4H24v8h12.5c-.5 2.3-1.9 4.3-3.9 5.6l6.1 4.8c3.5-3.2 5.5-7.9 5.5-13.4z"/>
                    <path fill="#FBBC05" d="M10.4 28.7c-.9-2.6-.9-5.4 0-8L2.6 14.6C-.9 20.6-.9 27.4 2.6 33.4l7.8-6.1z"/>
                    <path fill="#EA4335" d="M24 48c6.5 0 12-2.1 16-5.6l-6.1-4.8c-2.2 1.5-5 2.4-9.9 2.4-6.9 0-12.9-4.4-15-10.4L3.5 34.8C7.3 42.6 14.9 48 24 48z"/>
                </svg>
                <span>Login with Google</span>
            </a>
        </div>
        <div>
            <p>Belum punya akun? <a href="{{ route('register') }}">Registrasi</a></p>
            <p>Lupa password? <a href="{{ route('password.request') }}">Reset password</a></p>
        </div>
    </div>
</body>
</html>

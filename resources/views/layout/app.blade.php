<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .profile-dropdown {
            text-align: center;
            padding: 10px;
            background-color: #ffc107; /* Warna background sama dengan navbar */
            border-radius: 5px 5px 0 0;
        }
        .profile-photo {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .profile-name {
            font-weight: bold;
            color: white; /* Warna teks putih */
        }
        .dropdown-menu {
            width: 200px;
            padding: 0;
            border-radius: 0 0 5px 5px;
        }
        .dropdown-item {
            text-align: center;
            background-color: #ffffff;
            border-radius: 0 0 5px 5px;
        }
        .dropdown-divider {
            margin: 0;
        }
        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
            border-top: 1px solid #e7e7e7;
            display: flex;
            justify-content: space;
            align-items: center;
        }
        .footer p {
            margin: 0;
            color: #6c757d;
        }
        .footer .social-icons a {
            color: #6c757d;
            margin-left: 10px;
            text-decoration: none;
        }
        .footer .social-icons a:hover {
            color: #333;
        }
        .navbar-brand img {
            height: 40px; /* Adjust as needed */
        }
        .navbar-logo {
            height: 40px; /* Adjust as needed */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('image/logo1.png') }}" alt="Logo" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('alternatif') }}">Alternatif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bobot.index') }}">Bobot</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hasil') }}">Hasil</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Photo" class="profile-photo">
                            @else
                                {{ Auth::user()->name }}
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div class="profile-dropdown">
                                @if (Auth::user()->profile_photo_path)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Photo" class="profile-photo">
                                @endif
                                <div class="profile-name">{{ Auth::user()->name }}</div>
                            </div>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="footer">
        <p>&copy; 2024 Ilham Tegar Pratama.</p>
        <div class="social-icons">
            <a href="https://www.instagram.com/satu.mangga10k/" target="_blank"><i class="fab fa-instagram">instagram</i></a>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>

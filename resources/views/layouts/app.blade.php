<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Land Teamwork')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <style>
        /* Custom styles */
        .navbar {
            background-color: #004a8f;
            position: fixed; /* Fix navbar at the top */
            top: 0;
            width: 100%;
            z-index: 1000; /* Ensures it stays above other elements */
            padding: 1.2rem 1rem; /* Increase padding for taller status bar */
        }
        .navbar-brand, .nav-link, .btn {
            color: white !important;
        }
        .navbar-brand img {
            height: 60px; /* Larger logo height */
            width: auto; /* Maintain aspect ratio */
            margin-right: 10px; /* Space between logo and text */
        }
        .nav-link:hover, .btn-outline-light:hover {
            background-color: #0069d9;
            color: white !important;
            text-decoration: none;
        }
        .btn-outline-light {
            border-color: white;
        }
        .btn-outline-light:hover {
            background-color: #0069d9;
            border-color: #0069d9;
        }
        .content-padding {
            padding-top: 100px; /* Adjust to match the height of the navbar */
        }
        .full-width-image {
            width: 100%;
            height: auto; /* Keeps the image's aspect ratio */
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}" title="Home">
                        <i class="bi bi-house-fill"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" title="Sign In">
                        <i class="bi bi-box-arrow-in-right"></i> Sign In
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light" href="{{ route('register') }}">Create Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="content-padding">
    <div class="container-fluid p-0">
        <img src="{{ asset('assets/images/pg2.png') }}" alt="Land Sales" class="img-fluid full-width-image">
    </div>
    <div class="container my-5">
        <div class="row">
            <!-- Easy Registration Box -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">Easy Registration</h5>
                        <p class="card-text">Sign up quickly and easily to access our services. Just a few steps to get started!</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Interactive Map Box -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">Interactive Map</h5>
                        <p class="card-text">Explore our available plots through an interactive map. Find the perfect location for your needs!</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/map') }}" class="btn btn-primary">View Map</a>
                    </div>
                </div>
            </div>

            <!-- Secure Transactions Box -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">Secure Transactions</h5>
                        <p class="card-text">Enjoy safe and secure transactions for your land purchases. Your data and payments are protected!</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/transactions') }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="text-center py-3 bg-light mt-auto">
    <p class="mb-0">© 2024 Land Teamwork. All rights reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

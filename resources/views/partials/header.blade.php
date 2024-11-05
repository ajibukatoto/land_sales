<header>
    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo">
    <h1>Welcome to the Land Sales System</h1>
    <nav>
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <div class="auth-links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </nav>
</header>

@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="hero text-center">
            <h2>Your dream land is just a click away!</h2>
            <img src="{{ asset('assets/images/pg.jpg') }}" alt="Land Sales" class="img-fluid" />
        </div>
        <div class="features row mt-4">
            <div class="feature col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Easy Registration</h3>
                        <p>Sign up to explore our available land plots with ease.</p>
                        <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
            <div class="feature col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Interactive Map</h3>
                        <p>View land plots on our interactive map.</p>
                        <a href="{{ url('/map') }}" class="btn btn-primary">View Map</a>
                    </div>
                </div>
            </div>
            <div class="feature col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Secure Transactions</h3>
                        <p>Make payments safely and securely through our system.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

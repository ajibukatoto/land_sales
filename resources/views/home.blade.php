@extends('layouts.app')

@section('content')
    <div class="container mt-5">
     
        <div class="features row text-center">
            <div class="feature col-md-4 mb-4">
                <h3>Easy Registration</h3>
                <p>Sign up to explore our available land plots with ease.</p>
            </div>
            <div class="feature col-md-4 mb-4">
                <h3>Interactive Map</h3>
                <p>View land plots on our interactive map.</p>
                <a href="{{ url('/map') }}" class="btn btn-primary">View Map</a>
            </div>
            <div class="feature col-md-4 mb-4">
                <h3>Secure Transactions</h3>
                <p>Make payments safely and securely through our system.</p>
            </div>
        </div>
    </div>
@endsection

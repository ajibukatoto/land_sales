@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Plot</h1>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Plot creation form --}}
        <form action="{{ route('admin.plots.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="plot_number">Plot Number</label>
                <input type="text" name="plot_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="block">Block</label>
                <input type="text" name="block" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="locality">Locality</label>
                <input type="text" name="locality" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="plan_number">Plan Number</label>
                <input type="text" name="plan_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="registered_town_plan_number">Registered Town Plan Number</label>
                <input type="text" name="registered_town_plan_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="legal_area">Legal Area (sq.m)</label>
                <input type="number" name="legal_area" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="district">District</label>
                <input type="text" name="district" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" name="region" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="drawing_number">Drawing Number</label>
                <input type="text" name="drawing_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="survey_type">Survey Type</label>
                <input type="text" name="survey_type" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="surveyor_name">Surveyor Name</label>
                <input type="text" name="surveyor_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="council">Council</label>
                <input type="text" name="council" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Price (Tsh)</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Plot</button>
        </form>
    </div>
@endsection

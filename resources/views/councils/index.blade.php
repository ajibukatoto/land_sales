<!-- resources/views/councils/index.blade.php -->

@extends('layouts.app') <!-- Adjust this if your layout file is named differently -->

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Councils</h1>
        <a href="{{ route('councils.create') }}" class="btn btn-primary">Create New Council</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($councils as $council)
                    <tr>
                        <td>{{ $council->id }}</td>
                        <td>{{ $council->name }}</td>
                        <td>
                            <a href="{{ route('councils.edit', $council->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('councils.destroy', $council->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

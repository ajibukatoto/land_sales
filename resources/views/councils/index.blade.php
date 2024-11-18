@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Land Plots</h2>
        <a href="{{ route('land_plots.create') }}" class="btn btn-primary">Add New Plot</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Plot Number</th>
                    <th>Block</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plots as $plot)
                    <tr>
                        <td>{{ $plot->lotNumber }}</td>
                        <td>{{ $plot->block }}</td>
                        <td>{{ ucfirst($plot->status) }}</td>
                        <td>
                            <a href="{{ route('land_plots.show', $plot) }}" class="btn btn-info">View</a>
                            <a href="{{ route('land_plots.edit', $plot) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('land_plots.destroy', $plot) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

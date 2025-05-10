@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">All Swimmers</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Form -->
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request('name') }}">
        </div>

        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">All Statuses</option>
                <option value="normal" {{ request('status') == 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="alert" {{ request('status') == 'alert' ? 'selected' : '' }}>Alert</option>
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary" type="submit">Filter</button>
            <a href="{{ route('admin.swimmers.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Swimmers Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Heart Rate</th>
                <th>Hydration</th>
                <th>Oxygen</th>
                <th>Temp</th>
                <th>Time in Pool</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($swimmers as $swimmer)
                <tr>
                    <td>{{ $swimmer->user->name }}</td>
                    <td>{{ $swimmer->heart_rate }}</td>
                    <td>{{ $swimmer->hydration }}%</td>
                    <td>{{ $swimmer->oxygen_level }}%</td>
                    <td>{{ $swimmer->temperature }}°C</td>
                    <td>{{ $swimmer->time_in_pool }} min</td>
                    <td>
                        @if($swimmer->status === 'alert')
                            <span class="badge bg-danger">Alert</span>
                        @else
                            <span class="badge bg-success">Normal</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.swimmers.edit', $swimmer->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form action="{{ route('admin.swimmers.destroy', $swimmer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this swimmer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No swimmers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

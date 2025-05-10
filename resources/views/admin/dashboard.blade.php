@extends('layouts.admin') {{-- or 'layouts.app' if sidebar is in app.blade.php --}}

@section('content')
<div class="container-fluid">
    <div class="alert alert-info text-center">
        <h2>Hello, {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</h2>
    </div>

    <h2 class="mb-4">Smart Pool Monitor - Admin Dashboard</h2>

    <!-- Metrics Cards -->
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Active Swimmers</h5>
                <h3>{{ $activeSwimmers->count() }}</h3>
                <p class="text-success">+12% from last hour</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Active Devices</h5>
                <h3>{{ $deviceCount }}</h3>
                <p class="text-muted">98% Connected</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Alerts Today</h5>
                <h3>{{ $alertCount }}</h3>
                <p class="text-danger">{{ $alertCount }} required attentions</p>
            </div>
        </div>
    </div>

    <!-- Search Form -->
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
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Swimmers Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Heart Rate</th>
                    <th>Hydration</th>
                    <th>Oxygen</th>
                    <th>Temperature</th>
                    <th>Time in Pool</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($activeSwimmers as $swimmer)
                    <tr>
                        <td>{{ $swimmer->user->name }}</td>
                        <td>
                            @if($swimmer->status === 'alert')
                                <span class="badge bg-warning text-dark">Warning</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
                        </td>
                        <td>{{ $swimmer->heart_rate }} BPM</td>
                        <td>{{ $swimmer->hydration }}%</td>
                        <td>{{ $swimmer->oxygen_level }}%</td>
                        <td>{{ $swimmer->temperature }} °C</td>
                        <td>{{ $swimmer->time_in_pool }} min</td>
                        <td>
                            <a href="{{ route('admin.swimmers.edit', $swimmer->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center">No swimmers found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

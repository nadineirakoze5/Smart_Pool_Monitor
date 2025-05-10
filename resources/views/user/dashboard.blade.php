@extends('layouts.user') 

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h2>Hello, {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</h2>
        <p class="text-muted">Welcome to your Smart Pool Monitoring Dashboard</p>
    </div>

    @if($swimmer)
    <!-- Health Metrics -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Heart Rate</h6>
                    <h3 class="text-primary">{{ $swimmer->heart_rate }} BPM</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Hydration</h6>
                    <h3 class="text-info">{{ $swimmer->hydration }}%</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Oxygen Level</h6>
                    <h3 class="text-success">{{ $swimmer->oxygen_level }}%</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Temperature</h6>
                    <h3 class="text-danger">{{ $swimmer->temperature }} °C</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Time in Pool</h6>
                    <h3>{{ $swimmer->time_in_pool }} min</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Alerts -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">My Alerts</h5>
            @forelse($swimmer->alerts as $alert)
                <div class="alert {{ $alert->resolved ? 'alert-success' : 'alert-warning' }}">
                    <strong>{{ $alert->type }}:</strong> {{ $alert->message }}
                    <span class="float-end badge {{ $alert->resolved ? 'bg-success' : 'bg-danger' }}">
                        {{ $alert->resolved ? 'Resolved' : 'Unresolved' }}
                    </span>
                </div>
            @empty
                <div class="alert alert-info">No alerts currently.</div>
            @endforelse
        </div>
    </div>
    @else
        <div class="alert alert-warning text-center">
            No swimmer data found. Please contact the administrator.
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Swimmer: {{ $swimmer->user->name }}</h2>

    <form action="{{ route('admin.swimmers.update', $swimmer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Heart Rate</label>
            <input type="number" name="heart_rate" class="form-control" value="{{ $swimmer->heart_rate }}" required>
        </div>

        <div class="mb-3">
            <label>Hydration (%)</label>
            <input type="number" name="hydration" class="form-control" value="{{ $swimmer->hydration }}" required>
        </div>

        <div class="mb-3">
            <label>Oxygen Level (%)</label>
            <input type="number" name="oxygen_level" class="form-control" value="{{ $swimmer->oxygen_level }}" required>
        </div>

        <div class="mb-3">
            <label>Temperature (°C)</label>
            <input type="number" step="0.1" name="temperature" class="form-control" value="{{ $swimmer->temperature }}" required>
        </div>

        <div class="mb-3">
            <label>Time in Pool (minutes)</label>
            <input type="number" name="time_in_pool" class="form-control" value="{{ $swimmer->time_in_pool }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="normal" {{ $swimmer->status === 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="alert" {{ $swimmer->status === 'alert' ? 'selected' : '' }}>Alert</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Swimmer</button>
    </form>
</div>
@endsection

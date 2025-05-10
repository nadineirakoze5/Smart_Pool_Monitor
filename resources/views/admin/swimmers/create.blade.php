@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Swimmer</h2>

    <form action="{{ route('admin.swimmers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                @foreach($usersWithoutSwimmer as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Heart Rate</label>
            <input type="number" name="heart_rate" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Hydration (%)</label>
            <input type="number" name="hydration" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Oxygen Level (%)</label>
            <input type="number" name="oxygen_level" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Temperature (°C)</label>
            <input type="number" name="temperature" step="0.1" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Time in Pool (min)</label>
            <input type="number" name="time_in_pool" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="normal">Normal</option>
                <option value="alert">Alert</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Swimmer</button>
    </form>
</div>
@endsection

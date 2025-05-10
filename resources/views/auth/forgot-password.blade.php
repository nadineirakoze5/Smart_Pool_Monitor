@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Forgot Password</h3>
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
    </form>
</div>
@endsection

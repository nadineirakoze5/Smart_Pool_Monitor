@extends('layouts.app')

@section('content')
<div class="container col-md-6 mt-5">
    <div class="card">
        <div class="card-header text-center">Login</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}">Don't have an account? Register</a>
            </div>
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </div>
</div>
@endsection

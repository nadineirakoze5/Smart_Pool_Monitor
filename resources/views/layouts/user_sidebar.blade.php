<a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
    <i class="bi bi-speedometer2"></i> Dashboard
</a>
<a href="#">
    <i class="bi bi-person"></i> My Profile
</a>
<a href="#">
    <i class="bi bi-bell-fill"></i> Notifications
</a>
<a href="#">
    <i class="bi bi-question-circle-fill"></i> Help
</a>
<form action="{{ route('logout') }}" method="POST" class="p-3">
    @csrf
    <button class="btn btn-light w-100" type="submit">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>

<a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
    <i class="bi bi-grid"></i> Dashboard
</a>
<a href="{{ route('admin.swimmers.index') }}" class="{{ request()->is('admin/swimmers*') ? 'active' : '' }}">
    <i class="bi bi-people-fill"></i> Swimmers
</a>
<a href="#">
    <i class="bi bi-smartwatch"></i> Devices
</a>
<a href="#">
    <i class="bi bi-bar-chart-line"></i> Analytics
</a>
<a href="#">
    <i class="bi bi-gear-fill"></i> Settings
</a>
<a href="#">
    <i class="bi bi-question-circle"></i> Supports
</a>
<form action="{{ route('logout') }}" method="POST" class="px-3 mt-4">
    @csrf
    <button class="btn btn-light w-100" type="submit">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>

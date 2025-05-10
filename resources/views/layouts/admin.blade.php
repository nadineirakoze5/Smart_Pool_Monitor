<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Smart Pool Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #1e3a8a;
            min-height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #2563eb;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar h4 {
            color: white;
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .content {
            padding: 25px;
        }
        .offcanvas-backdrop {
            z-index: 998;
        }
    </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            <i class="bi bi-list"></i>
        </button>
        <span class="navbar-brand mb-0 h1">Smart Pool Monitor Admin</span>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar (collapsible on mobile) -->
        <div class="col-md-3 col-lg-2 d-none d-md-block sidebar">
            <h4><i class="bi bi-droplet-half"></i> Smart Pool Monitor</h4>
            @include('layouts.admin_sidebar')
        </div>

        <!-- Mobile Sidebar -->
        <div class="offcanvas offcanvas-start sidebar d-md-none" tabindex="-1" id="mobileSidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white">Smart Pool</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body p-0">
                @include('layouts.admin_sidebar')
            </div>
        </div>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

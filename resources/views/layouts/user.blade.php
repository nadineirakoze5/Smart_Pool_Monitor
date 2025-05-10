<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - Smart Pool Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar {
            background-color: #1e3a8a;
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #2563eb;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .offcanvas-backdrop {
            z-index: 998;
        }
    </style>
</head>
<body>

<!-- Mobile Navbar -->
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#userSidebar">
            <i class="bi bi-list"></i>
        </button>
        <span class="navbar-brand mb-0">Smart Pool</span>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Desktop Sidebar -->
        <div class="col-md-3 col-lg-2 d-none d-md-block sidebar">
            <h4 class="text-center py-3"><i class="bi bi-droplet-half"></i> Smart Pool</h4>
            @include('layouts.user_sidebar')
        </div>

        <!-- Mobile Sidebar -->
        <div class="offcanvas offcanvas-start sidebar d-md-none" tabindex="-1" id="userSidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white">Smart Pool</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body p-0">
                @include('layouts.user_sidebar')
            </div>
        </div>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 bg-light min-vh-100">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

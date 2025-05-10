<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Pool Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg,rgb(104, 130, 201),rgb(71, 104, 174));
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }
        .center-box {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .btn-white {
            background-color: #fff;
            color:rgb(89, 126, 230);
            border: none;
        }
        .btn-white:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<div class="container center-box">
    <div class="card">
        <h1 class="mb-3">Smart Pool Monitor</h1>
        <p class="mb-4">
            Monitor swimmer safety, water quality, and smart alerts in real-time.
        </p>
        <div class="d-grid gap-3">
            <a href="{{ route('register') }}" class="btn btn-white btn-lg">Register</a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Login</a>
        </div>
    </div>
</div>

</body>
</html>

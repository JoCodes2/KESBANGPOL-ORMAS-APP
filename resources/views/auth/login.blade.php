<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('custom/asset/Group 168.png') }}" type="image/png" />
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('Layouts.style')
    <link rel="stylesheet" href="{{ asset('custom/css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('custom/asset/78786.jpg') }}");
            background-size: cover;
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center px-4 py-4">
        <div class="col-md-12">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 d-flex justify-content-center ">
                    <img src="{{ asset('custom/asset/logo login.png') }}" alt="Logo" class="img-fluid img-login">
                </div>
                <div class="col-md-6">
                    <div class="card py-4 px-4 card-login d-flex align-items-center">
                        <h1 class="text-center card-title-login">Login</h1>
                        <div class="card-body">
                            <form id="LoginForm" class="pt-4" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                                    <i class="fas fa-user"></i> <!-- User icon -->
                                </div>
                                <div class="form-group mt-5">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                                    <i class="fas fa-lock"></i> <!-- Password icon -->
                                </div>
                            </form>
                            <div class="d-flex justify-content-center align-items-center text-center mt-5">
                                <button type="button" class="custom-btn" id="btn-login">Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Layouts.script')
    <script>

    </script>
</body>

</html>

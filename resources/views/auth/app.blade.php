<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous">
    </script>

    <title>Health Welfare Nepal</title>
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            
            <div class="signin-signup">
                @yield('login-content')
            </div>

        </div>

        <div class="panels-container">
            @yield('panel-content')
        </div>

    </div>
</body>
</html>
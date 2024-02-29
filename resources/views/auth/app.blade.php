<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous">
    </script>

    <title>Health Welfare Nepal</title>
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            
            <div class="signin-signup">

                <form method="POST" action="{{ route('login') }}" class="sign-in-form" >
                    @csrf
                    <img src="{{ asset('backend/images/logo.png') }}" class="logo" alt="">
                    <h2 class="title">Sign In</h2>
                
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email">
                    </div>
                
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    
                    <input type="submit" value="Login" class="btn solid">
                
                </form>

                <form method="POST" action="{{ route('register') }}"class="sign-up-form">
                    @csrf
                    <img src="{{ asset('backend/images/logo.png') }}" class="logo" alt="">
                    <h2 class="title">Sign Up</h2>
                
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="name">
                    </div>
                
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="email" name="email">
                    </div>
                
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    
                    <input type="submit" value="Sign Up" class="btn solid">
                </form>
               
            </div>

        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Welcome aboard! 🌟 If you're joining us for the first time, take the next step and create your account by clicking the button below."                        
                        "We're excited to have you become a part of our community. Let's embark on this journey together!"</p>

                    <button class="btn transparent" id="sign-up-btn">Sign Up</button>
                </div>
                <img src="{{ asset('backend/images/log.svg') }}" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us?</h3>
                    <p>"Welcome to our community! 🎉 If you're already a valued member of our organization, simply tap or click the button below to access your account and dive right in."                        
                        "We're thrilled to have you as part of our team. Let's continue this exciting journey together!" </p>

                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </div>
                <img src="{{ asset('backend/images/register.svg') }}" class="image" alt="">
            </div>

        </div>

    </div>
    
    <script src="{{ asset('backend/js/app.js') }}">
    </script>

</body>
</html>
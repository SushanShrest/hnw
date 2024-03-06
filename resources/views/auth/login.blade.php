@extends('auth.app')
@section('login-content')
<form method="POST" action="{{ route('login') }}" class="sign-in-form" >
    {{ csrf_field() }}
    <img src="{{ asset('backend/images/logo.png') }}" class="logo" alt="">
    <h2 class="title">Sign In</h2>

    <div class="input-field has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <i class="fas fa-envelope"></i>
        <input type="text" placeholder="Email" name="email" class="form-control" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    

    <div class="input-field has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" name="password" class="form-control" value="{{ old('password') }}">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>                    
    
    <input type="submit" value="Login" class="btn solid">
</form>    
                
@endsection

@section('panel-content')
<div class="panel left-panel">
    <div class="content">
        <h3>New here?</h3>
        <p>Welcome aboard! 🌟 If you're joining us for the first time, take the next step and create your account by clicking the button below.                       
            "We're excited to have you become a part of our community. Let's embark on this journey together!"</p>
            <a href="{{route('register')}}" class="btn-signup">Sign Up</a>
    </div>
    <img src="{{ asset('backend/images/log.svg') }}" class="image" alt="">
</div>          
@endsection
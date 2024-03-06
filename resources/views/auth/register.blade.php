@extends('auth.app')
@section('login-content')
<form method="POST" action="{{ route('register') }}"class="sign-in-form">
    {{ csrf_field() }}
    <img src="{{ asset('backend/images/logo.png') }}" class="logo" alt="">
    <h2 class="title">Sign Up</h2>

    <div class="input-field has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Username" name="name" class="form-control" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="input-field has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email" name="email" class="form-control" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="input-field has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" name="password" class="form-control">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
       
    <input type="submit" value="Sign Up" class="btn solid">
</form>
@endsection
                
               
@section('panel-content')
<div class="panel left-panel">
    <div class="content">
        <h3>One of us?</h3>
        <p>"Welcome to our community! 🎉 If you're already a valued member of our organization, simply tap or click the button below to access your account and dive right in."                        
            "We're thrilled to have you as part of our team. Let's continue this exciting journey together!" </p>

            <a href="{{route('login')}}" class="btn-signup">Sign In</a>
    </div>
    <img src="{{ asset('backend/images/register.svg') }}" class="image" alt="">
</div>
@endsection
            
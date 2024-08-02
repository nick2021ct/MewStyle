@extends('user.layouts.app')

@section('body')

<div class="login-section">
    <div class="materialContainer">
        <div class="box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-title">
                    <h2>Login</h2>  
                </div>
                
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
                    @error('email')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>

                <a href="{{ route('password.request') }}" class="pass-forgot">Forgot your password?</a>

                <div class="button login">
                    <button type="submit">
                        <span>Log In</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>

                <p>Not a member? <a href="register.html" class="theme-color">Sign up now</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
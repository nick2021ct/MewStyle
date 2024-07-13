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
                    <label for="name">Email</label>
                    <input type="email" id="name" name="email" :value="old('email')" required="" autofocus=""
                        autocomplete="name">
                </div>
                @error('name')
                <strong style="color: red">{{ $message }}</strong>
            @enderror
                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" id="pass" class="block mt-1 w-full" name="password" required=""
                        autocomplete="current-password">
                </div>
                @error('name')
                <strong style="color: red">{{ $message }}</strong>
            @enderror
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

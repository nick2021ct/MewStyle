@extends('user.layouts.app')

@section('body')

<div class="login-section">
    <div class="materialContainer">
        <div class="box">
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="login-title">
                    <h2>Register</h2>
                </div>

                <div class="input">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')"  autofocus="" autocomplete="name">
                       
                </div>

                    @error('name')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror
                <div class="input">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" class="block mt-1 w-full" type="text" name="phone"
                        :value="old('phone')"  autofocus="" autocomplete="phone">
                        @error('phone')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="input">
                    <label for="emailname">Email Address</label>
                    <input type="email" id="emailname" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')"  autocomplete="username">
                        @error('email')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" id="pass" class="block mt-1 w-full" name="password" 
                        autocomplete="new-password">
                        @error('password')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="input">
                    <label for="compass">Confirm Password</label>
                    <input type="password" id="compass" class="block mt-1 w-full" name="password_confirmation"
                         autocomplete="new-password">
                        @error('password_confirmation')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="button login">
                    <button type="submit">
                        <span>Sign Up</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
        <p><a href="{{ route('login') }}" class="theme-color">Already have an account?</a></p>
    </div>
</div>

@endsection

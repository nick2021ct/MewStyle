@extends('user.layouts.app')

@section('body')

<div class="login-section">
    <div class="materialContainer">
        <div class="box">
            
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="login-title">
                    <h2>Reset Password</h2>
                </div>

                <div class="input">
                    <label for="emailname"></label>
                    <input type="email" id="emailname_display" class="block mt-1 w-full" 
                    value="{{ $email ?? old('email') }}" autocomplete="email" autofocus readonly>
             
                    <input type="hidden" id="emailname_hidden" class="block mt-1 w-full" 
                    name="email" value="{{ $email ?? old('email') }}" autocomplete="email">

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
                        <span>Reset Password</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

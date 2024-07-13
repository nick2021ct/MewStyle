@extends('user.layouts.app')

@section('body')
<div class="login-section">
    <div class="materialContainer">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="box">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="login-title">
                    <h2>Forgot password</h2>  
                </div>
                <div class="input">
                    <label for="name">Email</label>
                    <input type="email" id="name" name="email" :value="old('email')" required="" autofocus=""
                        autocomplete="name">
                </div>
                @error('name')
                <strong style="color: red">{{ $message }}</strong>
            @enderror

                <div class="button login">
                    <button type="submit">
                        <span>Sent to email</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

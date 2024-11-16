@extends('layouts.app')
@section('content')
<!-- x-guest-layout> -->
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<div class="login-background " style="background-image: url('/backgroundImg/bgImg1.png');">
    <form class="bg-light p-5" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-outline mb-4" data-mdb-input-init>
            <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username" id="txtEmail" class="form-control" />
            <label class="form-label" for="txtEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <!-- Password -->
        <div class="form-outline mb-4" data-mdb-input-init>
            <input type="password" id="password" class="form-control block mt-1 w-full" name="password"
            required autocomplete="current-password" />
            <label class="form-label" for="password">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <!-- 2 column grid layout for inline styling -->
        <div class="row mt-2">
            <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            </div>

            <div class="col">
                <div class="mt-2">
                    <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __("I don't have an account?") }}
                    </a>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-2 mb-2" data-mdb-ripple-init>
                {{ __('Log in') }}
            </button>
        <div class=" mt-1">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            
        </div>
    <!-- </form> -->
    </form></div>
<!-- /x-guest-layout> -->
@endsection

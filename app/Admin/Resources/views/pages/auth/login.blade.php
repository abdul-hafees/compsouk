@extends('admin::layouts.auth')
@section('title', 'Sign In')

@section('content')
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="email" name="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" autofocus/>

            <label class="floating-label" for="email">{{ __('E-Mail Address') }}</label>

            @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="password" name="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" />

            <label class="floating-label" for="password">{{ __('Password') }}</label>

            @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">{{ __('Remember Me') }}</label>
            </div>
            @if (Route::has('admin.password.request'))
            <a class="float-right" href="{{ route('admin.password.request') }}">Forgot password?</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
    </form>
    <p>Don't you have account? Please go to <a href="{{ route('admin.register') }}">Register</a></p>

@endsection

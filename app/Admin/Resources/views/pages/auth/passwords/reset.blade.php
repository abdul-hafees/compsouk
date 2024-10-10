@extends('admin::layouts.auth')
@section('title', 'Reset Password')

@section('header')
    <h2>Reset Password</h2>
    <p>Input your registered email and new password to reset</p>
@endsection

@section('content')
    @if ($errors->has('token'))
        <div class="alert alert-danger" role="alert">
            {{  $errors->first('token') }}
        </div>
    @endif

    <form id="form-reset" method="post" action="{{ route('admin.password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="email" name="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ $email ?? old('email') }}" required autofocus/>

            <label class="floating-label">{{ __('Email') }}</label>

            @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="password" name="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" required />

            <label class="floating-label" for="password">Password</label>

            @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror

        </div>
        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required />

            <label class="floating-label" for="password_confirmation">Re-enter Password</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">{{ __('Reset Password') }}</button>
    </form>
@endsection

<script>

    $(function(e) {

        $('#form-reset').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength : 8
                },
                password_confirmation: {
                    required: true,
                    minlength : 8,
                    equalTo : "#password"
                }

            }
        });

    });
</script>

@extends('admin::layouts.auth')
@section('title', 'Register')

@section('content')
    <form method="post" action="#">
        @csrf

        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="name" name="name"type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required autofocus />

            <label class="floating-label" for="name">Full Name</label>

            @error('name')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="email" name="email"type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required />

            <label class="floating-label" for="email">Email</label>

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

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Register</button>
    </form>
    <p>Have account already? Please go to <a href="{{ route('admin.login') }}">Sign In</a></p>
@endsection


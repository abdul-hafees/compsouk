@extends('admin::layouts.app')
@section('title', 'Password')

@section('header')
    <h1 class="page-title">Edit Password</h1>
@endsection

@section('content')
    <div class="panel">
        <form class="confirm" id="form-password-create" method="POST"
              action="{{ route('admin.profile.update-password') }}">
            @csrf
            <div class="panel-body pt-40">
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-black-50">Old Password<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-9"><input id="current_password" name="current_password" type="password"
                                                         class="form-control @error('name') is-invalid @enderror"
                                                         placeholder="Current Password"
                                                         autocomplete="off">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-black-50">New Password<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-9"><input id="new_password" name="new_password" type="password"
                                                         class="form-control @error('name') is-invalid @enderror"
                                                         placeholder="New Password"
                                                         autocomplete="off">
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-black-50">Confirm Password<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-9"><input id="confirmation_password" name="confirmation_password" type="password"
                                                         class="form-control @error('name') is-invalid @enderror"
                                                         placeholder="Confirm Password"
                                                         autocomplete="off">
                                @error('confirmation_password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr/>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-9">
                        <button id="btn-submit" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $('#form-password-create').validate({
            rules: {
                current_password: {
                    required: true
                },
                new_password: {
                    required: true
                },
                confirmation_password: {
                    equalTo : '[name="new_password"]'
                }
            },
        });
    </script>
@endpush

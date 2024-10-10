@extends('admin::layouts.app')
@section('title', 'Profile')

@section('header')
    <h1 class="page-title">Edit Profile</h1>
@endsection

@section('content')
    <div class="panel">
        <form class="confirm" id="form-profile" method="POST"
              action="{{ route('admin.profile.update-profile') }}">
            @csrf
            <div class="panel-body pt-40">
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-black-50">Name<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input id="name" name="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter name" value="{{ old('name', $admin->name) }}"
                                       autocomplete="off">
                                @error('name')
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
        $('#form-profile').validate({
            rules: {
                name: {
                    required: true
                }
            },
        });
    </script>
@endpush

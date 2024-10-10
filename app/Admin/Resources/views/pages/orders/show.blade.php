@extends('admin::layouts.app')
@section('title', 'Admins')


@section('header')
    <h1 class="page-title">Admin Details</h1>
        <div class="page-header-actions">
            @can('users.update')
                <a class="btn btn-sm btn-primary btn-round user-details-edit" href="#">
                    <i class="icon fa fa-edit" aria-hidden="true"></i>
                    <span class="text hidden-sm-down">Edit</span>
                </a>
            @endcan
        </div>
@endsection

@section('content')
    {{--<h2>Admins</h2>--}}
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.admins.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container rounded bg-white mt-5 mb-5">
                <div class="row pb-2">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5 border " style="object-fit: cover" width="150px" height="150px"
                                 src="{{ $imageUrl ?? asset('assets/admin/images/user-icon.jpg') }}">

                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">

                                <div class="row mt-2">
                                <div class="col-md-6 pt-2 pb-2">
                                    <label class="labels">Name</label>
                                    <input type="text" class="form-control edit-input-field edit-input-field" name="name" id="name" placeholder="Enter name"
                                           value="{{ old('name', $user->name) }}" disabled>
                                </div>
                                <div class="col-md-6 pt-2 pb-2">
                                    <label class="labels">Email</label>
                                    <input type="email" class="form-control edit-input-field" name="email" id="email" placeholder="Enter email"
                                           value="{{ old('email', $user->email) }}" disabled>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('.user-details-edit').on('click', function () {
            $('.edit-input-field').each(function () {
                $(this).removeAttr('disabled');
            });
            $('.user-image').removeClass('d-none');
            $('.submit-button').removeClass('d-none');
        });
    </script>
@endpush

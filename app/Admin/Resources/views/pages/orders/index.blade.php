@extends('admin::layouts.app')
@section('title', 'Orders')


@section('header')
<h1 class="page-title">Orders</h1>
<div class="page-header-actions">

    <a class="btn btn-sm btn-secondary" href="#" data-toggle='modal' data-target='#excel-modal'>
        <i class="icon fa fa-plus" aria-hidden="true"></i>
        <span class="text hidden-sm-down">Import</span>
    </a>
    <a class="btn btn-sm btn-primary" href="{{ route('admin.orders.create') }}">
        <i class="icon fa fa-plus" aria-hidden="true"></i>
        <span class="text hidden-sm-down">Create</span>
    </a>
</div>
@endsection

@section('content')
{{--<h2>Admins</h2>--}}
<div class="card">
    <div class="card-body bg-grey-100">
        <form id="form-filter-temples" class="form-inline mb-0">
            <div class="form-group">
                <label class="sr-only" for="inputUnlabelUsername">Search</label>
                <input id="search-query" type="text" class="form-control w-full" placeholder="Search..."
                    autocomplete="off">
            </div>
            <div class="form-group">
                <button id="btn-filter-temples" type="submit" class="btn btn-primary btn-outline">Search</button>
                <a id="btn-clear" class="btn btn-primary ml-2 text-white">Clear</a>
            </div>
        </form>
    </div>
    <div class="card-body">
        {!! $html->table(['id' => 'tbl-orders'], true) !!}
    </div>
</div>

<div class="modal" tabindex="-1" id="excel-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="excel-form" method="POST" action="{{ route('admin.orders.import-excel') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="excel" name="excel" type="file" required
                                class="form-control @error('excel') is-invalid @enderror" placeholder="Order date"
                                value="{{ old('excel') }}" autocomplete="off">
                            @error('excel')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror

                            <a href="{{ asset('assets/imports/orders.xlsx') }}" target="_blank"
                                class="btn btn-primary btn-sm mt-10">
                                <i class="fa fa-download" aria-hidden="true"></i> Download Sample Excel File
                            </a>
                        </div>
                    </div>
                    <div class="row m-2 breadcrumb-item">
                        <ol>
                            <li>Reference number is required, if already exists inthe record it replace the data</li>
                            <li>Order date format must be in 'YYYY-MM-DD' eg: 2024-10-20</li>
                            <li>Status should be from the given list :
                                {{ implode(', ', App\Enums\OrderStatus::toValues()) }}</li>
                            <li>Payment method should be from the given list :
                                {{ implode(', ', App\Enums\PaymentMethod::toValues()) }}</li>
                            <li>Total amount, billing address and shipping address is required</li>
                        </ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{!! $html->scripts() !!}
@endpush

@push('scripts')
<script>
    $(function () {
        @if($errors->any() && Session::has('excel'))
        $(document).ready(function () {
            {
                {
                    Session::forget('excel')
                }
            }
            $('#excel-modal').modal('show');
        });
        @endif

        var $table = $('#tbl-orders');

        $table.on('preXhr.dt', function (e, settings, data) {
            data.filter = {
                search: $('#search-query').val(),

            };
        });

        $('#form-filter-temples').submit(function (e) {
            e.preventDefault();
            $table.DataTable().draw();
        });

        $('#btn-clear').click(function () {

            $('#search-query').val('');
            $table.DataTable().draw();
        });

        $table.on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            Swal.fire(
                                "Deleted!",
                                "The record has been deleted.",
                                'success'
                            );
                            $table.DataTable().draw();
                        },
                        error: function (xhr) {
                            Swal.fire(
                                "Error!",
                                "Something went wrong.",
                                'error'
                            );
                        }
                    });
                }
            });
        });

    })

</script>
@endpush

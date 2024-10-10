@extends('admin::layouts.app')
@section('title', 'Orders')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="panel">
        <form class="confirm" id="form-order-edit" method="POST" action="{{ route('admin.orders.update', $order->id) }}">
            @csrf
            @method('PUT')
            <div class="panel-body pt-40">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Reference Number<span class="required">*</span> </label>
                            <div class="col-md-9">
                                <input id="reference_number" name="reference_number" type="text"
                                       class="form-control @error('reference_number') is-invalid @enderror"
                                       placeholder="Reference Number" value="{{ old('reference_number', $order->reference_number) }}" autocomplete="off">
                                @error('reference_number')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Order Date<span class="required">*</span> </label>
                            <div class="col-md-9">
                                <input id="order_date" name="order_date" type="date"
                                       class="form-control @error('order_date') is-invalid @enderror"
                                       placeholder="Order date" value="{{ old('order_date', $order->order_date) }}" autocomplete="off">
                                @error('order_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status <span class="required">*</span></label>
                            <div class="col-md-9">
                                <select id="status" name="status"
                                        class="form-control select2 @error('status') is-invalid @enderror">
                                    <option value="">Select Status</option>
                                    @foreach($orderStatuses as $key => $status)
                                        <option value="{{ $key }}" {{ old('status', $order->status) == $key ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Total Amount<span class="required">*</span> </label>
                            <div class="col-md-9">
                                <input id="total_amount" name="total_amount" type="text"
                                       class="form-control @error('total_amount') is-invalid @enderror"
                                       placeholder="Total amount" value="{{ old('total_amount', $order->total_amount) }}" autocomplete="off">
                                @error('total_amount')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Payment Method <span
                                    class="required">*</span></label>
                            <div class="col-md-9">
                                <select id="payment_method" name="payment_method"
                                        class="form-control select2 @error('payment_method') is-invalid @enderror">
                                    <option value="">Select Payment Method</option>
                                    @foreach($paymentMethods as $key => $method)
                                        <option
                                            value="{{ $key }}" {{ old('payment_method', $order->payment_method) == $key ? 'selected' : '' }}>
                                            {{ $method }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('payment_method')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Billing Address <span
                                    class="required">*</span></label>
                            <div class="col-md-9">
                                <textarea id="billing_address" name="billing_address"
                                          class="form-control @error('billing_address') is-invalid @enderror"
                                          placeholder="Enter billing address" rows="4">{{ old('billing_address', $order->billing_address) }}</textarea>
                                @error('billing_address')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Shipping Address <span
                                    class="required">*</span></label>
                            <div class="col-md-9">
                                <textarea id="shipping_address" name="shipping_address"
                                          class="form-control @error('shipping_address') is-invalid @enderror"
                                          placeholder="Enter billing address" rows="4">{{ old('shipping_address', $order->shipping_address) }}</textarea>
                                @error('shipping_address')
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
                        <button id="btn-submit" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';
            $('#form-order-edit').validate({

                rules: {
                    order_date: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                    total_amount: {
                        required: true
                    },
                    payment_method: {
                        required: true
                    },
                    billing_address: {
                        required: true
                    },
                    shipping_address: {
                        required: true
                    }
                }
            });
        });
    </script>
@endpush

<?php

namespace App\Admin\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Imports\OrderImport;
use App\Models\Admin;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Html\Builder;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index(Builder $builder)
    {
        if(request()->ajax()) {
            $query = Order::query()
                ->where('admin_id', auth()->id())
                ->orderBy('updated_at','desc');
            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->filter(function ($query) {
                    if (request()->filled('filter.search')) {
                        $query->where(function ($query) {
                            $query->where('order_date', 'like', "%" . request('filter.search') . "%")
                                ->orWhere('order_date',request('filter.search'))
                                ->orWhere('order_date',request('filter.search'));

                        });
                    }
                })
                ->editColumn('order_date', function ($order) {
                    return Carbon::parse($order->order_date)->format('d-M-Y');
                })
                ->editColumn('status', function ($order) {
                    return optional($order->status)->label ?? '';
                })
                ->editColumn('payment_method', function ($order) {
                    return optional($order->payment_method)->label ?? '';
                })
                ->addColumn('action', 'admin::pages.orders.action')
                ->make(true);
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
            ['data' => 'reference_number', 'name' => 'reference_number', 'title' => 'Reference Number'],
            ['data' => 'order_date', 'name' => 'order_date', 'title' => 'Order Date'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'total_amount', 'name' => 'total_amount', 'title' => 'Total Amount'],
            ['data' => 'payment_method', 'name' => 'payment_method', 'title' => 'Payment Method'],
            ['data' => 'shipping_address', 'name' => 'shipping_address', 'title' => 'Shipping Address'],
            ['data' => 'billing_address', 'name' => 'billing_address', 'title' => 'Billing Address'],
        ])
            ->parameters([
                'searching' => false,
                'ordering' => false,
                'pageLength' => 15
            ])
            ->addAction(['title' => '', 'class' => 'text-right p-3', 'width' => 70]);


        return view('admin::pages.orders.index', compact('html'));
    }

    public function create()
    {
        $orderStatuses = OrderStatus::toArray();
        $paymentMethods = PaymentMethod::toArray();
        return view('admin::pages.orders.create', compact('orderStatuses', 'paymentMethods'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "order_date" => "required|date_format:Y-m-d",
            "status" => ["required", Rule::in(array_column(OrderStatus::cases(), 'value'))],
            "reference_number" => "required|unique:orders,reference_number",
            "total_amount" => "required|numeric|min:0",
            "payment_method" => ["required", Rule::in(array_column(PaymentMethod::cases(), 'value'))],
            "billing_address" => "required|string|max:255",
            "shipping_address" => "required|string|max:255",
        ]);

        $order = new Order();
        $order->reference_number = $request->input('reference_number');
        $order->order_date = $request->input('order_date');
        $order->status = $request->input('status');
        $order->total_amount = $request->input('total_amount');
        $order->payment_method = $request->input('payment_method');
        $order->billing_address = $request->input('billing_address');
        $order->shipping_address = $request->input('shipping_address');
        $order->admin_id = \Auth::id();
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', "Successfully Created");
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $orderStatuses = OrderStatus::toArray();
        $paymentMethods = PaymentMethod::toArray();

        return view('admin::pages.orders.edit', compact('order', 'orderStatuses', 'paymentMethods'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "order_date" => "required|date_format:Y-m-d",
            "status" => ["required", Rule::in(array_column(OrderStatus::cases(), 'value'))],
            "reference_number" => "required|unique:orders,reference_number," . $id,
            "total_amount" => "required|numeric|min:0",
            "payment_method" => ["required", Rule::in(array_column(PaymentMethod::cases(), 'value'))],
            "billing_address" => "required|string|max:255",
            "shipping_address" => "required|string|max:255",
        ]);

        $order = Order::findOrFail($id);
        $order->reference_number = $request->input('reference_number');
        $order->order_date = $request->input('order_date');
        $order->status = $request->input('status');
        $order->total_amount = $request->input('total_amount');
        $order->payment_method = $request->input('payment_method');
        $order->billing_address = $request->input('billing_address');
        $order->shipping_address = $request->input('shipping_address');
        $order->admin_id = \Auth::id();
        $order->save();
        return redirect()->route('admin.orders.index')->with('success', "Successfully Updated");
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response()->json(['message' => "Order deleted successfully"]);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    public function importOrders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'excel' => 'required|mimes:xls,xlsx',
            ]);
            if ($validator->fails()) {
                Session::put('excel', true);
                return redirect()->back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
            }

            $file = $request->file('excel');
            $destinationPath = './storage/app/public/imports/orders/';
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::uuid() . '.' . $extension;
            $file->move($destinationPath, $fileName);

            Excel::import(new OrderImport, 'storage/app/public/imports/orders/' . $fileName);

            $importedFilePath = 'storage/app/public/imports/orders/' . $fileName;
            if (file_exists($importedFilePath)) {
                unlink($importedFilePath);
            }

            return redirect()->back()->with('success', __('translation.data_imported_successfully'));
        } catch (\Exception $exception) {
            Session::put('excel', true);
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}

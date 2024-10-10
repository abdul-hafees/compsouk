<?php

/*
@copyright

SUTFleet360

Copyright (C) 2024 SKYUNITECH <https://skyuni.tech/> All rights reserved.
Design and developed by SKYUNITECH <https://skyuni.tech/>

*/

namespace App\Imports;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements ToModel, WithHeadingRow
{
    public function model(array $order)
    {
        try {
            $orderDate = \Carbon\Carbon::createFromFormat('Y-m-d', gmdate('Y-m-d', ($order['order_date'] - 25569) * 86400))->format('Y-m-d');
        }catch (\Exception $e) {
            throw new \Exception("Order date must be in the format 'Y-m-d'");
        }

        if ($order['reference_number'] == null) {
            throw new \Exception("Reference number is required");
        }
        if (! $orderDate) {
            throw new \Exception("Order date is required");
        }

        if ($order['total_amount'] == null) {
            throw new \Exception("Total amount is required");
        }
        if ($order['shipping_address'] == null) {
            throw new \Exception("Shipping address is required");
        }
        if ($order['billing_address'] == null) {
            throw new \Exception("Billing address is required");
        }
        if ($order['status'] == null) {
            throw new \Exception("Status is required");
        }
        try {
            OrderStatus::from($order['status']);
        } catch (\Exception $e) {
            throw new \Exception("Invalid status value");
        }
        if ($order['payment_method'] == null) {
            throw new \Exception("Status is required");
        }
        try {
            PaymentMethod::from($order['payment_method']);
        } catch (\Exception $e) {
            throw new \Exception("Invalid payment method value");
        }

        Order::updateOrCreate(['reference_number' => $order['reference_number'], 'admin_id' => \Auth::id()], [
            'status' => $order['status'],
            'payment_method' => $order['payment_method'],
            'order_date' => $orderDate,
            'total_amount' => $order['total_amount'],
            'shipping_address' => $order['shipping_address'],
            'billing_address' => $order['billing_address'],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $index = Order::where('status', true)->orderBy('id','asc')->get();
            return response()->json([
                'status' => 1,
                'data' => $index
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {
            $store = new Order();
            $store->customer_id = $request->customer_id;
            $store->order_date = $request->order_date;
            $store->ship_time = $request->ship_time;
            $store->ship_address = $request->ship_address;
            $store->ship_city = $request->ship_city;
            $store->save();

            return response() -> json([
                'status' => '1',
                'message' => 'Categories are Added Successfully.',
                'data' => $store
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;


class OrderDetailController extends Controller
{
    public function index()
    {
        try {
            $index = OrderDetail::where('status', true)->orderBy('id','asc')->get();
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
            $store = new OrderDetail();
            $store->orderID = $request->orderID;
            $store->productID = $request->productID;
            $store->unitPrice = $request->unitPrice;

            $store->save();

            return response() -> json([
                'status' => '1',
                'message' => 'OrderDetailController are Added Successfully.',
                'data' => $store
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    } 
}

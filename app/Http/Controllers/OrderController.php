<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

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
            $validator = Validator::make($request->all(), [
                'order_date' => 'required',
                'ship_time' => 'required',
                'ship_address' => 'required',
                'ship_city' => 'required'
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'status' => '0',
                    'message' => 'Validation Error.',
                    'errors' => $validator->errors()
                ]);
            }



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

    public function show($id){

        try {
            $showOrders = Order::where('id', $id)->where('status', true)->first();
            return response ()-> json([
                'status' => 1,
                'data' => $showOrders
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id){
        try {
            $validator = Validator::make($request->all(), [
                'order_date' => 'required',
                'ship_time' => 'required',
                'ship_address' => 'required',
                'ship_city' => 'required'
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'status' => '0',
                    'message' => 'Validation Error.',
                    'errors' => $validator->errors()
                ]);
            }
            $updateOrders = Order::where('id', $id)->where('status', true)->first();
            $updateOrders->customer_id = $request->customer_id;
            $updateOrders->order_date = $request->order_date;
            $updateOrders->ship_time = $request->ship_time;
            $updateOrders->ship_address = $request->ship_address;
            $updateOrders->ship_city = $request->ship_city;
            $updateOrders->save();

            return response ()-> json ([
                'status' => 1,
                'message' => 'Orders  Are Updated Successfully',
                'data' => $updateOrders

            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function destory($id){
        try {
            $destoryOrder = Order::where('id', $id)->where('status', 1)->first();
            $destoryOrder->status = false;
            $destoryOrder->save();
            return response()->json([
                'status' => 1,
                'message' => 'Delete A Orders',
                'data' => $destoryOrder
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }  
    }

}

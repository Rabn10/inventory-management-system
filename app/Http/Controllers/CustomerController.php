<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        try {
            $index = Customer::where('status', true)->orderBy('id','asc')->get();
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
            $store = new Customer();
            $store->customer_name = $request->customer_name;
            $store->contact_number = $request->contact_number;
            $store->address = $request->address;
            $store->city = $request->city;
            $store->email = $request->email;
            $store->save();

            return response() -> json([
                'status' => '1',
                'message' => 'Customers are Added Successfully.',
                'data' => $store
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id){
        // dd($id);
        try {
            $showCustomer = Customer::where('id', $id)->where('status', true)->first();
            return response ()-> json([
                'status' => 1,
                'data' => $showCustomer
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update(Request $request, $id){
        try {
            $updateCustomer = Customer::where('id', $id)->where('status', true)->first();
            $updateCustomer->customer_name = $request->customer_name;
            $updateCustomer->contact_number = $request->contact_number;
            $updateCustomer->address = $request->address;
            $updateCustomer->city = $request->city;
            $updateCustomer->email = $request->email;
            $updateCustomer->save();
            return response ()-> json ([
                'status' => 1,
                'message' => 'Customers  Are Updated Successfully',
                'data' => $updateCustomer

            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destory($id){
        try {
            $destoryCust = Customer::where('id', $id)->where('status', 1)->first();
            $destoryCust->status = false;
            $destoryCust->save();
            return response()->json([
                'status' => 1,
                'message' => 'Delete A Customers',
                'data' => $destoryCust
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }  
    }
}

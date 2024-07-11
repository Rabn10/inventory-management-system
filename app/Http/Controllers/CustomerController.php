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
}

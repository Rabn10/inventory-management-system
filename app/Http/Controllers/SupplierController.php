<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        try {
            $index = Supplier::where('status', true)->orderBy('id','asc')->get();
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
            $store = new Supplier();
            $store->supplierID = $request->supplierID;
            $store->suppliersName = $request->suppliersName;
            $store->contactName = $request->contactName;
            $store->address = $request->address;
            $store->city = $request->city;
            $store->phone = $request->phone;
            $store->email = $request->email;
            $store->save();

            return response() -> json([
                'status' => '1',
                'message' => 'Suppliers are Added Successfully.',
                'data' => $store
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

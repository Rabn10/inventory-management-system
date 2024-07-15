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

    public function show($id){
        // dd($id);
        try {
            $showSuppliers = Supplier::where('id', $id)->where('status', true)->first();
            return response ()-> json([
                'status' => 1,
                'data' => $showSuppliers
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id){
        try {
            $UpdateSup = Supplier::where('id', $id)->where('status', true)->first();
            $UpdateSup->supplierID = $request->supplierID;
            $UpdateSup->suppliersName = $request->suppliersName;
            $UpdateSup->contactName = $request->contactName;
            $UpdateSup->address = $request->address;
            $UpdateSup->city = $request->city;
            $UpdateSup->phone = $request->phone;
            $UpdateSup->email = $request->email;
            $UpdateSup->save();

            return response ()-> json ([
                'status' => 1,
                'message' => 'Suppliers  Are Updated Successfully',
                'data' => $UpdateSup

            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    } 

    public function destory($id){
        try {
            $destorySup = Supplier::where('id', $id)->where('status', 1)->first();
            $destorySup->status = false;
            $destorySup->save();
            return response()->json([
                'status' => 1,
                'message' => 'Delete A Suppliers',
                'data' => $destorySup
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }  
    }
}

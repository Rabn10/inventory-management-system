<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $index = Product::where('status', true)->orderBy('id','asc')->get();
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
            $store = new Product();
            $store->product_name = $request->product_name;
            $store->suppliersID = $request->suppliersID;
            $store->categories = $request->categories;
            $store->quantity = $request->quantity;
            $store->unitsInStock = $request->unitsInStock;
            $store->UnitOnOrders = $request->UnitOnOrders;
            $store->save();

            return response() -> json([
                'status' => '1',
                'message' => 'Products are Added Successfully.',
                'data' => $store
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show ($id){
        try {
            $showProducts = Product::where('id',$id)->where('status', true)->first();
            return response()->json([
                'status' => 1,
                'data' => $showProducts
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id){
       dd($id);
        try {
            $UpdateSup = Product::where('id', $id)->where('status', true)->first();
            $updateSup->product_name = $request->product_name;
            $updateSup->suppliersID = $request->suppliersID;
            $updateSup->categories = $request->categories;
            $updateSup->quantity = $request->quantity;
            $updateSup->unitsInStock = $request->unitsInStock;
            $updateSup->UnitOnOrders = $request->UnitOnOrders;
            $updateSup->save();

            return response ()-> json ([
                'status' => 1,
                'message' => 'Suppliers  Are Updated Successfully',
                'data' => $updateSup

            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    } 

    public function destory($id){
        try {
            $destoryProd = Product::where('id', $id)->where('status', 1)->first();
            $destoryProd->status = false;
            $destoryProd->save();
            return response()->json([
                'status' => 1,
                'message' => 'Deleted A products.',
                'data' => $destoryProd
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

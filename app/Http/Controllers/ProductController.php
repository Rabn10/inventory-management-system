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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        try {
            $index = Inventory::where('status', true)->orderBy('id','asc')->get();
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
            $store = new Inventory();
            $store->productID = $request->productID;
            $store->quantity = $request->quantity;
            $store->save();

            return response() -> json([
                'status' => '1',
                'message' => 'Inventories are Added Successfully.',
                'data' => $store
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $index = Category::where('status', true)->orderBy('id','asc')->get();
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
            $store = new Category();
            $store->categoriesID = $request->categoriesID;
            $store->categoriesName = $request->categoriesName;
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

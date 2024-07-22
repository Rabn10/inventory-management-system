<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


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
            $categoryVal = Validator::make($request->all(),[
            'categoriesID' => 'required',
            'categoriesName' => 'required'
            ]);
            if ($categoryVal->fails()){
                return response()->json([
                    'status' => '1',
                    'message' => 'Validation Error.',
                    'errors' => $categoryVal->errors()
                ]);
            }
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
    public function show($id){
        try {
            $showCategory = Category::where('id', $id)->where('status',true)->first();
            return response ()-> json([
                'status' => 1,
                'data' => $showCategory
            ]);
            
        } catch (\Throwable $th) {
            throw $th;
        } 
    }
    public function update(Request $request, $id){
        try {
            $updateVal = Validator::make($request->all(),[
                'categoriesID' => 'required',
                'categoriesName' => 'required'
                ]);
                if ($updateVal->fails()){
                    return response()->json([
                        'status' => '1',
                        'message' => 'Validation Error.',
                        'errors' => $updateVal->errors()
                    ]);
                }
            $UpdateCat = Category::where('id', $id)->where('status', true)->first();
            $UpdateCat->categoriesID = $request->categoriesID;
            $UpdateCat->categoriesName = $request->categoriesName;
            $UpdateCat->save();

            return response ()-> json ([
                'status' => 1,
                'message' => 'Categories  Are Updated Successfully',
                'data' => $UpdateCat

            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destory($id){
        try {
            $destoryCat = Category::where('id', $id)->where('status', 1)->first();
            $destoryCat->status = false;
            $destoryCat->save();
            return response()->json([
                'status' => 1,
                'message' => 'Delete A Categories',
                'data' => $destoryCat
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }  
    }

}

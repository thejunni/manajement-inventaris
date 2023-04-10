<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json(['data' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ]);

        $product = new Product([
            'name_product' => $request->input('name_product'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'amount' => $request->input('amount')
        ]);

        $product->save();
        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
         return response()->json(['data' => $product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_product' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ]);
        $product = Product::findOrFail($id);
        $product->update([
            'name_product' => $request->input('name_product'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'amount' => $request->input('amount'),
        ]);
        // $product->save();
        return response()->json(['message' => 'Product Update successfully', 'data' => $product], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}

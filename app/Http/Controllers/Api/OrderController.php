<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return  response()->json([
            'data' => $order,
        ]);
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
            'product_id'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);

        $order = new Order([
            'product_id'=>$request->input('product_id'),
            'amount'=>$request->input('amount'),
            'status'=>$request->input('status'),
        ]);

        $order->save();
        return response()->json([
            'message'=> "order saved successfully",'data' => $order], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $order
        ]);
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
            'product_id'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);

        $order = Order::find($id);

        if (!$order){
            return response([])->json([
                'success' => false,
                'message' => 'Order not found',
            ],404);
        }

        $order->update([
            'product_id'=>$request->product_id ?? $order->product_id,
            'amount' => $request->amount ?? $order->amount,
            'status' => $request->status ?? $order->status
        ]);

        $order->save();
        return response()->json([
            'success' => true,
            'data' => $order,
            'message'=> "yey berhasil"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order){
            return response()->json(['message' => "order not found"]);
        }
        $order->delete();
        return response()->json(['message' => "order deleted"]);
    }
    
}

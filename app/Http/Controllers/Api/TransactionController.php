<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::all();
        return response()->json(['data' => $transaction]);
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
            'product_id' => 'required',
            'transaction_id' => 'required',
            'transaction_type' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);

        $transaction = new Transaction([
            'product_id'=>$request->input('product_id'),
            'transaction_id'=>$request->input('transaction_id'),
            'transaction_type'=>$request->input('transaction_type'),
            'amount'=>$request->input('amount'),
            'description'=>$request->input('description')
        ]);

        $transaction->save();
        return response()->json([
            'message'=> "transaction saved successfully",'data' => $transaction], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $transaction
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
            'product_id' => 'required',
            'transaction_id' => 'required',
            'transaction_type' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);

         $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi not found'
            ], 404);
        }
        $transaction->update([
            'transaction_id'=>$transaction->transaction_id ?? $transaction->transaction_id,
            'transaction_type' => $request->transaction_type ?? $transaction->transaction_type,
            'product_id' => $request->product_id ?? $transaction->product_id,
            'amount' => $request->amount ?? $transaction->amount,
            'description' => $request->description ?? $transaction->description
        ]);

        $transaction->save();

        return response()->json([
            'success' => true,
            'data' => $transaction
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
        $transaction = Transaction::find($id);

        if (!$transaction){
            return response()->json(['message' => "transaction not found"]);
        }
        $transaction->delete();
        return response()->json(['message' => "transaction deleted"]);
    }
}

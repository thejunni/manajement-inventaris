<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noti = Notification::all();
        return response()->json([
            "data" => $noti,
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
            'product_id' => 'required',
            'notification_type' => 'required',
            'description' => 'required',
        ]);

        $noti = new Notification([
            'product_id' => $request->input('product_id'),
            'notification_type' => $request->input('notification_type'),
            'description' => $request->input('description'),
        ]);

        $noti->save();
        return response()->json([
            'message' =>"notifikasi berhasil dibuat"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noti = Notification::find($id);

        if(!$noti){
            return response()->json([
                'success' => false,
                'message' => "Notifikasi tidak ditemukan"
            ],404);
        }
        return response()->json([
            'success' => true,
            'data' => $noti
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
            'notification_type' => 'required',
            'description' => 'required',
        ]);

        $noti = Notification::find($id);

        $noti->update([
            'product_id' => $request->product_id ?? $noti->product_id,
            'notification_type' => $request->notification_type ?? $noti->notification_type,
            'description' => $request->description ?? $noti->description
        ]);

        $noti->save();
        return response()->json([
            'success' => true,
            'data' => $noti
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
        $noti = Notification::find($id);
        if(!$noti){
            return response()->json(['message' => "notification not found"]);
        }
        $noti->delete();
        return response()->json(['message' => "Berhasil di hapus"]);
    }
}

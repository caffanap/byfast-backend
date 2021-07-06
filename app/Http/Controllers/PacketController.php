<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Packet::with('category')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'packet_category_id' => 'required|numeric',
            'name' => 'required|min:8',
            'description' => 'required|min:8',
            'quota' => 'required|integer',
            'price' => 'required|integer|min:0',
            'point_reward' => 'required|integer|min:0',
            'active_period' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => [
                    'packet_category_id' => $validator->errors()->first('packet_category_id'),
                    'name' => $validator->errors()->first('name'),
                    'description' => $validator->errors()->first('description'),
                    'quota' => $validator->errors()->first('quota'),
                    'price' => $validator->errors()->first('price'),
                    'point_reward' => $validator->errors()->first('point_reward'),
                    'active_period' => $validator->errors()->first('active_period'),
                ],
            ], 400);
        }

        $packet = Packet::create([
            'packet_category_id' => $request->packet_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'quota' => $request->quota,
            'price' => $request->price,
            'point_reward' => $request->point_reward,
            'active_period' => $request->active_period,
        ]);

        if ($packet) {
            return response()->json([
                'message' => 'Paket berhasil dibuat.'
            ]);
        }
        return response()->json([
            'message' => 'Paket gagal dibuat.'
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Packet $packet)
    {
        $packet = Packet::with('category')->find($packet);
        return $packet;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Packet $packet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packet $packet)
    {
        $validator = Validator::make($request->all(), [
            'packet_category_id' => 'required|numeric',
            'name' => 'required|min:8',
            'description' => 'required|min:8',
            'quota' => 'required|integer',
            'price' => 'required|integer|min:0',
            'point_reward' => 'required|integer|min:0',
            'active_period' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => [
                    'packet_category_id' => $validator->errors()->first('packet_category_id'),
                    'name' => $validator->errors()->first('name'),
                    'description' => $validator->errors()->first('description'),
                    'quota' => $validator->errors()->first('quota'),
                    'price' => $validator->errors()->first('price'),
                    'point_reward' => $validator->errors()->first('point_reward'),
                    'active_period' => $validator->errors()->first('active_period'),
                ],
            ], 400);
        }

        $updated = $packet->update([
            'packet_category_id' => $request->packet_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'quota' => $request->quota,
            'price' => $request->price,
            'point_reward' => $request->point_reward,
            'active_period' => $request->active_period,
        ]);

        if ($updated) {
            return response()->json([
                'message' => 'Paket berhasil diubah.'
            ]);
        }
        return response()->json([
            'message' => 'Paket gagal diubah.'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packet $packet)
    {
        $deleted = $packet->delete();

        if ($deleted) {
            return response()->json([
                'message' => 'Paket berhasil dihapus.'
            ]);
        }
        return response()->json([
            'message' => 'Paket gagal dihapus.'
        ], 400);
    }
}

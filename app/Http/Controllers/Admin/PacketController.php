<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Packet\StoreRequest;
use App\Models\Packet;
use App\Models\PacketCategory;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packets = Packet::all();

        return view('admin.packets.index', compact('packets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packetCategories = PacketCategory::all();

        return view('admin.packets.create', compact('packetCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Packet::create($request->validated());

        return redirect()->route('admin.packets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Packet $packet)
    {
        return view('admin.packets.show', $packet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Packet $packet)
    {
        $packetCategories = PacketCategory::all();

        return view('admin.packets.edit', compact('packet', 'packetCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Packet $packet)
    {
        $packet->update($request->validated());

        return redirect()->route('admin.packets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packet $packet)
    {
        $packet->delete();

        return redirect()->route('admin.packets.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacketCategory\StoreRequest;
use App\Models\PacketCategory;
use Illuminate\Http\Request;

class PacketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packetCategories = PacketCategory::paginate(10);

        return view('admin.packet-categories.index', compact('packetCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packet-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        PacketCategory::create($request->validated());

        return redirect()->route('admin.packet-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PacketCategory $packetCategory)
    {
        return view('admin.packet-categories.show',$packetCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PacketCategory $packetCategory)
    {
        return view('admin.packet-categories.edit', compact('packetCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, PacketCategory $packetCategory)
    {
        $packetCategory->update($request->validated());

        return redirect()->route('admin.packet-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacketCategory $packetCategory)
    {
        $packetCategory->delete();

        return redirect()->route('admin.packet-categories.index');
    }
}

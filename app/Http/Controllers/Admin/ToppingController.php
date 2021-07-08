<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Topping\StoreRequest;
use App\Models\Topping;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toppings = Topping::paginate(10);

        return view('admin.toppings.index', compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.toppings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Topping::create($request->validated());

        return redirect()->route('admin.toppings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topping $topping)
    {
        return view('admin.toppings.show', $topping);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topping $topping)
    {
        return view('admin.toppings.edit', compact('topping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Topping $topping)
    {
        $topping->update($request->validated());

        return redirect()->route('admin.toppings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topping $topping)
    {
        $topping->delete();

        return redirect()->route('admin.toppings.index');
    }
}

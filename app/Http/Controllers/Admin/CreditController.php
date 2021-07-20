<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Credit\StoreRequest;
use App\Models\Credit;
use App\Models\User;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits = Credit::orderBy('updated_at', 'DESC')->paginate(4);
        // dd($credits);
        return view('admin.credits.index', compact('credits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.credits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $idUser = User::where('phone_number', $request->validated()['phone_number'])->first()->id;

        $oldCredit = Credit::where('user_id', $idUser)->first();

        if (!$oldCredit) {
            $oldCreditBalance = 0;
            $oldCreditPoint = 0;
        }else{
            $oldCreditBalance = $oldCredit->balance;
            $oldCreditPoint = $oldCredit->point;
        }

        Credit::updateOrCreate([
            'user_id'    => $idUser
        ], [
            'balance'   => $request->validated()['balance'] + $oldCreditBalance,
            'point'     => $request->validated()['point'] + $oldCreditPoint,
        ]);

        return redirect()->route('admin.credits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

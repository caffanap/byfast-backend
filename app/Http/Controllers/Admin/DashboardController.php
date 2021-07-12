<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packet;
use App\Models\Topping;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $packettotal = Packet::get()->count();
        $toppingtotal = Topping::get()->count();
        $usertotal = User::get()->count();
        return view('admin.dashboard', compact('packettotal', 'toppingtotal', 'usertotal'));
    }
}

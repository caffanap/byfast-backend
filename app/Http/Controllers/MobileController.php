<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Credit;
use App\Models\PacketCategory;
use App\Models\PurchasedPacket;
use App\Models\PurchasedTopping;
use App\Models\User;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    // Home
    public function packet()
    {
        return PacketCategory::with('packets')->get();
    }

    public function credit(User $user)
    {
        return Credit::where('user_id', $user->id)->first();
    }

    public function userPacketSummary($user)
    {
        $packet = PurchasedPacket::where('user_id', $user)->latest()->first();
        $instagram = PurchasedTopping::where('user_id', $user)->where('type', 'Instagram')->latest()->first();
        $twitter = PurchasedTopping::where('user_id', $user)->where('type', 'Twitter')->latest()->first();
        $youtube = PurchasedTopping::where('user_id', $user)->where('type', 'Youtube')->latest()->first();

        $packet = (!$packet) ? 0 : $packet->current_quota;
        $instagram = (!$instagram) ? 0 : $instagram->current_quota;
        $twitter = (!$twitter) ? 0 : $twitter->current_quota;
        $youtube = (!$youtube) ? 0 : $youtube->current_quota;
        return response()->json([
            'internet' => $packet,
            'call' => 0,
            'sms' => 0,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'youtube' => $youtube,
        ]);
    }

    public function banner()
    {
        return Banner::all();
    }
}

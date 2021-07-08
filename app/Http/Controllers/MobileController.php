<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Credit;
use App\Models\PacketCategory;
use App\Models\PurchasedPacket;
use App\Models\PurchasedTopping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $packet = PurchasedPacket::where('user_id', $user)->where('active_period', '>=', Carbon::now())->latest()->first();
        $instagram = PurchasedTopping::where('user_id', $user)->where('type', 'Instagram')->where('active_period', '>=', Carbon::now())->latest()->first();
        $twitter = PurchasedTopping::where('user_id', $user)->where('type', 'Twitter')->where('active_period', '>=', Carbon::now())->latest()->first();
        $youtube = PurchasedTopping::where('user_id', $user)->where('type', 'Youtube')->where('active_period', '>=', Carbon::now())->latest()->first();

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

    // Paket Saya
    public function userPacketDetail($user)
    {
        $packet = PurchasedPacket::where('user_id', $user)->where('active_period', '>=', Carbon::now())->latest()->first();
        $instagram = PurchasedTopping::where('user_id', $user)->where('type', 'Instagram')->where('active_period', '>=', Carbon::now())->latest()->first();
        $twitter = PurchasedTopping::where('user_id', $user)->where('type', 'Twitter')->where('active_period', '>=', Carbon::now())->latest()->first();
        $youtube = PurchasedTopping::where('user_id', $user)->where('type', 'Youtube')->where('active_period', '>=', Carbon::now())->latest()->first();

        $userPackets = collect();
        if ($packet) {
            $userPackets->push($packet);
        }
        if ($instagram) {
            $instagram = $instagram->with('transaction.topping')->get()->first();
            $instagram->active_period = Carbon::parse($instagram->active_period)->translatedFormat('d M Y, H:i') . ' WIB';
            $userPackets->push($instagram);
        }
        if ($twitter) {
            $twitter = $twitter->with('transaction.topping')->get()->first();
            $twitter->active_period = Carbon::parse($twitter->active_period)->translatedFormat('d M Y, H:i') . ' WIB';
            $userPackets->push($twitter);
        }
        if ($youtube) {
            $youtube = $youtube->with('transaction.topping')->get()->first();
            $youtube->active_period = Carbon::parse($youtube->active_period)->translatedFormat('d M Y, H:i') . ' WIB';
            $userPackets->push($youtube);
        }

        return response()->json($userPackets);
    }
}

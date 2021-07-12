<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Credit;
use App\Models\Packet;
use App\Models\PacketCategory;
use App\Models\PurchasedPacket;
use App\Models\PurchasedTopping;
use App\Models\Topping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class MobileController extends Controller
{
    // Home
    public function packets()
    {
        return PacketCategory::with('packets')->get();
    }

    public function recommendedPackets()
    {
        return Packet::inRandomOrder()->limit(3)->get();
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
            'internet' => $this->quotaConverter($packet),
            'call' => 0,
            'sms' => 0,
            'instagram' => $this->quotaConverter($instagram),
            'twitter' => $this->quotaConverter($twitter),
            'youtube' => $this->quotaConverter($youtube),
        ]);
    }

    private function quotaConverter($quota)
    {
        if ($quota < 1000) {
            return "$quota MB";
        }

        $quotaInGB = round($quota / 1000, 2);
        return "$quotaInGB GB";
    }

    public function banner()
    {
        return Banner::all()->first();
    }

    // Paket Saya
    public function userPacketDetail($user)
    {
        $packet = PurchasedPacket::where('user_id', $user)->where('active_period', '>=', Carbon::now())->latest()->first();
        $instagram = PurchasedTopping::where('user_id', $user)->where('type', 'Instagram')->where('active_period', '>=', Carbon::now())->latest()->first();
        $twitter = PurchasedTopping::where('user_id', $user)->where('type', 'Twitter')->where('active_period', '>=', Carbon::now())->latest()->first();
        $youtube = PurchasedTopping::where('user_id', $user)->where('type', 'Youtube')->where('active_period', '>=', Carbon::now())->latest()->first();

        if ($packet) {
            $packet = $packet->with('transaction.packet')->get()->first();
            $packet->active_period = Carbon::parse($packet->active_period)->translatedFormat('d M Y, H:i') . ' WIB';
        }
        $toppings = collect();
        if ($instagram) {
            $instagram = $instagram->with('transaction.topping')->get()->first();
            $instagram->active_period = Carbon::parse($instagram->active_period)->translatedFormat('d M Y, H:i') . ' WIB';
            $toppings->push($instagram);
        }
        if ($twitter) {
            $twitter = $twitter->with('transaction.topping')->get()->first();
            $twitter->active_period = Carbon::parse($twitter->active_period)->translatedFormat('d M Y, H:i') . ' WIB';
            $toppings->push($twitter);
        }
        if ($youtube) {
            $youtube = $youtube->with('transaction.topping')->get()->first();
            $youtube->active_period = Carbon::parse($youtube->active_period)->translatedFormat('d M Y, H:i') . ' WIB';
            $toppings->push($youtube);
        }

        return response()->json([
            'packet' => $packet,
            'toppings' => $toppings,
        ]);
    }

    // Detail Paket
    public function packet(Packet $packet)
    {
        return $packet;
    }

    public function toppings()
    {
        return Topping::all();
    }

    public function points(User $user)
    {
        $credit =  $user->credit()->first();
        return response()->json([
            'points' => $credit->point,
        ]);
    }

    public function buyPacket(User $user, Request $request)
    {
        $packet = Packet::find($request->packet_id);
        $topping = $request->topping_id;
        if ($topping) {
            $topping = Topping::find($topping);
            $toppingId = $topping->id;
            $total = $packet->price + $topping->price;
        } else {
            $toppingId = null;
            $total = $packet->price;
        }

        $credit = $user->credit()->first();
        $balance = $credit->balance;
        $point = $credit->point;

        if ($request->point) {
            if ($point <= $total) {
                $toPay = $total - $point;
                $newPoint = 0;
                $newBalance = $balance;
                if ($toPay > 0 && $balance >= $toPay) {
                    $newBalance = $balance - $toPay;
                    $toPay = 0;
                }
            } else {
                $toPay = 0;
                $newPoint = $point - $total;
                $newBalance = $balance;
            }
        } else {
            if ($balance >= $total) {
                $toPay = 0;
                $newBalance = $balance -  $total;
                $newPoint = $point;
            } else {
                $toPay = $total;
            }
        }

        if ($toPay > 0) {
            return response()->json([
                'message' => 'Pembayaran gagal',
            ], 400);
        }

        $credit->update([
            'balance' => $newBalance,
            'point' => $newPoint + $packet->point_reward,
        ]);

        $transaction = $user->transactions()->create([
            'packet_id' => $packet->id,
            'topping_id' => $toppingId,
            'total' => $total,
        ]);

        $transaction->purchasedPacket()->create([
            'user_id'       => $user->id,
            'initial_quota' => $packet->quota,
            'current_quota' => $packet->quota,
            'active_period' => Carbon::now()->addDays($packet->active_period),
        ]);

        if ($toppingId) {
            $transaction->purchasedTopping()->create([
                'user_id'       => $user->id,
                'type'          => $topping->type,
                'initial_quota' => $topping->quota,
                'current_quota' => $topping->quota,
                'active_period' => Carbon::now()->addDays($packet->active_period),
            ]);
        }

        return response()->json([
            'message' => 'Pembayaran berhasil'
        ]);
    }

    // Profile
    public function updateProfile(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|min:8',
            'email'  => 'required|email:rfc,dns|unique:users',
            'gender' => 'required|boolean',
            'dob'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => [
                    'name' => $validator->errors()->first('name'),
                    'email' => $validator->errors()->first('email'),
                    'gender' => $validator->errors()->first('gender'),
                    'dob' => $validator->errors()->first('dob'),
                ],
            ], 400);
        }

        $updated = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => Carbon::parse($request->dob),
        ]);

        if ($updated) {
            return response()->json([
                'message' => 'Profil berhasil diubah.'
            ]);
        }
        return response()->json([
            'message' => 'Profil gagal diubah.'
        ], 400);
    }

    public function simulation(User $user, Request $request)
    {
        $tester = [50, 100, 200, 500];
        $rand = array_rand($tester);

        if ($request->packet_id) {
            $packet = PurchasedPacket::find($request->packet_id);
            $packet->update([
                'current_quota' => $packet->current_quota - $tester[$rand],
            ]);
        }

        if ($request->topping_id) {
            $topping = PurchasedTopping::find($request->topping_id);
            $topping->update([
                'current_quota' => $topping->current_quota - $tester[$rand],
            ]);
        }

        return response()->json([
            'message' => 'Simulasi pengurangan kuota sebesar ' . $tester[$rand] . ' MB berhasil.',
        ]);
    }

    public function purchasingHistory(User $user)
    {
        $history = collect();

        $purchasedPackets = $user->purchasedPackets()->get();
        $purchasedToppings = $user->purchasedToppings()->get();

        $history = $history->merge($purchasedPackets);
        $history = $history->merge($purchasedToppings);
        return $history;
    }
}

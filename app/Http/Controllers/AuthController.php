<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $messages = [
            'email.unique' => 'Email telah terdaftar pada akun lain.',
            'phone_number' => 'Nomor telah terdaftar pada akun lain.',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s\-]+$/u', // alpha & space
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
            'phone_number' => 'required|numeric|unique:users',
        ], $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }

        $createUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);

        $createUser->credit()->create([
            'balance' => 0,
            'point' => 0,
        ]);

        $credentials = ['phone_number' => $request->phone_number, 'password' => $request->password];

        if ($createUser) {
            return response()->json([
                'token' => auth()->attempt($credentials),
                'message' => 'Pendaftaran berhasil!',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Pendaftaran gagal!',
            ], 500);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = ['phone_number' => $request->phone_number, 'password' => $request->password];

        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => [
                    'phone_number' => $validator->errors()->first('phone_number'),
                    'password' => $validator->errors()->first('password'),
                ],
            ], 400);
        }

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Nomor/Password salah'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        $active_period = User::find($user['id'])->purchasedPackets()->first();
        if ($active_period == null) {
            $user->active_period = Carbon::now()->addDays(7)->translatedFormat('d F Y, H:i') . ' WIB';
        } else {
            $user->active_period = $active_period->created_at->translatedFormat('d F Y, H:i') . ' WIB';
        }
        $user->avatar = null;
        return response()->json($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logout berhasil!']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Marketers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginAccount(Request $request)
    {
        $checkEmail = Marketers::where('email', $request->email)->first();
        if ($checkEmail !== null) {
            if (Hash::check($request->password, $checkEmail->password)) {
                return $checkEmail;
            } else {
                return response()->json(['error' => 'كلمة المرور خاطئة'], 404);
            }
        } else {
            return response()->json(['error' => 'المستخدم غير موجود'], 404);
        }
    }
    public function createAccount(Request $request)
    {
        $check = Marketers::where('email', $request->email)->first();
        if ($check == null) {
            Marketers::create([
                'coupon' => Str::random(7),
                'full_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'password' => Hash::make($request->password),
                'token' => md5(time()),
                'ban' => 0,
                'active' => 0
            ]);
        } else {
            return response()->json(['error' => 'البريد الالكتروني مستخدم من قبل'], 404);
        }
    }
}

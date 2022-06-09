<?php

namespace App\Http\Controllers;

use App\Models\Marketers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginAccount(Request $request)
    {
        $checkEmail = Marketers::where('email', $request->email)->first();
        if ($checkEmail !== null) {
            if (Hash::check($request->password, $checkEmail->password)) {
                $request->session()->put('email', $request->email);
                return redirect('/dashboard');
            } else {
                return redirect()->back()->with('error', 'كلمة المرور خاطئة');
            }
        } else {
            return redirect()->back()->with('error', 'المستخدم غير موجود');
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
            return redirect()->back()->with('success', 'تم ارسال طلب للأنضمام لمسوقي تطبيق مطر');
        } else {
            return redirect()->back()->with('error', 'البريد الالكتروني مسجل من قبل');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ChangePassword;
use App\Models\Marketers;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function send_reset_password(Request $request)
    {
        $checkUser = Marketers::where('email', $request->email)->first();
        if ($checkUser !== null) {
            $check = ChangePassword::where('marketer', $request->email)->first();
            if ($check == null) {
                ChangePassword::create([
                    'marketer' => $request->email,
                    'token' => md5(time()),
                    'code' => Str::random(5),
                    'expire_time' => Carbon::parse(date('Y-m-d H:i'))->addMinutes(15)->format('Y-m-d H:i'),
                ]);

                $getToken = ChangePassword::where('marketer', $request->email)->first();
                if ($getToken !== null) {
                    $u_email = $request->email;
                    return Mail::send('mail', ['email' => $request->email, 'token' => $getToken->token, 'name' => $checkUser->name], function ($message) use ($u_email) {
                        $message->to($u_email)->subject('اعادة تعيين كلمة المرور');
                    });
                }
            } else {
                ChangePassword::where('marketer', $request->email)->update([
                    'marketer' => $request->email,
                    'token' => md5(time()),
                    'code' => Str::random(5),
                    'expire_time' => Carbon::parse(date('Y-m-d H:i'))->addMinutes(15)->format('Y-m-d H:i'),
                ]);
                $getToken = ChangePassword::where('marketer', $request->email)->first();
                if ($getToken !== null) {
                    $u_email = $request->email;
                    return Mail::send('mail', ['email' => $request->email, 'token' => $getToken->token, 'name' => $checkUser->name], function ($message) use ($u_email) {
                        $message->to($u_email)->subject('اعادة تعيين كلمة المرور');
                    });
                }
            }
        } else {
            return response()->json(['alert' => 'المستخدم غير موجود'], 404);
        }
    }
    public function check_reset_password_code(Request $request)
    {
        if ($request->token) {
            $check = ChangePassword::where('token', $request->token)->first();
            if ($check !== null) {
                return response()->json([], 200);
            } else {
                return response()->json(['alert' => 'الكود غير صحيح'], 404);
            }
        } else {
            return response()->json(['alert' => 'الكود غير صحيح'], 404);
        }
    }
    public function reset_password(Request $request)
    {
        if ($request->token) {
            $check = ChangePassword::where('token', $request->token)->first();
            if ($check !== null) {
                Marketers::where('email', $check->marketer)->update([
                    'password' => Hash::make($request->password)
                ]);
                return ChangePassword::where('token', $request->token)->delete();
            } else {
                return response()->json(['alert' => 'الكود غير صحيح'], 404);
            }
        } else if ($request->token) {
            $check = ChangePassword::where('token', $request->token)->first();
            if ($check !== null) {
                Marketers::where('email', $check->marketer)->update([
                    'password' => Hash::make($request->newPassword)
                ]);
                return ChangePassword::where('token', $request->token)->delete();
            } else {
                return response()->json(['alert' => 'الكود غير صحيح'], 404);
            }
        } else {
            return response()->json(['alert' => 'الكود غير صحيح'], 404);
        }
    }
}

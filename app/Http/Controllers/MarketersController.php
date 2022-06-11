<?php

namespace App\Http\Controllers;

use App\Models\Marketers;
use App\Models\Payouts;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class MarketersController extends Controller
{
    public function getByID(Request $request)
    {
        return Marketers::where('id', $request->id)->with('details')->first();
    }
    public function withdrawal(Request $request)
    {
        return Withdraw::where('marketer_id', $request->id)->get();
    }
    public function payout(Request $request)
    {
        return Payouts::where('marketer_id', $request->id)->first();
    }
    public function updatePayout(Request $request)
    {
        $checkPayout = Payouts::where('marketer_id', $request->id)->first();
        if ($checkPayout !== null) {
            return Payouts::where('marketer_id', $request->id)->update([
                'method' => $request->method,
                'paypal_account' => $request->paypalEmail,
                'bank_name' => $request->bankName,
                'bank_account' => $request->bankAccountName,
                'bank_account_number' => $request->bankAccountNumber,
                'id_number' => $request->idNumber,
            ]);
        } else {
            return Payouts::create([
                'marketer_id' => $request->id,
                'method' => $request->method,
                'paypal_account' => $request->paypalEmail,
                'bank_name' => $request->bankName,
                'bank_account' => $request->bankAccountName,
                'bank_account_number' => $request->bankAccountNumber,
                'id_number' => $request->idNumber,
            ]);
        }
    }
}

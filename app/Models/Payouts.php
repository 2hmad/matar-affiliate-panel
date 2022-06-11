<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payouts extends Model
{
    use HasFactory;
    public $table = "payout_settings";
    protected $fillable = [
        'marketer_id',
        'method',
        'paypal_account',
        'bank_name',
        'bank_account',
        'bank_account_number',
        'id_number'
    ];
    protected $hidden = [];
    public $timestamps = false;
}

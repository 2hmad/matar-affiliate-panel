<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    public $table = "withdrawals";
    protected $fillable = [
        'marketer_id',
        'method',
        'amount',
        'date'
    ];
    protected $hidden = [];
    public $timestamps = false;
}

<?php

namespace App\Http\Controllers;

use App\Models\Marketers;
use Illuminate\Http\Request;

class MarketersController extends Controller
{
    public function getByID(Request $request)
    {
        return Marketers::where('id', $request->id)->with('details')->first();
    }
}

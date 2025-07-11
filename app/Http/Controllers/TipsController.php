<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipsController extends Controller
{
    public function skincare()
    {
        return view('frontend.tipsSkincare.index');
    }
}

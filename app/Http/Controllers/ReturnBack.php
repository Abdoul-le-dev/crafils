<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnBack extends Controller
{
    //
    public function return()
    {
        return redirect()->route('Dashboard');
    }
}

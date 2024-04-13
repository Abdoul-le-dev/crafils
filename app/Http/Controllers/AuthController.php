<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auths;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewConnexion()
    {   /*User::create([
        'name'  => 'Abdoul',
        'email' => 'abdoul51@gmail.com',
        'password' => Hash::make('Abdoul51')
    ]);*/
        return view('Access.Login');
    }
    public function doConnexion(Auths $request)
    {

        $credentials = $request->validated();

        if(Auth::attempt($credentials))
        {
            session()->regenerate();
            return redirect()->intended(route('Dashboard'));
        }

        return  view('Access.Login');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function disableFirstLogin(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->first_login) {
            $user->update(['first_login' => false]);
        }

        return redirect()->route('dashboard');
    }
}

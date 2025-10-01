<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class UserController extends Controller
{
    /**
     * Disable first login and save selected categories.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disableFirstLogin(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->first_login) {
            // First, disable first_login
            $user->update(['first_login' => false]);

            // Save selected categories (many-to-many relationship)
            if ($request->has('categories')) {
                // Sync selected categories with the pivot table
                $user->categories()->sync($request->input('categories'));
            }
        }

        return redirect()->route('dashboard');
    }
}

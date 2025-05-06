<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        if (!session('is_logged_in')) {
            return redirect()->route('login');
        }

        return view('profile', [
            'user' => session('user')
        ]);
    }
}

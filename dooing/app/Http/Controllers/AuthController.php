<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $validUsername = 'Nunniah';
    private $validPassword = 'admin';
    private $validEmail = 'admin@mail.com';
    private $validName = 'Nunniah Zahwa A';

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (
            $request->username === $this->validUsername &&
            $request->password === $this->validPassword
        ) {
            session([
            'is_logged_in' => true,
            'user' => [
                'username' => $this->validUsername,
                'name' => $this->validName,
                'email' => $this->validEmail,
                'password' => $this->validPassword
            ],

            'tasks' => [
                [
                    'id' => 1,
                    'name' => 'Beli bahan makanan',
                    'completed' => false,
                    'category' => 'personal'
                ],
                [
                    'id' => 2,
                    'name' => 'Meeting dengan tim pukul 14.00',
                    'completed' => false,
                    'category' => 'team'
                ],
                [
                    'id' => 3,
                    'name' => 'Kerjakan laporan mingguan',
                    'completed' => true,
                    'category' => 'team'
                ],
                [
                    'id' => 4,
                    'name' => 'Olahraga pagi',
                    'completed' => true,
                    'category' => 'personal'
                ],
            ]
        ]);
            return redirect()->route('dashboard', ['username' => $request->username]);
        }

        return back()->withErrors([
            'login' => 'Username atau password salah.'
        ])->withInput();

    }

    public function dashboard()
    {
        if (!session('is_logged_in')) {
            return redirect()->route('login');
        }

        $user = session('user');
        $tasks = session('tasks');

        return view('dashboard', compact('user', 'tasks'));
    }


    public function logout()
    {
        session()->flush(); 
        return redirect()->route('login');
    }
}


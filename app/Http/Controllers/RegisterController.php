<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('sign-up');
    }

    public function register(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi.',
            'min' => ':attribute minimal memiliki :min karakter.',
            'confirmed' => 'Konfirmasi password tidak Sesuai',
            'email' => 'Email harus berupa format email yang valid.'
        ];

        $register = $request->validate([
            'username' => 'required|min:7',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ], $message);

        $existingUser = User::where('username', $register['username'])->first();
        if ($existingUser) {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->addError('Username sudah digunakan.');
            return redirect('/sign-up');
        }

        $existingEmail = User::where('email', $register['email'])->first();
        if ($existingEmail) {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->addError('Email sudah digunakan.');
            return redirect('/sign-up');
        }

        $user = new User();
        $user->username = $register['username'];
        $user->email = $register['email'];
        $user->password = bcrypt($register['password']);
        $user->role_id = 2;
        $user->save();

        notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->addSuccess('Akun anda BERHASIL dibuat');
        return redirect('/sign-in');
    }
}

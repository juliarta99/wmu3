<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $data = User::where('username', $credentials['username'])->first();
            if ($data->role) {
                $request->session()->regenerate();
                return redirect()->intended('admin');
                // return response()->json([
                //     "status" => "Berhasil"
                // ],200);
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function makeAdmin(Request $request) {
        try {
            $validated = $request->validate([
                'username' => 'required|unique:users,username',
                'password' => 'required',
            ]);
    
            $admin = [
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ];
    
    
            return response()->json([
                "dataAdmin" => $admin
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                "status" => "gagal",
                "msg" => $e->getMessage()
            ], 400);
        }
    }

}

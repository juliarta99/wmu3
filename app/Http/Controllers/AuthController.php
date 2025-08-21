<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        return view('login');
    }

    public function login(Request $request) {
        try {
            $validated = $request->validate([
                'username' => 'required',
                'password' => 'required',
                'remember' => 'nullable|boolean',
            ], [
                'username.required' => 'Username wajib diisi.',
                'password.required' => 'Password wajib diisi.',
            ]);

            $credentials = [
                'username' => $validated['username'],
                'password' => $validated['password']
            ];

            $remember = $validated['remember'] ?? false;

            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();
                
                $user = Auth::user();
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Login berhasil!',
                        'user' => $user
                    ], 200);
                }

                return redirect()->intended(route('dashboard.index'))
                            ->with('success', 'Login berhasil!');
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Username atau password salah.',
                    'errors' => [
                        'username' => ['Username atau password salah.']
                    ]
                ], 422);
            }

            return redirect()->back()
                            ->withErrors(['username' => 'Username atau password salah.'])
                            ->withInput($request->except('password'));

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang dimasukkan tidak valid.',
                    'errors' => $e->errors()
                ], 422);
            }
        
            return redirect()->back()
                            ->withErrors($e->errors())
                            ->withInput($request->except('password'));
                        
        } catch (\Throwable $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan sistem.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }
        
            return redirect()->back()
                            ->with('error', 'Terjadi kesalahan sistem.')
                            ->withInput($request->except('password'));
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}

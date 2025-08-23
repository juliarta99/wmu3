<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "Profile - ";
        return view('dashboard.profile.index', compact('title'));
    }

    public function updatePassword(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $validated = $request->validate([
                'current_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($user) {
                        if (!Hash::check($value, $user->password)) {
                            $fail('Password lama tidak sesuai.');
                        }
                    }
                ],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
                ],
            ], [
                'current_password.required' => 'Password lama wajib diisi.',
                'password.required' => 'Password baru wajib diisi.',
                'password.min' => 'Password baru minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai.',
                'password.regex' => 'Password baru harus mengandung minimal 1 huruf, 1 angka, dan 1 simbol.'
            ]);

            $result = DB::transaction(function () use ($validated, $user) {
                $user->update([
                    'password' => Hash::make($validated['password']),
                ]);

                return $user->fresh();
            });

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password berhasil diperbarui!',
                    'user' => $result
                ], 200);
            }

            return redirect()->route('dashboard.user.index')
                            ->with('success', 'Password berhasil diperbarui!');

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
                            ->withInput();

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
                            ->withInput();
        }
    }
}

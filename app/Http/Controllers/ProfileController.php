<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     * Bisa diakses tanpa login (akan tampil data dummy).
     */
    public function edit(Request $request): View
    {
        // Jika belum login, gunakan data dummy biar UI bisa dilihat
        $user = $request->user() ?? (object)[
            'name' => 'Shakila Rama Wulandari',
            'email' => 'shakila@example.com',
        ];

        return view('profile.edit', compact('user'));
    }

    /**
     * Menyimpan perubahan profil pengguna (hanya berfungsi jika login).
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Cegah error kalau belum login
        if (!$request->user()) {
            return Redirect::route('profile.edit')->with('status', 'Harap login untuk memperbarui profil.');
        }

        $request->user()->fill($request->validated());

        // Reset verifikasi email jika email berubah
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }

    /**
     * Menghapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cegah error kalau belum login
        if (!$request->user()) {
            return Redirect::route('profile.edit')->with('status', 'Harap login untuk menghapus akun.');
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

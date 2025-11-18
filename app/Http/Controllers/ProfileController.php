<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman edit profil berdasarkan role user
     */
    public function edit(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        // Jika belum login, redirect ke login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu');
        }

        // Tentukan view berdasarkan role
        if ($user->role->name === 'rt') {
            return view('dashboardRT.profile.edit-profile', compact('user'));
        }

        return view('dashboardWarga.profile.edit-profile-warga', compact('user'));
    }

    /**
     * Update profil user (untuk RT dan Warga)
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu');
        }

        $data = $request->validated();

        // Upload foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            $path = $request->file('photo')->store('profile_photos', 'public');
            $data['photo'] = $path;
        }

        // Update data user
        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Redirect berdasarkan role
        $route = $user->role->name === 'rt' ? 'dashboardRT.profile' : 'dashboardWarga.profile';

        return Redirect::route($route)->with('status', 'Profil berhasil diperbarui.');
    }

    /**
     * Hapus akun user
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu');
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Hapus foto profil jika ada
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Akun berhasil dihapus.');
    }
}

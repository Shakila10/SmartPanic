<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan menjalankan request ini.
     */
    public function authorize(): bool
    {
        return true; // biar controller yang batasi login
    }

    /**
     * Aturan validasi profil user.
     */
    public function rules(): array
    {
        $userId = $this->user()?->id;

        return [
            'name'   => ['required', 'string', 'max:255'],
            'email'  => [
                'required',
                'string',
                'email',
                'max:255',
                // pastikan email unik, kecuali milik user sendiri
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'alamat' => ['nullable', 'string', 'max:255'],
            'no_hp'  => ['nullable', 'string', 'max:30'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    /**
     * Pesan error kustom agar user-friendly.
     */
    public function messages(): array
    {
        return [
            'name.required'  => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.unique'   => 'Email sudah digunakan oleh akun lain.',
            'alamat.max'     => 'Alamat terlalu panjang (maksimal 255 karakter).',
            'no_hp.max'      => 'Nomor HP terlalu panjang (maksimal 30 karakter).',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format foto harus: jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
            // 'role_id.exists' => 'Role tidak valid.',
        ];
    }
}

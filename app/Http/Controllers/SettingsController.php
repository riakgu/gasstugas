<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Menampilkan halaman pengaturan.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $data = [
            "title" => "Settings",
        ];

        // Mengembalikan view pengaturan dengan judul halaman
        return view('settings.index', $data);
    }

    /**
     * Memperbarui profil pengguna.
     *
     * @param Request $request Data request dari formulir.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile(Request $request) {
        // Validasi input formulir
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email',
        ]);

        // Cek jika email sama dengan email saat ini
        $current_email = auth()->user()->email;
        if($validated['email'] === $current_email) {
            // Jika email sama, hanya perbarui nama
            User::query()->where('id', auth()->user()->id)
                ->update(['name' => $validated['name']]);
        } else {
            // Jika email berbeda, validasi keunikan dan perbarui data
            $request->validate([
                'email' => 'unique:users',
            ]);
            User::query()->where('id', auth()->user()->id)
                ->update($validated);
        }

        // Redirect kembali ke pengaturan dengan pesan sukses
        return redirect('/settings')->with('success', 'Profile has been updated!' );
    }

    /**
     * Memperbarui password pengguna.
     *
     * @param Request $request Data request dari formulir.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request) {
        // Validasi input formulir
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Cek password saat ini
        $current_password = auth()->user()->password;
        if (Hash::check($request->current_password, $current_password)) {
            // Cek jika password baru sama dengan yang lama
            if (Hash::check($request->password, $current_password)) {
                return redirect('/settings')->with('error', 'The new password cannot be the same as the old password!' );
            }
            else{
                // Perbarui password dan simpan
                $users = User::query()->find(auth()->user()->id);
                $users->password = Hash::make($validated['password']);
                $users->save();
                return redirect('/settings')->with('success', 'Password has been updated!' );
            }
        }
        else{
            // Jika password lama tidak cocok
            return redirect('/settings')->with('error', 'The old password does not match.' );
        }
    }
}
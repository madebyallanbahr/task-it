<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $user = Auth::user();

        return view('settings.index', compact('user'));
    }

    /**
     * Update user profile information.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('settings.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('settings.index')->with('success', 'Senha atualizada com sucesso!');
    }

    /**
     * Update user preferences.
     */
    public function updatePreferences(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'framework_preference' => ['nullable', 'string', 'max:255'],
            'theme_preference' => ['nullable', 'string', 'in:light,dark'],
            'language_preference' => ['nullable', 'string', 'max:10'],
        ]);

        // Store preferences in user meta or separate table
        // For now, we'll store in a simple way
        $user->update([
            'framework_preference' => $request->framework_preference,
            'theme_preference' => $request->theme_preference,
            'language_preference' => $request->language_preference,
        ]);

        return redirect()->route('settings.index')->with('success', 'Preferências atualizadas com sucesso!');
    }

    /**
     * Delete user account.
     */
    public function deleteAccount(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
            'confirmation' => ['required', 'in:DELETE'],
        ]);

        $user = Auth::user();

        // Logout the user
        Auth::logout();

        // Delete the user account
        $user->delete();

        return redirect()->route('auth.login')->with('success', 'Sua conta foi excluída com sucesso.');
    }
}

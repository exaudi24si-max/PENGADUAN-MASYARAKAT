<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Auto-create user default saat membuka halaman login
        $this->createDefaultUser();
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Auto-create user default jika belum ada
        $this->createDefaultUser();

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // PAKAI MODEL (Lebih Recommended)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah berhasil logout. Silakan login kembali jika ingin masuk.');
    }

    /**
     * Method untuk membuat user default otomatis
     */
    private function createDefaultUser()
    {
        // Cek apakah user default sudah ada
        $existingUser = User::where('email', 'exaudibanjar@gmail.com')->first();

        if (! $existingUser) {
            // Buat user default pakai Model
            User::create([
                'name'     => 'Exaudi Banjar',
                'email'    => 'exaudibanjar@gmail.com',
                'password' => Hash::make('password123'),
            ]);
        }
    }

    /**
     * Method tambahan untuk manual create user (optional)
     */
    public function createUserManual()
    {
        $this->createDefaultUser();
        return redirect('/login')->with('success', 'User default berhasil dibuat! Email: exaudibanjar@gmail.com, Password: password123');
    }
}

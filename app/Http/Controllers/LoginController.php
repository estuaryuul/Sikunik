<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Random;

class LoginController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function login()
    {
        return view('users.login');
    }
    // public function postlogin(Request $request)
    // {
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         if (auth()->user()->role == 'admin') {
    //             return redirect('/rekap');
    //         } else {
    //             return redirect('/riwayat');
    //         }
    //     }
    //     return redirect('login');
    // }
    public function postlogin(Request $request)
    {
        $login = $request->input('email'); // bisa email atau name
        $password = $request->input('password');

        // Coba login dengan email
        if (Auth::attempt(['email' => $login, 'password' => $password])) {
            return $this->redirectByRole();
        }

        // Coba login dengan name
        if (Auth::attempt(['name' => $login, 'password' => $password])) {
            return $this->redirectByRole();
        }

        // Jika gagal login
        return redirect('login')->with('error', 'Email/Username atau Password salah.');
    }

    // Fungsi untuk redirect berdasarkan role
    private function redirectByRole()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/rekap');
        } else {
            return redirect('/riwayat');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function register()
    {
        return view('users.register');
    }
    public function addUser()
    {
        return view('users.addUser');
    }

    public function saveregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenisInstansi' => 'required|string',
            // 'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'role' => 'user',
            'jenisInstansi' => $request->jenisInstansi,
            'email' => $request->email,
            // 'jenis' => $request->jenis,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('jenisInstansi', 'like', "%{$search}%");
            });
        }

        $dataUser = $query->where('role', 'user')->paginate(10);

        return view('users.addUser', compact('dataUser'));
    }
}

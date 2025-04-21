<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PengaturanAkunController extends Controller
{
    public function index(Request $request)
    {
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edituser', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/addUser')->with('success', 'Akun Berhasil di Perbaharui!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/addUser')->with('success', 'Akun Berhasil di Hapus!');
    }
}

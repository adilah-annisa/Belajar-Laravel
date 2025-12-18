<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUser = User::all();
        return view('layouts.admin.user.index', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.user.create');    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:100',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ], [
        'name.required'     => 'Nama wajib diisi!',
        'name.string'       => 'Nama harus berupa teks!',
        'name.max'          => 'Nama maksimal 100 karakter!',
        'email.required'    => 'Email wajib diisi!',
        'email.email'       => 'Format email tidak valid!',
        'email.unique'      => 'Email sudah terdaftar!',
        'password.required' => 'Password wajib diisi!',
        'password.min'      => 'Password minimal 8 karakter!',
        'password.confirmed'=> 'Konfirmasi password tidak cocok!',
    ]);

    $data = $request->only(['name', 'email']);
    $data['password'] = Hash::make($request->password);

    User::create($data);

    return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layouts.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name'  => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8|confirmed',
    ]);

    $data = $request->only(['name', 'email']);
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);
    return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}

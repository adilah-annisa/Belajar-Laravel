<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // 1. Mulai Query Builder
        $query = Pelanggan::query();

        // 2. Terapkan Filter Gender jika ada permintaan 'gender'
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // 3. Terapkan Pencarian jika ada permintaan 'search'
        if ($request->filled('search')) {
            $search = $request->search;
            // Mencari di first_name, last_name, atau email
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // 4. Ambil data hasil filter/search (tanpa paginasi)
        $dataPelanggan = $query->get();

        // 5. Kirim data ke View
        $data['dataPelanggan'] = $dataPelanggan;
        return view('layouts.admin.pelanggan.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'birthday'   => 'required|date',
            'gender'    => 'required|in:Male,Female',
            'email'      => 'required|email|unique:pelanggan,email',
            'phone'     => 'required|numeric',

        ], [
            'first_name.required' => 'Nama depan wajib diisi!',
            'last_name.required' => 'Nama belakang wajib diisi!',
            'birthday.required' => 'Tanggal lahir wajib diisi!',
            'birthday.date' => 'Format tanggal lahir tidak sesuai!',
            'gender.required' => 'Jenis kelamin wajib dipilih!',
            'gender.in' => 'Jenis kelamin hanya boleh Male atau Female!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'phone.required' => 'Nomor Telepon wajib diisi!',
            'phone.numeric' => 'Nomor telepon harus berupa angka!',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggan_id = $id;
        $data['dataPelanggan'] = Pelanggan::findOrFail($pelanggan_id);
        return view('layouts.admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan_id = $id;
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);

        $validasi = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'birthday'   => 'required|date',
            'gender'    => 'required|in:Male,Female',
            'email'      => ['required', 'email'],
            'phone'     => 'required|numeric',

        ], [
            'first_name.required' => 'Nama depan wajib diisi!',
            'last_name.required' => 'Nama belakang wajib diisi!',
            'birthday.required' => 'Tanggal lahir wajib diisi!',
            'birthday.date' => 'Format tanggal lahir tidak sesuai!',
            'gender.required' => 'Jenis kelamin wajib dipilih!',
            'gender.in' => 'Jenis kelamin hanya boleh Male atau Female!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'phone.required' => 'Nomor Telepon wajib diisi!',
            'phone.numeric' => 'Nomor telepon harus berupa angka!',
        ]);

        $pelanggan->update($validasi);
        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan_id = $id;
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);

        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Dihapus!');
    }
}

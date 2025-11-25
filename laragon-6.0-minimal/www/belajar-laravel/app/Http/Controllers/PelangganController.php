<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
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

        Pelanggan::create($validasi);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
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

        $request->validate([
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

        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success','Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan_id = $id;
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);

        $pelanggan->delete();
        return redirect()->route('admin.pelanggan.index')->with('success','Data Berhasil Dihapus!');
    }
}

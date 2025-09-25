<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Menampilkan data Matakuliah";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Menampilkan form untuk membuat data matakuliah baru";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Menyimpan data matakuliah yang baru dibuat dalam penyimpanan";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id = null)
    {
            return "Anda mengakses matakuliah ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Menampilkan form untuk mengubah data matakuliah tertentu dengan ID : ".$id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Menyimpan perubahan data matakuliah dengan ID : ".$id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Menghapus data matakuliah dari penyimpanan dengan ID : ".$id;
    }
}

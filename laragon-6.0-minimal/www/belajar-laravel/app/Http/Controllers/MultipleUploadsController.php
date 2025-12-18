<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultipleuploadsController extends Controller
{
    public function index()
    {
        return "Halaman Upload";
    }

    public function store(Request $request)
    {
        return back();
    }
}

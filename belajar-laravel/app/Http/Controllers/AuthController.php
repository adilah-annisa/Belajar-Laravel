<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }



    public function login(Request $request) {
         $request-> validate ([
            'username' => 'required',
            'password' => ['required' ,'min:3', 'regex:/[A-Z]/']
        ],
        $pesan = [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal mengandung 3 karakter!',
            'password.regex' => 'Password minimal harus mengandung 1 huruf kapital!'
        ]);



        $data['username']  = $request->username;
        $data['password']  = $request->password;



        return view('auth-respon', $data);


    }
    }


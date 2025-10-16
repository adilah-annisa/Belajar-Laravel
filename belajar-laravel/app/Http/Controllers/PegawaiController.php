<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        $tgl_lahir_str = '2006-12-04';
        $tgl_wisuda_str = '2028-10-20';
        $current_semester = 3;

        $today = new \DateTime('today');
        $my_age = $birthDate->diff($today)->y; // Menghitung selisih tahun
        $tgl_harus_wisuda = new \DateTime($tgl_wisuda_str);
        $time_to_study_left = $today->diff($tgl_harus_wisuda)->days;

        if ($tgl_harus_wisuda < $today) {
            $time_to_study_left = -$time_to_study_left;
        }


        if ($current_semester < 3) {
            $semester_status = "Masih Awal, Kejar TAK!";
        } else {
            $semester_status = "Jangan main-main, kurang-kurangi main game!";
        }

        $data = [
            'name' => 'Adilah Annisa',
            'my_age' => $my_age,
            'hobbies' => [
                'Membaca Komik',
                'Ngoding PHP',
                'Bermain Game',
                'Memasak',
                'Menonton Film'
            ],
            'tgl_harus_wisuda' => date('d F Y', strtotime($tgl_wisuda_str)),
            'time_to_study_left' => $time_to_study_left,
            'current_semester' => $current_semester,
            'semester_status' => $semester_status,
            'future_goal' => 'Ahli di Bidang Backend atau Data Analyst'
        ];

        return view('pegawai_data', $data);
}
}

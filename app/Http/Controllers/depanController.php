<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\riwayat;
use Illuminate\Http\Request;

class depanController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = halaman::where('id', $about_id)->first();

        $interest_id = get_meta_value('_halaman_interest');
        $interest_data = halaman::where('id', $interest_id)->first();

        $awards_id = get_meta_value('_halaman_awards');
        $awards_data = halaman::where('id', $awards_id)->first();

        $experience_data = riwayat::where('tipe', 'experience')->get();
        $education_data = riwayat::where('tipe', 'education')->get();

        return view('depan.index', [
            'title' => 'Halaman Depan',
            'about_data' => $about_data,
            'interest_data' => $interest_data,
            'awards_data' => $awards_data,
            'experience_data' => $experience_data,
            'education_data' => $education_data,
        ]);
    }
}

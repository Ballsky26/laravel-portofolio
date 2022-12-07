<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class pengaturanHalamanController extends Controller
{
    public function index()
    {
        $datahalaman = halaman::orderBy('judul', 'asc')->get();
        return view(
            'dashboard.pengaturanhalaman.index',
            [
                'title' => 'Pengaturan',
                'subtitle' => 'Pengaturan Halaman',
                'datahalaman' => $datahalaman
            ]
        );
    }
    public function update(Request $request)
    {
        metadata::updateOrcreate(['meta_key' => '_halaman_about'], ['meta_value' => $request->_halaman_about]);
        metadata::updateOrcreate(['meta_key' => '_halaman_interest'], ['meta_value' => $request->_halaman_interest]);
        metadata::updateOrcreate(['meta_key' => '_halaman_awards'], ['meta_value' => $request->_halaman_awards]);
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect()->route('pengaturanhalaman.index')->with('success', 'Berhasil Melakukan update Halaman');
    }
}

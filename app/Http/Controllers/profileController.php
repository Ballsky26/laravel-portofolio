<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class profileController extends Controller
{
    public function index()
    {
        return view(
            'dashboard.profile.index',
            [
                'title' => 'Profile',
                'subtitle' => 'Halaman profile'
            ]
        );
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                '_foto' => 'mimes:jpeg,jpg,png,gif',
                '_kota' => 'required',
                '_provinsi' => 'required',
                '_nohp' => 'required',
                '_email' => 'required|email',
                '_facebook' => 'required',
                '_twitter' => 'required',
                '_instagram' => 'required',
                '_linkedin' => 'required',
                '_github' => 'required',
            ],
            [
                '_foto.mimes' => 'Foto yang diunggah hanya diperbolehkan berkestensi JPG, JPEG, PNG dan GIF',
                '_kota.required' => 'Kota wajib diisi',
                '_provinsi.required' => 'Provinsi wajib diisi',
                '_nohp.required' => 'Nomor Hp wajib diisi',
                '_email.required' => 'Email wajib diisi',
                '_email.email' => 'Format email yang dimasukkan tidak valid',
                '_facebook.required' => 'Facebook wajib diisi',
                '_twitter.required' => 'Twitter wajib diisi',
                '_instagram.required' => 'Instagram wajib diisi',
                '_linkedin.required' => 'Linked wajib diisi',
                '_github.required' => 'Github wajib diisi'
            ]
        );

        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . " .$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);
            // Kalau ada Update Foto
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto') . "/" . $foto_lama);
            metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }
        metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);
        metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);

        metadata::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);
        metadata::updateOrCreate(['meta_key' => '_twitter'], ['meta_value' => $request->_twitter]);
        metadata::updateOrCreate(['meta_key' => '_instagram'], ['meta_value' => $request->_instagram]);
        metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);
        metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);


        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect()->route('profile.index')->with('success', 'Berhasil Melakukan update Profile');
    }
}

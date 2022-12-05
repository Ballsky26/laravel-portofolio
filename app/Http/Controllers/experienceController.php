<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class experienceController extends Controller
{
    function __construct()
    {
        $this->_tipe = 'experience';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('tipe',   $this->_tipe)->orderBy('tanggal_akhir', 'desc')->get();
        return view('dashboard.experience.index')->with(
            [
                'data' => $data,
                'title' => 'Experience',
                'subtitle' => 'Halaman Experience',
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create')->with([
            'title' => 'Experience',
            'subtitle' => 'Halaman Tambah Data Experience',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('tanggal_mulai', $request->tanggal_mulai);
        Session::flash('tanggal_akhir', $request->tanggal_akhir);
        Session::flash('isi', $request->isi);
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tanggal_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul belum diisi',
                'info1.required' => 'Nama Perusahaan belum diisi',
                'tanggal_mulai.required' => 'Tanggal Mulai belum diisi',
                'isi.required' => 'Isian tulisan belum diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' =>   $this->_tipe,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'isi' => $request->isi,
        ];

        riwayat::create($data);
        Alert::success('Success', 'Berhasil Menambahkan Data');
        return redirect()->route('experience.index')->with('success', 'Berhasil menambahkan Data Experience');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = riwayat::find($id);
        return view('dashboard.experience.show', [
            'title' => 'Experience',
            'subtitle' => 'Halaman Detail Experience',
            'riwayat' => $riwayat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.experience.edit', [
            'title' => 'Experience',
            'subtitle' => 'Halaman Edit Experience',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tanggal_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul belum diisi',
                'info1.required' => 'Nama Perusahaan belum diisi',
                'tanggal_mulai.required' => 'Tanggal Mulai belum diisi',
                'isi.required' => 'Isian tulisan belum diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' =>   $this->_tipe,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'isi' => $request->isi,
        ];

        riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect()->route('experience.index')->with('success', 'Berhasil mengubah Data Experience');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return redirect()->route('experience.index')->with('success', 'Berhasil hapus Data Experience');
    }
}

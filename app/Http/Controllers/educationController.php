<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class educationController extends Controller
{
    function __construct()
    {
        $this->_tipe = 'education';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('tipe',   $this->_tipe)->orderBy('tanggal_akhir', 'desc')->get();
        return view('dashboard.education.index')->with(
            [
                'data' => $data,
                'title' => 'Education',
                'subtitle' => 'Halaman Education',
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
        return view('dashboard.education.create')->with([
            'title' => 'Education',
            'subtitle' => 'Halaman Tambah Data Education',
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
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('tanggal_mulai', $request->tanggal_mulai);
        Session::flash('tanggal_akhir', $request->tanggal_akhir);
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'info3' => 'required',
                'tanggal_mulai' => 'required',
            ],
            [
                'judul.required' => 'Nama Universitas belum diisi',
                'info1.required' => 'Nama Fakultas belum diisi',
                'info2.required' => 'Nama Jurusan belum diisi',
                'info3.required' => 'IPK belum diisi',
                'tanggal_mulai.required' => 'Tanggal Mulai belum diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' =>   $this->_tipe,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
        ];

        riwayat::create($data);
        Alert::success('Success', 'Berhasil Menambahkan Data');
        return redirect()->route('education.index')->with('success', 'Berhasil menambahkan Data education');
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
        return view('dashboard.education.show', [
            'title' => 'Education',
            'subtitle' => 'Halaman Detail Education',
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
        return view('dashboard.education.edit', [
            'title' => 'Education',
            'subtitle' => 'Halaman Edit Education',
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
                'info2' => 'required',
                'info3' => 'required',
                'tanggal_mulai' => 'required',
            ],
            [
                'judul.required' => 'Nama Universitas belum diisi',
                'info1.required' => 'Nama Fakultas belum diisi',
                'info2.required' => 'Nama Jurusan belum diisi',
                'info3.required' => 'IPK belum diisi',
                'tanggal_mulai.required' => 'Tanggal Mulai belum diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' =>   $this->_tipe,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
        ];

        riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect()->route('education.index')->with('success', 'Berhasil mengubah Data education');
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
        return redirect()->route('education.index')->with('success', 'Berhasil hapus Data education');
    }
}

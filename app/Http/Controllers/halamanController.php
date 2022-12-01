<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.halaman.index', [
            'title' => 'Layout',
            'subtitle' => 'Halaman',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.halaman.create', [
            'title' => 'Layout',
            'subtitle' => 'Halaman Tambah',
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
        Session::flash('isi', $request->isi);
        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul belum diisi',
                'isi.required' => 'Isian tulisan belum diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        halaman::create($data);
        Alert::success('Success', 'Berhasil Menambahkan Data');
        return redirect()->route('halaman.index')->with('success', 'Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = halaman::where('id', $id)->first();
        return view('dashboard.halaman.edit', [
            'title' => 'Layout',
            'subtitle' => 'Halaman Edit',
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
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul belum diisi',
                'isi.required' => 'Isian tulisan belum diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        halaman::where('id', $id)->update($data);
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect()->route('halaman.index')->with('success', 'Berhasil mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        halaman::where('id', $id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return redirect()->route('halaman.index')->with('success', 'Berhasil hapus Data');
    }
}

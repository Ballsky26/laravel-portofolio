@extends('layouts.dashboard')
@section('title')
    {{ $title }}
@endsection
@section('subtitle')
    {{ $subtitle }}
@endsection
@section('content')
@if (Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
<a href="{{ route('experience.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Experience</a>
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th class="col-1">No</th>
          <th>Posisi</th>
          <th>Nama Perusahaan</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Akhir</th>
          <th class="col-2">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($data as $key=>$item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->info1 }}</td>
            <td>{{ $item->tanggal_mulai_indo }}</td>
            <td>{{ $item->tanggal_akhir_indo }}</td>
            <td><a href="{{ route('experience.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
            <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form onsubmit="return confirm('Yakin hapus data ini?')" method="post" action="{{ route('experience.destroy', $item->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-sm btn btn-danger" type="submit" name="submit">Delete</button></form>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection
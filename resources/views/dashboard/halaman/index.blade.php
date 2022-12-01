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
<a href="{{ route('halaman.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Halaman</a>
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th class="col-1">No</th>
          <th>Judul</th>
          <th class="col-2">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($data as $key=>$item)
        <tr>
            <td>{{$key + 1}}</th>
            <td>{{ $item->judul }}</td>
            <td><a href="{{ route('halaman.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
            <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form onsubmit="return confirm('Yakin hapus data ini?')" method="post" action="{{ route('halaman.destroy', $item->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-sm btn btn-danger" type="submit" name="submit">Delete</button></form>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection
@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')

<div class="col-md-12">
    <form action="{{ route('halaman.update', $data->id) }}" method="post">
       @csrf
       @method('PUT')
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" value="{{ $data->judul }}">
          @error('judul')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label">Isi Halaman</label>
          <textarea id="summernote" class="form-control" name="isi" placeholder="Masukkan Isian Halaman" id="isi">{{ $data->isi  }}</textarea>
        </div>
        @error('isi')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
         @enderror
          <a href="{{ route('halaman.index') }}" class="btn btn-secondary mt-2">Batal</a>
          <button type="submit" name="simpan" class="btn btn-primary mt-2">Kirim</button>
    </form>
  </div>
    
@endsection
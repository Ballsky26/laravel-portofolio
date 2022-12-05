@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')

<div class="col-md-12">
    <form action="{{ route('experience.update', $data->id) }}" method="post">
       @csrf
       @method('PUT')
       <div class="mb-3">
        <label for="judul" class="form-label">Posisi</label>
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Posisi" value="{{ $data->judul  }}">
        @error('judul')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="info1" class="form-label">Nama Perusahaan</label>
        <input type="text" class="form-control" name="info1" id="info1" placeholder="Masukkan Nama Perusahaan" value="{{ $data->info1 }}">
        @error('info1')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
         @enderror
      </div>
      <div class="mb-3">
        <div class="row">
          <div class="col-auto">Tanggal Mulai</div>
          <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tanggal_mulai" id="tanggal_mulai" placeholder="dd/mm/yyy" value="{{ $data->tanggal_mulai }}"></div>
          @error('tanggal_mulai')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
          <div class="col-auto">Tanggal Akhir</div>
          <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tanggal_akhir" id="tanggal_akhir" placeholder="dd/mm/yyy" value="{{ $data->tanggal_akhir }}"></div>
          @error('tanggal_akhir')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
        </div>
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
          <a href="{{ route('experience.index') }}" class="btn btn-secondary mt-2">Batal</a>
          <button type="submit" name="simpan" class="btn btn-primary mt-2">Kirim</button>
    </form>
  </div>
    
@endsection
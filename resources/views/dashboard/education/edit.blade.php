@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')

<div class="col-md-12">
    <form action="{{ route('education.update', $data->id) }}" method="post">
       @csrf
       @method('PUT')
        <div class="mb-3">
          <label for="judul" class="form-label">Universitas</label>
          <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Universitas" value="{{ $data->judul }}">
          @error('judul')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="info1" class="form-label">Fakultas</label>
          <input type="text" class="form-control" name="info1" id="info1" placeholder="Masukkan Nama Fakultas" value="{{ $data->info1 }}">
          @error('info1')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="info2" class="form-label">Jurusan</label>
          <input type="text" class="form-control" name="info2" id="info2" placeholder="Masukkan Nama Jurusan" value="{{ $data->info2 }}">
          @error('info2')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="info3" class="form-label">IPK</label>
          <input type="text" class="form-control" name="info3" id="info3" placeholder="Masukkan IPK" value="{{ $data->info3}}">
          @error('info3')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-auto">Tanggal Mulai</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tanggal_mulai" id="tanggal_mulai" placeholder="dd/mm/yyy" value="{{ $data->tanggal_mulai}}"></div>
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
            <a href="{{ route('education.index') }}" class="btn btn-secondary mt-2">Batal</a>
          <button type="submit" name="simpan" class="btn btn-primary mt-2">Kirim</button>
    </form>
  </div>
    
@endsection
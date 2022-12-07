@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')

<div class="col-md-12">
    <form action="{{ route('pengaturanhalaman.update') }}" method="post">
       @csrf
       <div class="form-group row">
        <label class="col-sm-2">About</label>
        <div class="col-sm-6">
            <select class="form-control" name="_halaman_about" id="_halaman_about">
                <option value="">-Pilih</option>
                @foreach ($datahalaman as $item)
                <option value="{{ $item->id }}" {{ get_meta_value('_halaman_about') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }}</option>
                @endforeach
            </select>
        </div>
       </div>
       <br>
       <div class="form-group row">
        <label class="col-sm-2">Interest</label>
        <div class="col-sm-6">
            <select class="form-control" name="_halaman_interest" id="_interest">
                <option value="">-Pilih</option>
                @foreach ($datahalaman as $item)
                <option value="{{ $item->id }}" {{ get_meta_value('_halaman_interest') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }}</option>  
                @endforeach
            </select>
        </div>
       </div>
       <br>
       <div class="form-group row">
        <label class="col-sm-2">Awards</label>
        <div class="col-sm-6">
            <select class="form-control" name="_halaman_awards" id="_halaman_awards">
                <option value="">-Pilih</option>
                @foreach ($datahalaman as $item)
                <option value="{{ $item->id }}" {{ get_meta_value('_halaman_awards') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }}</option> 
                @endforeach
            </select>
            <br>
            <button type="submit" name="simpan" class="btn btn-primary mt-2">Kirim</button>
        </div>
       </div>
          {{-- <a href="{{ route('skill.index') }}" class="btn btn-secondary mt-2">Batal</a> --}}
        </form>
  </div>
    
@endsection
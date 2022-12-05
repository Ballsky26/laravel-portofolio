@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')
    <div class="card-body">
      <h3 class="card-title">{{ $riwayat->judul }}</h3>
      <p class="card-text">
        <small class="text-muted">{{ $riwayat->info1 }}</small>
      </p>
      <p class="card-text">
        <small class="text-muted">Tanggal Mulai {{ $riwayat->tanggal_mulai_indo }}</small>
      </p>
      <p class="card-text">
        <small class="text-muted">Tanggal Akhir {{ $riwayat->tanggal_akhir_indo }}</small>
      </p>
      <p class="card-text">
        {!! $riwayat->isi !!}
      </p>
     
      <a href="{{ route('experience.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

@endsection
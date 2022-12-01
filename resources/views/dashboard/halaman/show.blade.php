@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')
    <div class="card-body">
      <h5 class="card-title">{{ $halaman->judul }}</h5>
      <p class="card-text">
        {!! $halaman->isi !!}
      </p>
      <p class="card-text">
        <small class="text-muted">Terakhir di update {{ $halaman->updated_at->format('d-m-Y H:i:s'); }}</small>
      </p>
      <a href="{{ route('halaman.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

@endsection
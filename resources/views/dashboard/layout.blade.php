@extends('layouts.dashboard')
@section('title')
    {{ $title }}
@endsection
@section('content')
<h3 class="card-title text-primary">Selamat Datang {{ Auth::user()->name}}</h3>
@endsection
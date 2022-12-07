@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')

<div class="col-md-12">
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
       @csrf
       <div class="row justify-content-between">
           <div class="col-5">
            <h5>Profile</h5>
            @if (get_meta_value('_foto'))
            <img style="max-width:250px;max-height:250px" src="{{ asset('foto') . '/' . get_meta_value('_foto') }}">
            @endif
            <div class="mb-3">
                <label for="_foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="_foto" id="_foto">
                @error('_foto')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            <div class="mb-3">
                <label for="_kota" class="form-label">Kota</label>
                <input type="text" class="form-control" name="_kota" id="_kota" value="{{ get_meta_value('_kota') }}">
                @error('_kota')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            <div class="mb-3">
                <label for="_provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control" name="_provinsi" id="_provinsi" value="{{ get_meta_value('_provinsi') }}">
                @error('_provinsi')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            <div class="mb-3">
                <label for="_nohp" class="form-label">Nomor Hp</label>
                <input type="text" class="form-control" name="_nohp" id="_nohp" value="{{ get_meta_value('_nohp') }}">
                @error('_nohp')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            <div class="mb-3">
                <label for="_email" class="form-label">Email</label>
                <input type="text" class="form-control" name="_email" id="_email" value="{{ get_meta_value('_email') }}">
                @error('_email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
        </div>
        <div class="col-5">
            <h5 clas>Akun Social Media</h5>
            <div class="mb-3">
                <label for="_facebook" class="form-label">Facebook</label>
                <input type="text" class="form-control" name="_facebook" id="_facebook" value="{{ get_meta_value('_facebook') }}">
                @error('_facebook')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            <div class="mb-3">
                <label for="_twitter" class="form-label">Twitter</label>
                <input type="text" class="form-control" name="_twitter" id="_twitter" value="{{ get_meta_value('_twitter') }}">
                @error('_twitter')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            <div class="mb-3">
                <label for="_instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" name="_instagram" id="_instagram" value="{{ get_meta_value('_instagram') }}">
                @error('_instagram')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            <div class="mb-3">
                <label for="_linkedin" class="form-label">LinkedIn</label>
                <input type="text" class="form-control" name="_linkedin" id="_linkedin" value="{{ get_meta_value('_linkedin') }}">
                @error('_linkedin')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            
            <div class="mb-3">
                <label for="_github" class="form-label">Github</label>
                <input type="text" class="form-control" name="_github" id="_github" value="{{ get_meta_value('_github') }}">
                @error('_github')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
        </div>
       </div>
       
          {{-- <a href="{{ route('skill.index') }}" class="btn btn-secondary mt-2">Batal</a> --}}
          <button type="submit" name="simpan" class="btn btn-primary mt-2">Kirim</button>
    </form>
  </div>
    
@endsection
    
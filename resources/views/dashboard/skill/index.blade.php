@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('subtitle')
    {{ $subtitle }}
@endsection

@section('content')

<div class="col-md-12">
    <form action="{{ route('skill.update') }}" method="post">
       @csrf
        <div class="mb-3">
          <label for="_language" class="form-label">Programming Language & Tools</label>
          <input type="text" class="form-control skill" name="_language" id="_language" placeholder="Masukkan Language & Tools" value="{{ get_meta_value('_language') }}">
          @error('_language')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="_workflow" class="form-label">Workflow</label>
          <textarea id="summernote" class="form-control" name="_workflow" placeholder="Masukkan _workflow" id="_workflow">{{ get_meta_value('_workflow') }}</textarea>
        </div>
        @error('_workflow')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
         @enderror
          {{-- <a href="{{ route('skill.index') }}" class="btn btn-secondary mt-2">Batal</a> --}}
          <button type="submit" name="simpan" class="btn btn-primary mt-2">Kirim</button>
    </form>
  </div>
    
@endsection

@push('child-scripts')
<script>
  $(document).ready(function() {
      $('.skill').tokenfield({
          autocomplete: {
              source: [{!! $skill !!}],
              delay: 100
          },
          showAutocompleteOnFocus: true
      });
  });
</script>
    
@endpush
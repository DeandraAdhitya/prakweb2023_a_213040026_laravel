@extends('dashboard.layouts.main')

@section('container')
  {{-- Button edit post --}}
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div>

  <div class="col-lg-8">
    {{-- Form input --}}
    <form method="POST" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
      @method('put')

      @csrf

      {{-- Bagian title --}}
      <div class="mb-3">
        {{-- Label title --}}
        <label for="title" class="form-label">Title</label>
        {{-- Input title --}}
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
        {{-- Menampilkan error jika judul tidak valid --}}
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        {{-- Label slug --}}
        <label for="slug" class="form-label">Slug</label>
        {{-- Input slug --}}
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        {{-- Label category --}}
        <label for="category" class="form-label">Category</label>
        {{-- Dropdown category --}}
        <select class="form-select" name="category_id">

          @foreach ($categories as $category)

            @if (old('category_id', $post->category_id) == $category->id)
              {{-- Tampilkan category yang dipilih --}}
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            {{-- Jika tidak --}}
            @else
              {{-- Tampilkan category yang ada --}}
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach

        </select>
      </div>

      <div class="mb-3">
        {{-- Label image --}}
        <label for="image" class="form-label">Post Image</label>

        {{-- Mengirim data image lama --}}
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        
        @if ($post->image)
          {{-- Tampilkan image tersebut --}}
          <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        {{-- Jika tidak ada --}}
        @else
          {{-- Tampilkan image kosong --}}
          <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif
        
        {{-- Input image --}}
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        {{-- Label body --}}
        <label for="body" class="form-label">Body</label>
        {{-- Menampilkan error jika body tidak valid --}}
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        {{-- Input body --}}
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
        {{-- Menampilkan editor --}}
        <trix-editor input="body"></trix-editor>
      </div>

      {{-- Button edit post --}}
      <button type="submit" class="btn btn-primary">Edit Post</button>
    </form>
  </div>

  {{-- Script untuk slug dan trix editor --}}
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    });

    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREVent) {
        imgPreview.src = oFREVent.target.result;
      }
    }
  </script>
@endsection
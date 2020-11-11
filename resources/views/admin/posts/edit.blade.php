@extends('layouts.app')

@section('content')
  
@php
    // dd($article);
@endphp

  <div class="container">

      <h1>MODIFICA ARTICOLO</h1>

      <form action="{{route('admin.posts.update', $article)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method("PUT")

        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci il titolo" value="{{old('title') ?? $article->title}}">
        </div>

        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{old('slug') ?? $article->slug}}">
        </div>

        <div class="form-group">
          <label for="content">content</label>
          <textarea type="text" class="form-control" name="content" id="content" placeholder="Contenuto">{{old('content') ?? $article->content}}</textarea>
        </div>

        {{-- Tag Group --}}
        <div class="form-group">
          <label for="tag">Tag</label>
          <select class="form-control" name="tag[]" id="tag">
            <option value="null">Scegli un tag</option>
            @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="tag">Tag</label>
          <select class="form-control" name="tag[]" id="tag">
            <option value="null">Scegli un tag</option>
            @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="tag">Tag</label>
          <select class="form-control" name="tag[]" id="tag">
            <option value="null">Scegli un tag</option>
            @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="tag">Tag</label>
          <select class="form-control" name="tag[]" id="tag">
            <option value="null">Scegli un tag</option>
            @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        </div>
        {{-- /Tag Group --}}

        <div class="form-group">
          <label for="image">Immagine</label>
          <input type="file" class="form-control" name="image" id="image" placeholder="Inserisci l'immagine" accept="image/*">
        </div>

          <button type="submit" class="btn btn-primary">Salva</button>

          <a class="btn btn-secondary" href="{{route('admin.posts.show', $article->slug)}}">Indietro</a>

      </form>

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </div>
@endsection
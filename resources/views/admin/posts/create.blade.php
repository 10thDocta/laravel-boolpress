@extends('layouts.app')

@section('content')
  
  <div class="container">

      <H1>CREA NUOVO POST</H1>

      <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method("POST")

        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci il titolo">
        </div>

        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
        </div>

        <div class="form-group">
          <label for="content">content</label>
          <textarea type="text" class="form-control" name="content" id="content" placeholder="Contenuto"></textarea>
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
          <a class="btn btn-secondary" href="{{route('admin.posts.index')}} ">Indietro</a>

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
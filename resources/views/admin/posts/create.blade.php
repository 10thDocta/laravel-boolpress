@extends('layouts.app')

@section('content')
  
  <div class="container">

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

        <div class="form-group">
          <label for="image">Immagine</label>
          <input type="file" class="form-control" name="image" id="image" placeholder="Inserisci l'immagine" accept="image/*">
        </div>

          <button type="submit" class="btn btn-primary">Salva</button>
          <a href="{{route('admin.posts.index')}} "><button class="btn btn-secondary">Indietro</button></a>

      </form>
    </div>
@endsection
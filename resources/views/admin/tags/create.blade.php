@extends('layouts.app')

@section('content')
  
  <div class="container">

      <form action="{{route('admin.tags.store')}}" method="POST">

        @csrf
        @method("POST")

        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" name="tag[]" id="tag" placeholder="Inserisci il nuovo tag">
        </div>

        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" name="tag[]" id="tag" placeholder="Inserisci il nuovo tag">
        </div>

        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" name="tag[]" id="tag" placeholder="Inserisci il nuovo tag">
        </div>

        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" name="tag[]" id="tag" placeholder="Inserisci il nuovo tag">
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
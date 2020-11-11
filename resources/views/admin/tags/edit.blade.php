@extends('layouts.app')

@section('content')
  
  <div class="container">

      <form action="{{route('admin.tags.update', $tag->id )}}" method="POST">

        @csrf
        @method("PUT")

        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" name="tag" id="tag" placeholder="Inserisci il nuovo tag" value="{{old("tag") ?? $tag->name}}">
        </div>       

          <button type="submit" class="btn btn-primary">Salva</button>
          
          <a class="btn btn-secondary" href="{{route('admin.tags.index')}}">Indietro</a>

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
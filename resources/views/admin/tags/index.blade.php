@extends('layouts.app')

@section('content')
    <div class="container">
      <h1>TAGS INDEX</h1>
      <a href="{{route('admin.tags.create')}} "><button class="btn btn-light">Crea nuovo</button></a>
        <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tags as $tag)
                  <tr>
                    <td>{{$tag->name}}</td> 
                    <td>                      
                        <a href="{{route('admin.tags.edit', $tag->id)}}">Modifica</a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
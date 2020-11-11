@extends('layouts.app')

@section('content')
    <div class="container">
      <a href="{{route('admin.posts.create')}} "><button class="btn btn-light">Crea nuovo</button></a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Contenuto</th>
                <th scope="col">Slug</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $article)
                  <tr>
                    <td>{{$article->title}}</td> 
                    <td>{{$article->content}}</td>
                    <td>{{$article->slug}}</td>
                    <td>
                        <a href="{{route('admin.posts.show', $article->slug)}} ">Visualizza</a>
                        <a href="{{route('admin.posts.edit', $article->slug)}}">Modifica</a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
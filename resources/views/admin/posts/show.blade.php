@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Contenuto</th>
                <th scope="col">Slug</th>
                <th scope="col">Tag</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>

                  <tr>
                    <td>{{$article->title}}</td> 
                    <td>{{$article->content}}</td>
                    <td>{{$article->slug}}</td>
                    <td>
                    @foreach ($article->tags as $tag)
                      {{$tag->name}} |
                    @endforeach
                    </td>
                    <td>                      
                      <a class="btn btn-primary" href="{{route('admin.posts.edit', $article->slug)}}">Modifica</a>

                      <form action="{{route('admin.posts.destroy', $article->id)}} " method="post">
                        @csrf
                        @method('DELETE')
            
                        <input class="btn btn-secondary" type="submit" value="Cancella" onclick="return confirm('Sicuro di voler cancellare?')">
                    </form>
                  </td>
                  </tr>

            </tbody>
          </table>
          <img src="{{asset('storage/'.$article->image)}} " alt="">
    </div>
@endsection
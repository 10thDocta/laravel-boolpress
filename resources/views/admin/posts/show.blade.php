@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Contenuto</th>
                <th scope="col">Slug</th>
              </tr>
            </thead>
            <tbody>

                  <tr>
                    <td>{{$article->title}}</td> 
                    <td>{{$article->content}}</td>
                    <td>{{$article->slug}}</td>
                  </tr>

            </tbody>
          </table>
    </div>
@endsection
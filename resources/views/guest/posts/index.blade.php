@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">

    <h1 class="my-4">Page Heading
      <small>Secondary Text</small>
    </h1>

    <!-- Blog Post -->
    @foreach ($articles as $article)
      <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title"> {{$article->title}} </h2>
          <p class="card-text"> {{$article->content}} </p>
          <a href="{{route('posts.show', $article->slug)}} " class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2020 by
          <a href="#">{{$article->user->name}} </a>
        </div>
      </div>
    @endforeach

  </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

</body>
@endsection
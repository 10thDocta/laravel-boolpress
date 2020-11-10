@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4"> {{$article->title}} </h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#"> {{$article->user->name}} </a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on January 1, 2019 at 12:00 PM</p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{asset('storage/'.$article->image)}}" alt="">

      <hr>

      <!-- Post Content -->
      <p class="lead">{{$article->content}} </p>

      <hr>  

    </div>

    

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection
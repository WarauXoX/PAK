@extends('layouts.app')

@section('links')
    <link href="/css/app.css" rel="stylesheet">
    <script src="js/app.js"></script>
@endsection

@section('content')
    <h1>posts</h1>
    <div class="album py-5 bg-body-tertiary">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($posts as $post)

        <div class="col">
            <div class="card shadow-sm">
                @foreach($post->imgs as $img)
                    <img width="100px" height="100px" src="{{Storage::url($img->image_path)}}">
                        <p>{{$post->title}}</p>
                    </img>
                @endforeach

                @foreach($post->groups as $group)
                    <div class="card-body display-flex direction-center">
                        <h3 class="card-text"> Група: {{$group->title}}</h3>
                        <p class="card-text">{{$group->text}}</p>
                    </div>
                @endforeach
                <hr/>
                @foreach($post->posttexts as $posttext)
                    <div class="card-body">
                        <h1 class="card-text">{{$posttext->title}}</h1>
                        <p class="card-text">{{$posttext->text}}</p>
                    </div>
                    <hr>
                @endforeach
                </div>
            <a href="{{route("course.show", $post->id)}}">this</a>
            </div>
            <hr>
            <hr>
    @endforeach
    </div>
    </div>
    </div>


@endsection

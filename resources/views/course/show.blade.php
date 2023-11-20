@extends('layouts.PAKH')
@section('links')
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/profile.css")}}">
@endsection

@section('content')
    @foreach($post->imgs as $img)
        <img src="{{\Illuminate\Support\Facades\Storage::url($img->image_path)}}" alt="image" width="25%" height="25%">
    @endforeach

    <h1>{{$post->title}}</h1>
    <hr>
    @foreach($post->posttexts as $text)
        <div class="grey-text">
            <h3>{{$text->title}}</h3>
            <p>{{$text->text}}</p>
        </div>
    @endforeach


@endsection

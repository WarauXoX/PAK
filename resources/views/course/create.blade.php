@extends('layouts.app')
@section('links')

    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/js/constructor.js")}}">

@endsection


@section('content')
    <h1>Создание поста</h1>
    <form action="{{route(  "lessons.store"  )}}" method="POST" class="d-flex" enctype="multipart/form-data">
        @csrf
        <input type="integer" style="display: none" value="{{auth()->user()->id}}" name="user_id">


        <label for="title">Название </label>
        <input type="text" name="title" id="title" placeholder="title"/>

        <div class="d-flex flex-column bd-highlight mb-3">
            <label for="titletexts">заголовок</label>
            <input type="text" name="titletexts[]" id="titletexts">
            <label for="text"> Текст</label>
            <textarea name="texts[]" id="text"></textarea>
        </div>
    </form>
    <form action="{{route('rows.store')}}" method="post">


        <div class="d-flex flex-column bd-highlight mb-3">
            <label for="imgsTitle"></label>
            <input type="text" name="imgs_title[]" id="imgsTitle"/>

            <label for="imgs">картинка</label>
            <input type="file" name="imgs[]", id="imgs">
        </div>

        <input type="submit" value="ок"/>
    </form>
@endsection

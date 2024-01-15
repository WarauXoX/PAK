@extends('layouts.PAKH')

@section('links')
    <link rel="stylesheet" href="{!! asset("/assets/css/style.css") !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Создание курса</title>
@endsection

@section('content')
    <h1>Курс</h1>
    <h4>{!! $course_name !!}</h4>

    <form action="{!! route('lessons.store') !!}" method="POST">
        @csrf
        <input type="text" placeholder="Название Материала">
        <button type="submit">Создать материал</button>
    </form>
@endsection

@section('script')
@endsection

@extends('layouts.PAKH')

@section('links')
    <link rel="stylesheet" href="{!! asset("/assets/css/style.css") !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Создание курса</title>
@endsection

@section('content')
    <h1>Курс</h1>
    <h4>{!! $course->title !!}</h4>
        <ul>
            @foreach($lessons as $lesson)
                <li><a href="{!! url('/courses/'. $course->id. '/lessons/' .$lesson->id . '/create') !!}">{!! $lesson->title !!}</a></li>
            @endforeach
        </ul>


    <form action="{!! route('lessons.store',  ['c_id' => $course->id]) !!}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Название Материала">
        <input type="number" style="display: none" name="course_id" value="{!! $course->id !!}">
        <button type="submit">Создать материал</button>
    </form>
@endsection

@section('script')
@endsection

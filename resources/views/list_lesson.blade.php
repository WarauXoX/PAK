@extends('layouts.PAKH')

@section('links')
    <link rel="stylesheet" href="{!! asset("/assets/css/style.css") !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Создание курса</title>
@endsection

@section('content')
    <div>
        <h2>создание курса</h2>
        <p>название</p>
        <h3>{!! $course->title !!}</h3>
    </div>
    <div>
        <p>выберете один из созданных уроков для его редактирования</p>
        <ul style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
            @foreach($lessons as $lesson)
                <li ><a href="{!! url('/courses/'. $course->id. '/lessons/' .$lesson->id . '/create') !!}">{!! $lesson->title !!}</a></li>
            @endforeach
        </ul>


        <form action="{!! route('lessons.store',  ['c_id' => $course->id]) !!}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Название Материала">
            <input type="number" style="display: none" name="course_id" value="{!! $course->id !!}">
            <button type="submit">Создать материал</button>
        </form>
    </div>

@endsection

@section('script')
@endsection

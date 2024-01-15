@extends('layouts.PAKH')
@section('links')

    <link rel="stylesheet" href="{!! asset("/assets/css/style.css") !!}">
@endsection

@section('content')
    <div class="list">

        <ul class="list_courses">

            @foreach($courses as $course)
                <li class="course">
                    <form action="{!! route('list_lesson') !!}" method="post">
                        @csrf
                        <h1>{!! $course->title !!}</h1>
                        <button type="submit" name="course_id" value="{!! $course->id !!}">{!! $course->title !!}</button>
                    </form>

                </li>
            @endforeach

        </ul>

        <form action="{!! route('courses.store') !!}" method="post">
            @csrf
            <input type="text" placeholder="Название курса" name="title_course">
            <input type="submit" value="Создать курс">
        </form>
    </div>


@endsection

@section('script')
@endsection

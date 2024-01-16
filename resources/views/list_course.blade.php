@extends('layouts.PAKH')
@section('links')

    <link rel="stylesheet" href="{!! asset("/assets/css/style.css") !!}">
@endsection

@section('content')
    <div class="list">

        <ul class="list_courses">

            @foreach($courses as $course)
                <li class="course">
                    <a href="{!! url('courses/' .$course->id . '/lessons') !!}"><h1>{!! $course->title !!}</h1></a>

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

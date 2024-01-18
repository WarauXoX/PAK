@extends('layouts.PAKH')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/course_creator.css')}}">

    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Создание материала</title>


@endsection

@section("content")
    <iframe id="new-target" style="display: none"></iframe>

    <h1>Курс: {!! $course->title !!}</h1> <div><a href="{!! route('courses.index') !!}">Курсы</a></div>
        <hr width="47.5%">
    <h2>Материал: {!! $lesson->title !!}</h2>

    <section class="course-constructor">
            <table>
                    @foreach($rows as $row)
                        <tr id="row_{!! $row->id !!}">

                                @foreach($row->posts as $post)
                                    <td id="post_{!! $post->id !!}">
                                        @if(isset($post->posttext))

                                            <form action="{!! route('posttext.update', ['id' => $post->posttext->id, 'post_id' => $post->id]) !!}" method="post">
                                                @csrf
                                                <input type="text" name="title" value="{!! $post->posttext->title !!}">
                                                <textarea name="text">{!! $post->posttext->text !!}</textarea>
                                                <input type="submit" value="submit">
                                            </form>

                                        @else
                                            <form action="{!! route('posttext.store') !!}" method="post">
                                                @csrf
                                                <input type="number" style="display: none" name="post_id" value="{!! $post->id !!}">
                                                <input type="submit" value="create_text">
                                            </form>
                                        @endif
                                    </td>
                                @endforeach

                        </tr>
                    @endforeach

                <tr class="block adder" id="adder">

                    <td>

                        <form action="{!! route('rows.store') !!}" method="post">
                            @csrf
                            <input type="number" name="lesson_id" value="{!! $lesson->id !!}" style="display: none">
                            <input type="submit" value="+">
                        </form>
                    </td>
                </tr>
            </table>
            <input type="submit" value="submit">
    </section>


    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>

    <script src="{{asset('assets/JS/course-constuctor.js')}}"></script>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        const adder = $('#adder'); // строка добавления строк
        const adderButton = $('#adder > td > span'); // кнопка для добовления строки

    </script>

    <script>

    </script>
@endsection


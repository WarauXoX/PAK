@extends('layouts.PAKH')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/course_creator.css')}}">

    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
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
        <div class="table js-trix js-ckeditor">


                    @foreach($rows as $row)

                            @foreach($row->posts as $post)
                        <div id="row_{!! $row->id !!}">
                                <div id="post_{!! $post->id !!}" class="side_{!! $post->side !!}">
                                    @if(isset($post->posttext))
                                        <form class="texteditForm" action="{!! route('posttext.update', ['id' => $post->posttext->id, 'post_id' => $post->id]) !!}" method="post">
                                            @csrf
                                            <input type="text" name="title" value="{!! $post->posttext->title !!}">

                                            <div class="quill" >
                                                {{ $post->posttext->text }}

                                            </div>
                                            <textarea type="text" style="display: none" name="text" class="hiddenTextArea"></textarea>
                                            <input type="submit" value="submit" class="btn btn-success">
                                        </form>
                                    @else               {{--// форма для создания кнопки для текста--}}
                                        <form action="{!! route('posttext.store') !!}" method="post">
                                            @csrf
                                            <input type="number" style="display: none" name="post_id" value="{!! $post->id !!}">
                                            <input type="submit" value="create_text" class="btn btn-success">
                                        </form>

                                        <form action="" class="">     {{--Форма для создания кнопки для картинки--}}
                                            <input type="submit" value="poka ne rabota" class="btn btn-danger">
                                        </form>
                                    @endif
                                </div>
                        </div>
                        @endforeach

                    @endforeach

                <div class="adder" >
                        <form action="{!! route('rows.store') !!}" method="post">
                            @csrf
                            <input type="number" name="lesson_id" value="{!! $lesson->id !!}" style="display: none">
                            <input type="submit" value="+" class="btn btn-outline-light modal-fullscreen">
                        </form>
                </div>
        </div>
    </section>


    <script src="{{asset('assets/JS/course-constuctor.js')}}"></script>
@endsection

@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];
        const adder = $('#adder'); // строка добавления строк
        const adderButton = $('#adder > td > span'); // кнопка для добовления строки

    </script>

    <script>
        var values = [];
        let editors = document.querySelectorAll('.quill');

        editors.forEach( el => {
            let edit = new Quill(el, {
           modules: { toolbar: toolbarOptions },
               theme: 'snow'
           });

        })

        let forms = document.querySelectorAll('.texteditForm');

        forms.forEach( el => {
            el.addEventListener("submit", e => {

                let text = el.querySelector('div');
                let HtextArea = el.querySelector('.hiddenTextArea').html();
                HtextArea.val($(text).val.html())
                console.log(HtextArea);
                e.preventDefault()
            })
        })
    </script>


@endsection


@extends('layouts.PAKH')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/course_creator.css')}}">

    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section("content")

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
    <section class="naming-course">
        <h2>создание курса</h2>
        <input list="courses" name="title_course" placeholder="Название курса" type="text">
        <datalist id="courses">
            @foreach(\App\Models\Course\Course::all() as $course)
                <option id="" value="{{$course->title}}"></option>
            @endforeach
        </datalist>

        <hr width="47.5%">
        <input name="title" placeholder="Название материала" type="text">
    </section>



    <section class="course-constructor">

            <table cols="2">
                <tr class="block row" id="row_1">
                    <td  class="left-block"><span class="elem" id="1">Выберете блок</span></td>
                    <td class="left-block"><span class="elem" id="1">+</span></td>
                </tr>

                <tr class="block adder" id="adder">
                    <td><span class="elem" id="1">  +  </span></td>
                </tr>

            </table>
            <input type="submit" value="submit">

        </section>
    </form>



    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>

    <script src="{{asset('assets/JS/course-constuctor.js')}}"></script>
@endsection

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        let default_block = `<tr class="block row" >
            <td class="left-block"><span class="elem" id="1">Выберете блок</span></td>
            <td class="left-block"><span class="elem" id="1">+</span></td>
        </tr>`;
    </script>
    <script>
        function adder(id){
            let def = $(default_block);
            def.attr('id', `row_${id}`)
            $('tr#adder').before(def);
        }

        $('#adder').click( ()=>{
            let id = parseInt( $('tr[id!="adder"]:last').attr('id').split('_')[1] );
            adder(id+1)});
    </script>

@endsection


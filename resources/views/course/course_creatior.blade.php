@extends('layouts.PAKH')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/course_creator.css')}}">

    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section("content")
    <iframe id="new-target" style="display: none"></iframe>
    <form id="course" target="new-target" method="POST">
        @csrf
        <h2>создание курса</h2>
        <input list="courses" name="title" placeholder="Название курса" type="text" class="form-control">
        <datalist id="courses">
            @foreach(\App\Models\Course\Course::all() as $course)
                <option id="" value="{{$course->title}}"></option>
            @endforeach
        </datalist>
    </form>

    <form id="lesson" action="" target="new-target">
        <input list="lessons" name="title" placeholder="Название материала" type="text" class="form-control">
        <datalist id="lessons">

        </datalist>
    </form>
        <hr width="47.5%">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>

        class Page{
            constructor(props) {
                this.course = {};
                this.lesson = {};
                this.rows = [];
            }

            setCourse(){
                $.ajax({
                    url:'{!! route('courses.store') !!}',
                    data:$('form#course').serialize(),
                    method:"POST",
                    success: (res) => {
                        console.log(res);
                        page.course = res;
                        page.getLessons();
                    }
                });

            }
            getLessons(){
                $.ajax({
                    url:'{!! route('courses.getLesson') !!}',
                    data:{ course_id:page.course.id },
                    method:"POST",
                    success: (res) => {
                        page.course.lessons = res;
                        $('datalist#lessons').html();
                        for(let r of res){
                            $('datalist#lessons').append(`<option value=${r.title}></option>`)
                        }

                    }
                });
            }
            setLesson(){
                $.ajax({
                    url:'{!! route('lessons.store') !!}',
                    data:{
                        title:$('form#lesson input').val(),
                        course_id:page.course.id
                    },
                    method:"POST",
                    success: (res) => {
                        page.lesson = res;
                    }
                });
            }

            getRows(){
                $.ajax({
                    url:'{!! route('lessons.getRows') !!}',
                    data:{
                       lesson_id: page.lesson.id,
                    },
                    method:"POST",
                    success: (res) => {
                        page.rows = res;
                    }
                });
            }


        }
        const page = new Page();
    </script>
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

    <script>
        $('form#course').on('focusout', ()=>{
            event.preventDefault();
            page.setCourse();
        });
        $('form#lesson').on('focusout', ()=>{
            event.preventDefault();
            page.setLesson();
        });

    </script>




@endsection


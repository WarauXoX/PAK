@extends('layouts.PAKH')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/course_creator.css')}}">

    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Создание курса</title>
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




    <section class="course-constructor">

            <table>
                <tr class="block row" id="row_1">
                    <td  class="left-block"><span class="elem" id="1"><button>text</button></span></td>
                    <td class="right-block"><span class="elem" id="1"><button>text</button></span></td>
                </tr>

                <tr class="block adder" id="adder">
                    <td><span class="elem" id="1">  +  </span></td>
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

        class Page{
            constructor(props) {
                this.course = {};
                this.lesson = {};
                this.rows = [];

                this.buttons = [
                    {
                        url:'{!! route('post.text.store') !!}',
                        method:'POST',
                        name:'text',
                        onclick: function (e){
                            console.log(e.target)
                        },
                        ajax:$.ajax({
                            url:this.url,
                            method:this.method,
                            data:FormData,
                            succes:this.succes,
                        })
                    },

                ];
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
                            $('datalist#lesson').remove();
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
                        page.getRows();
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
                        page.rows = [];
                        page.rows = res;

                        page.updateRows();
                    }
                });
            }
            setRows(){
                $.ajax({
                    url:'{!! route('rows.store') !!}',
                    method:"POST",
                    data:{
                      lesson_id:page.lesson.id,
                    },
                    success:(res) => {
                        adder(res.id);
                        page.rows.push(res);
                    }
                });
            }
            setPost(row_id, side){
                $.ajax({
                    url:'{!! route('post.store') !!}',
                    method:"POST",
                    data:{
                        row_id:row_id,
                        side:side,
                    },
                    success: res => {
                        page.rows[row_id].posts[res.id] = res;
                    }
                });
            }
            getPost(id){
                console.log(`{!! route('post.show') !!}`);
            }


            updateRows(){
                $('.row').remove();
                for(let row of page.rows){
                    console.log(row.id);
                    let posts = page.updatePosts(row.posts);
                    adder(row.id, ...posts);
                }
            }
            updatePosts(posts){
                let right_post;
                let left_post = posts.map( (value)=>{
                    console.log(value);
                    if(value.left_side != 0){
                        right_post = value;
                    }
                    else{
                        return value;
                    }
                })

                return [left_post, right_post];
            }
            setButtons(obj){
                for(let but of buttons){
                    let button =
                    $(obj).html(' ');
                    $(obj).append()
                }
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
        let default_leftlblock = `<td class="left-block"><span></span></td>`
        let default_rightblock = `<td class="right-block"><span></span></td>`
        let default_block = `<tr class="block row" ></tr>`;
    </script>
    <script>
            function setleftBlock(post){                 /*-->  SetLeftBlock  <--*/
            let block = $(default_leftlblock);
            if(!post){
                page.buttons.map( (value)=>{
                    let but = $(`<button id="but_${value.name}">${value.name}</button>`);
                    but.on('click', ()=>{value.onclick()});
                    block.html('<span></span>');
                    block.children().append(but);
                });
                return block
            }
            block.html(" ");
            block.append(post);
            return block;
        }
        function setRightBlock(post){                       /*-->  SetRightBlock  <--*/
            let block = $(default_rightblock);
            if(typeof(post) == "null"){
                page.buttons.map( (value)=>{
                    let but = $(`<button id="but_${value.name}">${value.name}</button>`);
                    but.on('click', ()=>{value.onclick()});
                    block.html('<span></span>');
                    block.children().append(but);
                });
                return block
            }

            block.html(' ');
            block.append(post.id);
            return block;
        }

        function adder(id, leftPost, rightPost){
            let def = $(default_block);
            def.attr('id', `row_${id}`);
            let leftBlock = setleftBlock(leftPost);
            let rightBlock = setRightBlock(rightPost);
                def.append(leftBlock);
                def.append(rightBlock);
            $('tr#adder').before(def);
        }

        $('#adder').click( ()=>{
            page.setRows();
        });
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


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

        <hr width="47.5%">




    <section class="course-constructor">

            <table>

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
                        url:'{!! route('posttext.store') !!}',
                        method:'POST',
                        name:'Текст',
                        onclick(e) {
                            let side = $(e.target).parent().parent()[0].className.split("-")[0];
                            if(side === "left"){side = 0;}
                            else{side = 1;}
                            const row_id = $(e.target).parent().parent().parent()[0].id.split("_")[1];
                            page.getPostText(side, row_id);
                        }
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
            getPostText(side, row_id){
                $.ajax({
                    url:'{!! route('posttext.store') !!}',
                    method:"POST",
                    data:{
                        side:side,
                        row_id:row_id,
                    },
                    success:(postText)=>{
                        if(side === 0){
                            side = 'left';
                        }
                        else{
                            side = "right"
                        }
                        const obj = $(`tr#row_${row_id} > td.${side}-block`)
                        obj.html(" ");
                        obj.append($(postText));
                    }
                })
            }
            setPostText(){
                $.ajax({
                    url:''
                })
            }

            updateRows(){
                $('.row').remove();
                for(let row of page.rows){
                                                                console.log(row.id);
                    let posts = page.updatePosts(row.posts);
                                                                console.log(...posts);
                    adder(row.id, posts);
                }
            }
            updatePosts(posts){
                let right_post;
                let left_post = posts.map( (value)=>{
                    if(value.left_side !== 0){
                        right_post = value;
                    }
                    else{
                        left_post = value;
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
            submitRow(id){
                $.ajax({
                    url:'{!! route('rows.update') !!}',
                    method:"PUT",
                    data:{id:id},
                    succes:(val) => {
                        console.log(val);
                    }
                })
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
        let default_sideBlock = `<td ><span></span></td>`

        let default_block = `<tr class="block row" ></tr>`;
    </script>
    <script>

        /*  -->  Вставка кнопок <--    */
        /*  Берет Блок и вставляет в него кнопки*/
        /*  возврощает модифицированый блок*/

        function pastBut(block){
            block = page.buttons.map( (value)=>{

                let but = $(`<button class="but_${value.name}">${value.name}</button>`);
                but.on("click", (e)=>{ value.onclick(e)  })

                block.html('<span></span>');
                block.children().append(but);

            });
            return block;
        }

        function setPostsForBlock(post, key){
            let block = $(default_sideBlock);

            if(key === 1){
                block.attr('class', 'right-block');
            }
            else{
                block.attr("class","left-block");
            }
            if(typeof(post) == "undefined"){
                pastBut(block);
                return block
            }
            else{
                block.html(" ");
                block.append(post);
            }
            return block;
        }

        function adder(id, posts = [undefined, undefined]){
            let def = $(default_block);
            def.attr('id', `row_${id}`);
                posts.forEach((val, key)=>{
                    def.append(setPostsForBlock(val, key));
                })

            $('tr#adder').before(def);
        }


        $('#adder').click( ()=>{
            page.setRows();
        });
    </script>

    <script>
        $('td.adder').on("click", () => {
            let id = $("tbody > td:last-child").id
            adder(id);
        })

        $('form#course').on('focusout', ()=>{
            event.preventDefault();
            page.setCourse();
        });
        $('form#lesson').on('focusout', ()=>{
            event.preventDefault();
            page.setLesson();
        });

        $('input[type="submit"]:last-child').on("click", ()=>{
            event.preventDefault();
            page.submitLesson();
        })
    </script>




@endsection


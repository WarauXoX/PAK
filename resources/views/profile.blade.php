@extends('layouts.PAKH')

@section('links')
    <link rel="stylesheet" href="{{asset("assets/css/profile.css")}}">
@endsection


@section('content')
    <div class="profile margin">
        <div>

            <img src="{{Storage::url(request()->user()->avatar)}}" alt="avatar">
        </div>
        <div id="right-panel">
            <h2 id="name">{{request()->user()->name}} {{request()->user()->surname}}</h2>
            <div class="info">
                <b>Город:</b><p>{{request()->user()->city}}</p>
                <b>Возраст:</b><p>{{\Carbon\Carbon::parse(request()->user()->birthdate)->diffInYears()}} лет</p>
                <b>Курс:</b><p>{{request()->user()->course}}</p>
                <b>группа:</b><p>{{request()->user()->group->title}}</p>
                <b>Роль:</b><p>{{auth()->user()->role->title}}</p>
            </div>
            <button><b>+</b> добавить курс</button>
        </div>
    </div>
    <div class="courses margin">
        <div class="main-part-of-cousre">
                <div class="course-status gray-text">
                    <b>курс</b>
                    <p>|</p>
                    <p>в процессе</p>
                </div>
                <div id="name-of-course">
                    <p>Информационная безопастность</p>
                    <a href="#" id="sertificate">скачать сертификат</a>
                    <div id="progress"><p>2/88</p></div>
                </div>
        </div>
                <div>
                    <div id="sections">
                        <p>наименование</p>
                        <p>баллы</p>
                    </div>
                    <div id="content-of-course">
                        <p>Урок 1: какая-то херня, какой-то херни</p>
                        <p id="points">100/100</p>
                        <button id="start-lection">смотреть</button>
                    </div>
                    <hr align="center" width="2px" color="#c9c9c9">
                    <div id="content-of-course">
                        <p>Урок 2: какая-то новая херня, какой-то новой херни</p>
                        <p id="points">100/100</p>
                        <button id="start-lection">смотреть</button>
                    </div>
                </div>
        </div>
    </div>
@endsection

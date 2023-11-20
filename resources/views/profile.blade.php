@php use Carbon\Carbon; @endphp
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
                <b>Город:</b>
                <p>{{request()->user()->city}}</p>
                <b>Возраст:</b>
                <p><?php $yearth = Carbon::parse(request()->user()->birthdate)->diffInYears() ?>
                    {{$yearth}}
                </p>
                <b>Роль:</b>
                <p>{{auth()->user()->role->title}}</p>
            </div>
            <a href="{{route("course.create")}}">
                <button><b>+</b> добавить курс</button>
            </a>
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
        <div id="content-of-course">
            <p>Урок: </p>
            <p id="points"></p>
            <a href="">
                <button id="start-lection">смотреть</button>
            </a>
        </div>
        <hr align="center" width="2px" color="#c9c9c9">
    </div>
@endsection

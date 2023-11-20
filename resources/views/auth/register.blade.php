@php use App\Models\Role; @endphp
@extends('layouts.PAKH')

@section('links')

    <link rel="stylesheet" href="{{asset('assets/css/registration.css')}}">

@endsection

@section('content')
    <h2 style="margin: 1.7em 3em;">Регистрация</h2>

    <form method="POST" action="{{ route( 'register' ) }}" class="registration" enctype="multipart/form-data">
        @csrf
        <div>
            <div>
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}"  autocomplete="name" autofocus
                               placeholder="{{ __('Имя') }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surname" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                               name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus
                               placeholder="{{ __('Фамилия') }}">

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="avatar" class="">{{ __('Картинка') }}</label>

                    <div class="col-md-6">
                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror"
                               name="avatar" value="{{ old('avatar') }}" autocomplete="avatar" autofocus
                               placeholder="{{ __('Картинка') }}">

                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <p class="title">Ваш пол</p>
            <div class="sex" method="get">
                <input  type="radio" checked name="gender" id="man" value="man">
                <label for="man" id="manlab">Мужской</label>

                <input  type="radio" name="gender" id="women" value="woman">
                <label for="women" id="womlab">Женский</label>

            </div>

            <div>
                <p class="title">Роль</p>
                <div class="select">
                    <div>
                        <select name="role" id="role">
                                <?php $RolesC = Role::all() ?>
                            @foreach($RolesC as $ind)
                                <option value="{{$ind->id}}">{{$ind->title}}</option>
                            @endforeach
                        </select>

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                @error('role')
                <span>
                    <strong class="error">${{$message}}</strong>
                </span>
                @enderror
            </div>
            <div>
                <p class="title">Ваш город</p>
                <label for="city"></label>
                <div class="select">
                    <select name="city" id="city">
                        <option value="Екатеринбург">Екатеринбург</option>
                        <option value="Самара">Самара</option>
                    </select>
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <p class="title">Дата рождения</p>
                <input  type="date" name="birthdate" id="birthdate">
                @error('birthdate')
                <span>
                    <strong class="error">${{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div style="margin-left:30%;">

            <div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"  autocomplete="email"
                               placeholder="{{ __('Email Address') }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="col-md-6">
                        <input id="phone" type="phone"
                               class="form-control @error('phone') is-invalid @enderror" name="phone"
                               autocomplete="phone" placeholder="{{ __('Phone') }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new-password" placeholder="{{ __('Password') }}">

                        @error('password')
                        <div class="error" >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>
            </div>
                </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>




    <div class="pop-up-bg">
        <div class="pop-up">
            <form action="{{route( "login" )}}" method="POST">
                @csrf
                <h2>Вход в систему ПАК</h2>
                <input name="email" placeholder="Ваш E-mail" />
                <input name="password" placeholder="пароль" />
                <div id="preResPass">
                    <a href="#" id="ResPass">Забыли пороль</a>
                </div>
                <div class="aunth">
                    <button type="submit">Войти</button>
                    <a href="registration.html">Регистрация</a>
                </div>
            </form>
        </div>
        <div>
@endsection

@section('scripts')
    <script src="{{asset('assets/JS/script.js')}}"></script>

    <script>
        $('.pop-up-bg').hide();
        $('#start').click(function(){
            console.log($('#start').check);
        });
    </script>
@endsection

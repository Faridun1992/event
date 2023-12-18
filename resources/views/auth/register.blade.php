@extends('layouts.auth')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>Admin</b>LTE
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Регистрация нового пользователя</p>

                <form method="post" href="{{route('register')}}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Фамилия" name="surname" value="{{old('surname') ?? null}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Имя" name="name" value="{{old('name') ?? null}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="login" placeholder="Логин" value="{{old('login') ?? null}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" placeholder="День рождения" name="birthday" value="{{old('birthday') ?? null}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{route('login')}}" class="text-center">У меня уже есть аккаунт</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
@endsection

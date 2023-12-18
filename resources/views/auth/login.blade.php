@extends("layouts.auth")

@section("content")
    <div class="login-box">
        <div class="login-logo">
            <b>Admin</b>LTE
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="login" value="{{old('login' ?? null)}}" class="form-control " placeholder="Login">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('login') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{route('register')}}" class="text-center">Регистрация</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection

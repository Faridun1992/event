<div class="row mb-3">
    <div class="col">
        <h1 class="fs-4">{{'Пользователь: '. $user->fullName}}</h1>
        @if($user->birthday)
            <h4>Дата рождения {{$user->birthday->format('d.m.Y')}}</h4>
        @endif
    </div>
    <div class="col-auto">
        <a class="card-title btn btn-primary" href="{{ url()->previous() }}">
            <span class="d-none d-sm-inline mx-1 navigate">
                Назад
            </span>
            <svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>
</div>




@extends('master.main')



@section('content')
{{--    <h1 class="text-center">Criar Reunião</h1>--}}
{{--    <h2 class="text-center">Turma {{$turma->group_code}}</h2>--}}

<div class="container">
    @component('components.classes.no-btns-header', ['turma'=>$turma, 'coordenador'=>$coordenador])
    @endcomponent

    @component('components.meetings.choose-meeting-type', [
        'tipos'             =>$tipos,
        'coordenador'       =>$coordenador,
        'turma'             =>$turma
        ])
    @endcomponent
</div>


@endsection

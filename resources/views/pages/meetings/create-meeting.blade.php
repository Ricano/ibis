@extends('master.main')

@section('content')
{{--<h1 class="text-center">Criar Reunião</h1>--}}
{{--<h2 class="text-center mb-4">Turma {{$turma->group_code}}</h2>--}}
{{--<h3  class="text-center m-5"> Nova reunião <strong>{{$tipo->name}}</strong></h3>--}}
@component('components.classes.no-btns-header', ['turma'=>$turma, 'coordenador'=>$coordenador])
@endcomponent
<div class="container">

@if($tipo->id=='2')

    @component('components.meetings.form-create-recuperacao', [
        'formadores'        =>$formadores,
        'coordenador'       =>$coordenador,
        'turma'             =>$turma,
        'alunos'            =>$alunos,
        'formadoresDaTurma' =>$formadoresDaTurma,
        'ufcds'             =>$ufcds,
        'tipo'              =>$tipo
        ])
    @endcomponent
    @else
    @component('components.meetings.form-create-pedagogica', [
        'formadores'        =>$formadores,
        'coordenador'       =>$coordenador,
        'turma'             =>$turma,
        'alunos'            =>$alunos,
        'formadoresDaTurma' =>$formadoresDaTurma,
         'tipo'             =>$tipo,
         'coordnArea'       =>$coordnArea
        ])
    @endcomponent
@endif
</div>


@endsection

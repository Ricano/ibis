@extends('master.main')

@section('content')

    @component('components.feedbacks.header', [
        'turma'          => $turma,
        'reuniao'        => $reuniao,
        'coordenador'    =>$coordenador,
        'aluno'          =>$aluno,


])
    @endcomponent

    @if(isset( $aluno))
        @component('components.feedbacks.body-student', [
            'turma'                 => $turma,
            'reuniao'               => $reuniao,
            'aluno'                 => $aluno,
            'formadoresNaReuniao'   => $formadoresNaReuniao,
            'feedbacks'              => $feedbacks
    ])
        @endcomponent
    @else
        @component('components.feedbacks.body-teacher', [
            'turma'             => $turma,
            'reuniao'           => $reuniao,
            'formador'          => $formador,
            'alunosNaReuniao'   => $alunosNaReuniao
])
        @endcomponent
    @endif

@endsection


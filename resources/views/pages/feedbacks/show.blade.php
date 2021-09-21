@extends('master.main')

@section('content')

    @component('components.feedbacks.show', [
            'aluno'             => $aluno,
            'formador'          => $formador,
            'alunoReuniaoId'    => $alunoReuniaoId,
            'formadorReuniaoId' => $formadorReuniaoId,
            'turma'             => $turma,
            'reuniao'           => $reuniao,
])
    @endcomponent



@endsection

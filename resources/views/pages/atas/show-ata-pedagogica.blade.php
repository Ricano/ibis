@extends('master.main')

@section('content')
    @component('components.atas.show-ata-pedagogica', [
            'reuniao' => $reuniao,
            'turma' => $turma,
            'ata' => $ata,
            'feedbacks' => $feedbacks,
            'alunosDaReuniao' => $alunosDaReuniao,
            'formadoresDaReuniao' => $formadoresDaReuniao
    ])
    @endcomponent
@endsection

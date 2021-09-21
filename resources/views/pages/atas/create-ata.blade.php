@extends('master.main')

@section('content')

{{--<div class="container">--}}


    @component('components.meetings.header', [
         'reuniao'       => $reuniao,
         'turma'         => $turma,
         'coordenador'   => $coordenador])
    @endcomponent


    @if($reuniao->meeting_type_id == 2)

    @component('components.atas.create-ata-recuperacao', [

            'reuniao'    => $reuniao,
            'ata'        => $ata,
            'turma'      => $turma,
            'anoReuniao' => $anoReuniao,
            'diaReuniao' => $diaReuniao,
            'mesReuniao' => $mesReuniao,
            'mesTurma'   => $mesTurma,
            'anoTurma'   => $anoTurma,
            'coordenador'=>$coordenador,
             'alunosDaReuniao'       => $alunosDaReuniao,
            'formadoresDaReuniao'   => $formadoresDaReuniao


        ])
    @endcomponent
@else
    @component('components.atas.create-ata-pedagogica', [
            'reuniao'               => $reuniao,
            'ata'                   => $ata,
            'turma'                 => $turma,
            'alunosDaReuniao'       => $alunosDaReuniao,
            'formadoresDaReuniao'   => $formadoresDaReuniao,
            'feedbacks'             => $feedbacks
    ])
    @endcomponent
@endif
{{--</div>--}}

@endsection

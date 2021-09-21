@extends('master.main')

@section('content')


<div class="container">
    @component('components.meetings.header', [
          'reuniao'       =>$reuniao,
          'turma'         =>$turma,
          'coordenador'   =>$coordenador])
    @endcomponent

    @if($reuniao->meeting_type_id == 1)

        @component('components.meetings.pedagogica', [
            'reuniao'               => $reuniao,
            'turma'                 => $turma,
            'coordenador'           => $coordenador,
            'alunosDaReuniao'       => $alunosDaReuniao,
            'formadoresDaReuniao'   => $formadoresDaReuniao,
            'totais'                => $totais,
            'totalPreenchidos'      => $totalPreenchidos,
            'ata'                   => $ata,
            ])
        @endcomponent

    @else
        @component('components.meetings.recuperacao', [
            'reuniao'               => $reuniao,
            'turma'                 => $turma,
            'coordenador'           => $coordenador,
            'alunosDaReuniao'       => $alunosDaReuniao,
            'formadoresDaReuniao'   => $formadoresDaReuniao,
            'ata'                   =>$ata
                ])
        @endcomponent
    @endif
</div>

@endsection

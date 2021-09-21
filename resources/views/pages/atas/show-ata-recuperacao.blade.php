@extends('master.main')

@section('content')
    <div class="container">

    @component('components.atas.show-ata-recuperacao', [
        'reuniao'     => $reuniao,
        'turma'       => $turma,
        'coordenador' => $coordenador,
        'texto'       => $texto
    ])
    @endcomponent
    </div>

@endsection

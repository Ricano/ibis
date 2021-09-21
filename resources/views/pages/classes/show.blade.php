@extends('master.main')

@section('content')
    <div class="container">
        <div class="card p-3 justify-content-center">
        @component('components.classes.header', [
            'coordenador'   =>$coordenador,
            'nome'          =>$nome,
            'curso'         =>$curso,
            'tipo'          =>$tipo,
            'centro'        =>$centro,
            'turma'         =>$turma,
        ])
        @endcomponent

        @component('components.classes.show', [
            'turma'         =>$turma,
            'formadores'    =>$formadores,
            'alunos'        =>$alunos,
            'reunioes'      =>$reunioes

        ])
        @endcomponent
        </div>
    </div>
@endsection

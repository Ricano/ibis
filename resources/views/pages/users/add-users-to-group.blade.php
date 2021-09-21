@extends('master.main')

@section('content')
    @component('components.users.add-users-to-group',['idDaTurma'=>$idDaTurma, 'formadoresDaTurma'=>$formadoresDaTurma,'formadoresForaDaTurma'=>$formadoresForaDaTurma])
    @endcomponent
@endsection

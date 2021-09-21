@extends('master.main')

@section('content')
    @component('components.students.add-students', ['turma'=>$turma])
    @endcomponent
@endsection

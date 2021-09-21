@extends('master.main')

@section('content')
    @component('components.students.form-students', ['group'=>$group])
    @endcomponent
@endsection

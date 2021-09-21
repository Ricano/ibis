@extends('master.main')

@section('content')
    @component('components.students.form-students', ['student'=>$student, 'group'=>$group])
    @endcomponent
@endsection

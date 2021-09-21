@extends('master.main')

@section('content')
    @component('components.users.add-user',['coordenadores'=>$coordenadores, 'formadores'=>$formadores])
    @endcomponent
@endsection

@extends('master.main')

@section('content')
    {{--        <div class="card">--}}
    @component('components.list-groups', [
'groups'=>$groups,
'users'=>$users,
'teacher'=>$teacher,
'contagemReunioesAbertas' => $contagemReunioesAbertas
])
    @endcomponent
    {{--        </div>--}}
@endsection

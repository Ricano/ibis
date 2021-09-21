@extends('master.main')

@section('content')

    @component('components.users.show', [
        'user'  => $user,
        'group' => $group
    ])
    @endcomponent

@endsection

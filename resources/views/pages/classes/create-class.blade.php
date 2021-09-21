@extends('master.main')

@section('content')

{{--@component('components.page-header.header')--}}
{{--@endcomponent--}}

    <div class="container createClass">
        <div class="row">
            <div class="card-body bg-white justify-content-center p-5 row">
                <div class="row justify-content-between">
                    <div>
                        <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                    </div>
                        <h4 class="meetingTitle">Criar Nova Turma</h4>
                </div>
            @component('components.classes.form-create', [
                    'courses'       =>$courses,
                    'users'         =>$users,
                    'group_codes'   =>$group_codes
                    ])
                @endcomponent
            </div>
        </div>
    </div>

@endsection

@extends('master.main')

@section('content')



{{--                <div class="buttons-add-user">--}}
{{--                    <a href="@if(Request::is('ibis/users/add-teacher')) --}}
{{--                                {{url('ibis/users/add-teacher/register')}} --}}
{{--                             @elseif(Request::is('ibis/users/add-coordinator')) --}}
{{--                                {{url('ibis/users/add-coordinator/register')}} --}}
{{--                            @endif">--}}
{{--                        <button class="btn btn-danger" style="border: 2px solid #444f6f33;">--}}
{{--                            Adicionar--}}
{{--                        </button>--}}
{{--                    </a>--}}
{{--                </div>--}}

@component('components.page-header.header')
@endcomponent

<div class="container">
    <div class="buttons-add-user">
        <a href="{{Request::is('ibis/users/add-teacher') ? url('ibis/users/add-teacher/register')
                                                         : url('ibis/users/add-coordinator/register') }}">
            <button class="btn btn-success">
                Adicionar
            </button>
        </a>
    </div>

    @component('components.lists.user-list',['coordenadores'=>$coordenadores, 'formadores'=>$formadores])
    @endcomponent
</div>
@endsection

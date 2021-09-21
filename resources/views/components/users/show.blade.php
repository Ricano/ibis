@extends('master.main')

@section('content')

    <div class="container createClass">
        <div class="row">
            <div class="card-body bg-white justify-content-center p-5 row">
                <div class="row justify-content-between">
                    <div>
                        <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                    </div>
                    <h4 class="meetingTitle">{{$user->name}}</h4>
                </div>
                <div class="u-info show_user">
                    <input hidden class="serdelete_val_id" value="{{$user->id}}"/>
                    <ul class="u-info">Nome
                        <li class="u-info-data">
                            {{$user->name}}
                        </li>
                    </ul>
                    <ul class="u-info">Email
                        <li class="u-info-data">
                            {{$user->email}}
                        </li>
                    </ul>
                    <ul class="u-info">Telemovel
                        <li class="u-info-data">
                            {{$user->telephone}}
                        </li>
                    </ul>
                    <ul class="u-info">Cargo
                        <li class="u-info-data roleId" value="{{$user->role_id}}">
                            {{$user->role->name}}
                        </li>
                    </ul>
                    <ul class="u-info">Area
                        <li class="u-info-data">
                            {{$user->area->name}}
                        </li>
                    </ul>


                    {{--        <label for="name">Nome</label>--}}
                    {{--        <input type="text" name="name" value="{{$user->name}}">--}}

                    {{--        <label for="email">Email</label>--}}
                    {{--        <input type="text" name="email" value="{{$user->email}}">--}}


                    {{--        <label for="telephone">Telemóvel</label>--}}
                    {{--        <input type="text" name="telephone" value="{{$user->telephone}}">--}}


                    {{--        <label for="role">Cargo</label>--}}
                    {{--        <input type="text" name="role" value="{{$user->role->name}}">--}}


                    {{--        <label for="area">Area</label>--}}
                    {{--        <input type="text" name="area" value="{{$user->area->name}}">--}}


                    <div class="u-info-buttons" >
                        <a class="btn btn-primary" href="{{url('ibis/users/' . $user->id . '/edit')}}">Atualizar</a>
                        @if(Request::is('ibis/users/'.$user->id))
                        <form action="{{url('ibis/users/' . $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger servideletebtn">Eliminar</button>
                        </form>
                        @elseif(Request::is('ibis/'.$group->id.'/users/'.$user->id.'/info'))
                            <form action="{{url('ibis/'.$group->id.'/users/'.$user->id.'/delete')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover desta turma</button>
                            </form>
                        @endif
                    </div>
                </div>
@endsection

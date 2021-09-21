@extends('master.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {{--
                        Route to Add a new Teacher
                    --}}
                    @if(Request::is('ibis/users/add-teacher/register'))
                        <div class="card-header">{{ __('Adicionar Formador') }}</div>

                    {{--
                        Route to Add a new Coordinator
                    --}}
                    @elseif(Request::is('ibis/users/add-coordinator/register'))
                        <div class="card-header">{{ __('Adicionar Coordenador de Turma') }}</div>

                    {{--
                        Route to Edit profile
                    --}}
                    @elseif(Auth::check() && Request::is('ibis/users/' . $user->id . '/edit'))
                        <div class="card-header">{{ __($user->name) }}</div>

                    {{--
                        Register default route
                    --}}
                    @else
                        <div class="card-header">{{ __('Criar Registo') }}</div>
                    @endif


                    <div class="card-body">

                        {{--
                            When we want to add a new teacher or coordinator
                        --}}
                        @if(Request::is('ibis/users/add-teacher/register'))
                            <form method="POST" action="{{ url('ibis/users/teacher') }}">
                        @elseif(Request::is('ibis/users/add-coordinator/register'))
                            <form method="POST" action="{{ url('ibis/users') }}">

                        {{--
                            Auth::check() checks if there is a user logged in,
                            because otherwise it wouldn't recognize the $user variable
                            when making a fresh register
                            This way, when making a fresh new register, it won't bother with
                            the $user variable
                        --}}
                        @elseif(Auth::check() && Request::is('ibis/users/' . $user->id . '/edit'))
                        <form method="POST" action="{{ url('ibis/users/' . $user->id) }}">
                            @method('PUT')

                            {{--
                                When just making a regular new registry
                            --}}
                            @else
                            <form method="POST" action="{{ route('register') }}">
                        @endif
                            @csrf

                            {{--
                                Form to edit the profile
                            --}}
                            @if(Auth::check() && Request::is('ibis/users/' . $user->id . '/edit'))
                                <div class="form-group row">
                                    <input hidden class="serupdate_val_id" value="{{$user->id}}">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{ $user->name }}"
                                               autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ $user->email }}"
                                               autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Hidden taxpayer value --}}
                                <div class="col-md-6">
                                    <input hidden id="taxpayer" type="text" class="form-control
                                           @error('taxpayer') is-invalid @enderror" name="taxpayer"
                                           value="{{ $user->taxpayer }}"
                                           autocomplete="taxpayer">

                                    @error('taxpayer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="telephone"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Telemóvel') }}</label>

                                    <div class="col-md-6">
                                        <input id="telephone" type="text" class="form-control
                                    @error('telephone') is-invalid @enderror" name="telephone"
                                       value="{{ $user->telephone }}"
                                       autocomplete="telephone">

                                        @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                {{--    Hidden Select to keep the 'role_id' value   --}}
                                <select hidden class="form-control" @error('role_id') is-invalid
                                        @enderror name="role_id" id="role_id">
                                    <option class="UpdRoleId" value="{{$user->role_id}}">{{$user->role->name}}</option>
                                    @foreach($roles as $role)
                                        @if($role->id != $user->role_id)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary AtualizarBtn">
                                            {{ __('Atualizar') }}
                                        </button>
                                    </div>
                                </div>

                            {{--
                                Form to Create a new Register
                            --}}
                            @else

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{ old('name') }}"
                                               autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email') }}"
                                               autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                    @if(!Request::is('ibis/users/add-teacher/register'))

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   autocomplete="new-password"
                                                   value="{{ old('password') }}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password"
                                                   class="form-control"
                                                   name="password_confirmation"
                                                   autocomplete="new-password"
                                                   value="{{ old('password_confirmation') }}">
                                        </div>
                                    </div>
                                @endif

                            <div class="form-group row">
                                <label for="taxpayer" class="col-md-4 col-form-label text-md-right">{{ __('Contribuinte') }}</label>
                                    <div class="col-md-6">
                                        <input id="taxpayer" type="text" class="form-control
                                        @error('taxpayer') is-invalid @enderror" name="taxpayer"
                                           value="{{ old('taxpayer') }}"
                                           autocomplete="taxpayer">

                                    @error('taxpayer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Telemóvel') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control
                                     @error('telephone') is-invalid @enderror" name="telephone"
                                           value="{{ old('telephone') }}"
                                           autocomplete="telephone">

                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    @if(Request::is('ibis/users/add-teacher/register') || Request::is('ibis/users/add-coordinator/register'))
                                        hidden
                                    @endif
                                    for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                                <div class="col-md-6">

                                    @if(Request::is('ibis/users/add-teacher/register'))

                                        <select hidden
                                                class="form-control @error('role_id') is-invalid @enderror"
                                                name="role_id" id="role_id">
                                            @foreach($roles as $role)
                                                @if($role->id === 3)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    @elseif(Request::is('ibis/users/add-coordinator/register'))

                                        <select hidden
                                                class="form-control @error('role_id') is-invalid @enderror"
                                                name="role_id" id="role_id">
                                            @foreach($roles as $role)
                                                @if($role->id === 2)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    @else

                                        <select
                                            class="form-control @error('role_id') is-invalid @enderror"
                                            name="role_id" id="role_id">
                                            <option disabled selected>Selecionar Cargo</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label
                                    for="area_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                                <div class="col-md-6">
                                    <select
                                        class="form-control @error('area_id') is-invalid @enderror"
                                        name="area_id" id="area_id">
                                        <option disabled selected>Selecionar Area</option>
                                        @foreach($areas as $area)
                                            <option
                                                value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

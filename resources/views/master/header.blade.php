<nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background-color: #222">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" id="ibis-logo" href="{{url('ibis')}}">
            <img src="{{asset('/images/Ibis_logo-Recovered.png')}}" style="width: 80px; margin-left: 5px">
        </a>

        <div class="main-nav-links" id="navbar-header" style="display: flex; justify-content: flex-start; align-items: flex-start; text-decoration: none;">
            @if(Auth::check())
                <a class="nav-item nav-link nv active" @if(Request::is('ibis')) style="color: var(--blue)" @endif href="{{url('ibis')}}">Turmas</a>

                @if(Auth::user()->role_id <= 2)
                    <a class="nav-item nav-link nv" @if(Request::is('ibis/create-class')) style="color: var(--blue)" @endif  href="{{url('ibis/create-class')}}">Criar Turma</a>
                    <a class="nav-item nav-link nv" @if(Request::is('ibis/users/add-teacher')) style="color: var(--blue)" @endif  href="{{url('ibis/users/add-teacher')}}">Formadores</a>
                @endif

                @if(Auth::user()->role_id === 1)
                    <a class="nav-item nav-link" @if(Request::is('ibis/users/add-coordinator'))style="color: var(--blue)" @endif href="{{url('ibis/users/add-coordinator')}}">Coordenadores</a>
                @endif

            @endif
        </div>
        <div style="position: sticky; left: 90vw">
            <ul class="navbar-nav mr-auto">

                @guest
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('login')}}">{{__('Login')}}</a>--}}
{{--                    </li>--}}

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>--}}
{{--                        </li>--}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="font-size: 14pt" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('ibis/users/' . Auth::user()->id . '/edit') }}">
                                {{ __('Editar Perfil') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>



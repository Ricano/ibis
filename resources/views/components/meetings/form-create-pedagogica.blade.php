<div class="row row-cols-2">

    {{--CRIAÇÃO DA REUNIÃO--}}

    {{--    <div id="create-meeting-pedagogica-r" class="col-12">--}}
    {{--        <div class="bg-secondary p-4" style="border-radius: 10px; margin:0 10em; min-width: 400px">--}}
    {{--            <h1 class="text-center">Formadores</h1>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col tabela-dragNdrop">--}}
    {{--                    <h4>Fora da reunião</h4>--}}
    {{--                    <ul onmouseleave="meterFormadoresNaReuniaoPedagogica()" id="sortable1" class="sortable_list1 connectedSortable1 bg-warning p-2">--}}

    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--                <p class="col-sm text-white text-center align-items-center justify-content-center flex-sm-wrap" style="display: flex; font-size: 1rem">--}}
    {{--                    Retire os formadores que <br> não pretende na reunião.--}}
    {{--                </p>--}}
    {{--                <div class="col tabela-dragNdrop">--}}
    {{--                    <h4>Para a reunião</h4>--}}
    {{--                    <ul onmouseleave="meterFormadoresNaReuniaoPedagogica()" id="sortable2"--}}
    {{--                        name="adicionarFormadores" class="bg-success sortable_list1 connectedSortable1 p-2">--}}
    {{--                        <li id="coordenador" class="ui-state-default naoMexe" value="{{$coordenador->id}}"><strong>{{$coordenador->name}}</strong></li>--}}
    {{--                                           FOREACH PARA APRESENTAR TODOS OS FORMADORES--}}
    {{--                                           DA TURMA MENOS O QUE JÁ É COORDENADOR DA TURMA--}}
    {{--                        @foreach($formadoresDaTurma as $formador)--}}
    {{--                            @if($formador->id !== $turma->user_id)--}}
    {{--                                <li class="ui-state-default " value="{{$formador->id}}">{{$formador->name}}</li>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}

    {{--                                           FOREACH PARA APRESENTAR TODOS OS COORDENADORES DE ÁREA--}}
    {{--                                           MENOS O QUE ESTÁ DESTACADO COMO COORDENADOR DA TURMA (CASO SEJA)--}}
    {{--                        @foreach($coordnArea as $c)--}}
    {{--                            @if($c->id !== $turma->user_id)--}}
    {{--                                <li class="ui-state-default " value="{{$c->id}}">{{$c->name}}</li>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--                </div>--}}

    {{--            <hr style="border: 1px solid lightgray">--}}

    {{--                <div class="bg-info p-2" style="margin: 0px 10px">--}}
    {{--            <h1 class="text-center">Alunos</h1>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col tabela-dragNdrop">--}}
    {{--                    <h4>Fora da Reunião</h4>--}}
    {{--                    <ul onmouseleave="meterAlunosNaReuniaoPedagogica()" id="sortable3" class="sortable_list connectedSortable bg-warning p-2">--}}

    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--                <p class="col-sm text-white text-center align-items-center justify-content-center flex-sm-wrap" style="display: flex; font-size: 1rem">--}}
    {{--                    Retire os alunos que <br> não pretende na reunião.--}}
    {{--                </p>--}}
    {{--                <div class="col tabela-dragNdrop">--}}
    {{--                    <h4>Para a reunião</h4>--}}
    {{--                    <ul onmouseleave="meterAlunosNaReuniaoPedagogica()" id="sortable4"--}}
    {{--                        name="adicionarAlunos" class="bg-success sortable_list connectedSortable p-2">--}}
    {{--                        @foreach($alunos as $aluno)--}}
    {{--                            <li class="ui-state-default" value="{{$aluno->id}}">{{$aluno->name}}</li>--}}
    {{--                        @endforeach--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--                </div>--}}
    {{--            <div class="container justify-content-center mt-4">--}}
    {{--                <div style="width: 33%" class="form-group">--}}
    {{--                    <h4>Data de Início</h4>--}}
    {{--                    @browser('isFirefox')--}}
    {{--                        <input onchange="meterInicioNaReuniaoPedagogica()" id="inicio-escolha-pedagogica-r" name="inicio"--}}
    {{--                               type="date" class="form-control @error('inicio') is-invalid @enderror"/>--}}
    {{--                    @else--}}
    {{--                        <input onchange="meterInicioNaReuniaoPedagogica()" id="inicio-escolha-pedagogica-r" name="inicio"--}}
    {{--                               type="datetime-local" class="form-control @error('inicio') is-invalid @enderror"/>--}}
    {{--                    @endbrowser--}}
    {{--                    <span class="input-group-addon">--}}
    {{--                        <span class="glyphicon glyphicon-calendar"></span>--}}
    {{--                    </span>--}}
    {{--                    @error('inicio')--}}
    {{--                    <span class="text-danger bg-white">--}}
    {{--                        <strong>{{$message}}</strong>--}}
    {{--                    </span>--}}
    {{--                    @enderror--}}
    {{--                </div>--}}
    {{--                <div style="width: 33%" class="form-group">--}}
    {{--                    <h4>Data de Fim</h4>--}}
    {{--                    @browser('isFirefox')--}}
    {{--                        <input onchange="meterFimNaReuniaoPedagogica()" id="fim-escolha-pedagogica-r" name="fim"--}}
    {{--                               type='date' class="form-control @error('fim') is-invalid @enderror"/>--}}
    {{--                    @else--}}
    {{--                        <input onchange="meterFimNaReuniaoPedagogica()" id="fim-escolha-pedagogica-r" name="fim"--}}
    {{--                               type='datetime-local' class="form-control @error('fim') is-invalid @enderror"/>--}}
    {{--                    @endbrowser--}}
    {{--                    <span class="input-group-addon">--}}
    {{--                        <span class="glyphicon glyphicon-calendar"></span>--}}
    {{--                    </span>--}}
    {{--                    @error('fim')--}}
    {{--                    <span class="text-danger bg-white">--}}
    {{--                         <strong>{{$message}}</strong>--}}
    {{--                    </span>--}}
    {{--                    @enderror--}}
    {{--                </div>--}}
    {{--                <button class="btn btn-dark w-25" type="submit" form="form-nova-reuniao-pedagogica-r">Confirmar</button>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}







    <div class="container createClass">
        <div class="row">
            <div class="card-body bg-white justify-content-center p-5 row">
                <div class="row justify-content-between">
                    <div>
                        <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                    </div>
                    <h4 class="meetingTitle">Nova Reunião Pedagógica</h4>
                </div>


                <div id="create-meeting-pedagogica-r">
                    {{--                        <div class="bg-secondary p-4" style="border-radius: 10px; margin:0 10em; min-width: 400px">--}}
                    <h2 class="text-center mt-4">Formadores</h2>
                    <div class="formadores">
                        <div class="row">

                            <div class="f-box">
                                <h5>Fora da Reunião:</h5>
                                <ul onmouseleave="meterFormadoresNaReuniaoPedagogica()" id="sortable1" class="formadores-turma-sortable1 sortable_list1 connectedSortable1 p-2">
                                </ul>
                                {{--                                                                        <ul id="formadores-turma-sortable2" name="adicionarFormadoresTurma"--}}
                                {{--                                                                            class="sortable_list connectedSortable p-2">--}}
                                {{--                                                                            @if(Auth::user()->role_id === 2)--}}
                                {{--                                                                                <li disabled class="ui-state-default" value="{{Auth::user()->id}}">{{Auth::user()->name}}</li>--}}
                                {{--                                                                            @endif--}}
                                {{--                                                                                                <li disabled class="ui-state-default" value="{{Auth::user()->id}}">{{Auth::user()->name}}</li>--}}
                                {{--                                                                        </ul>--}}
                            </div>


                            {{--                                                                <div class="tabela-dragNdrop">--}}
                            {{--                                                                    <h4>Fora da reunião</h4>--}}
                            {{--                                                                    <ul onmouseleave="meterFormadoresNaReuniaoPedagogica()" id="sortable1" class="sortable_list1 connectedSortable1 bg-warning p-2">--}}
                            {{--                                                                    </ul>--}}
                            {{--                                                                </div>--}}
                            {{--                                --}}{{--                                <p class="col-sm text-white text-center align-items-center justify-content-center flex-sm-wrap" style="display: flex; font-size: 1rem">--}}
                            {{--                                --}}{{--                                    Retire os formadores que <br> não pretende na reunião.--}}
                            {{--                                --}}{{--                                </p>--}}


                            <div class="f-box">
                                <h5>Para a Reunião:</h5>
                                <ul onmouseleave="meterFormadoresNaReuniaoPedagogica()" id="sortable2" class="formadores-turma-sortable1 sortable_list1 connectedSortable1 p-2">
                                    <li id="coordenador" class="ui-state-default naoMexe bg-success text-white" value="{{$coordenador->id}}"><strong>{{$coordenador->name}}</strong></li>

                                    @foreach($formadoresDaTurma as $formador)
                                        @if($formador->id !== $turma->user_id)
                                            <li class="ui-state-default bg-light" value="{{$formador->id}}">{{$formador->name}}</li>
                                        @endif
                                    @endforeach
                                    @foreach($coordnArea as $c)
                                        @if($c->id !== $turma->user_id)
                                            <li class="ui-state-default bg-light" value="{{$c->id}}">{{$c->name}}</li>
                                @endif
                                @endforeach

                                {{--                                        --}}{{--                                        @foreach($users as $user)--}}
                                {{--                                        --}}{{--                                            @if(Auth::user()->role_id === 2 && $user->id !== Auth::user()->id || Auth::user()->role_id === 1)--}}
                                {{--                                        --}}{{--                                                <li class="ui-state-default" value="{{$user->id}}">{{$user->name}}</li>--}}
                                {{--                                        --}}{{--                                            @endif--}}
                                {{--                                        --}}{{--                                        @endforeach--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}



                                {{--                                --}}{{--                                <div class="tabela-dragNdrop">--}}
                                {{--                                --}}{{--                                    <h4>Para a reunião</h4>--}}
                                {{--                                --}}{{--                                    <ul onmouseleave="meterFormadoresNaReuniaoPedagogica()" id="sortable2"--}}
                                {{--                                --}}{{--                                        name="adicionarFormadores" class="bg-success sortable_list connectedSortable p-2">--}}
                                {{--                                --}}{{--                                        <li id="coordenador" class="ui-state-default naoMexe" value="{{$coordenador->id}}"><strong>{{$coordenador->name}}</strong></li>--}}
                                {{--                                --}}{{--                                        FOREACH PARA APRESENTAR TODOS OS FORMADORES--}}
                                {{--                                --}}{{--                                        DA TURMA MENOS O QUE JÁ É COORDENADOR DA TURMA--}}
                                {{--                                --}}{{--                                        @foreach($formadoresDaTurma as $formador)--}}
                                {{--                                --}}{{--                                            @if($formador->id !== $turma->user_id)--}}
                                {{--                                --}}{{--                                                <li class="ui-state-default " value="{{$formador->id}}">{{$formador->name}}</li>--}}
                                {{--                                --}}{{--                                            @endif--}}
                                {{--                                --}}{{--                                        @endforeach--}}

                                {{--                                --}}{{--                                        FOREACH PARA APRESENTAR TODOS OS COORDENADORES DE ÁREA--}}
                                {{--                                --}}{{--                                        MENOS O QUE ESTÁ DESTACADO COMO COORDENADOR DA TURMA (CASO SEJA)--}}
                                {{--                                --}}{{--                                        @foreach($coordnArea as $c)--}}
                                {{--                                --}}{{--                                            @if($c->id !== $turma->user_id)--}}
                                {{--                                --}}{{--                                                <li class="ui-state-default " value="{{$c->id}}">{{$c->name}}</li>--}}
                                {{--                                --}}{{--                                            @endif--}}
                                {{--                                --}}{{--                                        @endforeach--}}
                                {{--                                --}}{{--                                    </ul>--}}
                                {{--                                --}}{{--                                </div>--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}

                            </div>
                        </div>

                        <hr style="border: 1px solid lightgray; margin: 50px auto 30px">

                        <div class="alunos">
                            <h2 class="text-center">Alunos</h2>
                            <div class="row">
                                <div class="f-box">
                                    <h5>Fora da Reunião</h5>
                                    <ul onmouseleave="meterAlunosNaReuniaoPedagogica()" id="sortable3" class="formadores-turma-sortable1 sortable_list connectedSortable p-2">

                                    </ul>
                                </div>
                                {{--                                    <p class="col-sm text-white text-center align-items-center justify-content-center flex-sm-wrap" style="display: flex; font-size: 1rem">--}}
                                {{--                                        Retire os alunos que <br> não pretende na reunião.--}}
                                {{--                                    </p>--}}
                                <div class="f-box">
                                    <h5>Para a reunião</h5>
                                    <ul onmouseleave="meterAlunosNaReuniaoPedagogica()" id="sortable4"
                                        name="adicionarAlunos" class="formadores-turma-sortable1 sortable_list connectedSortable p-2">
                                        @foreach($alunos as $aluno)
                                            <li class="ui-state-default" value="{{$aluno->id}}">{{$aluno->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container justify-content-center mt-4">
                        <div class="form-group w-50">
                            <h4>Data de Início</h4>
                            @browser('isFirefox')
                            <input onchange="meterInicioNaReuniaoPedagogica()" id="inicio-escolha-pedagogica-r" name="inicio"
                                   type="date" class="form-control @error('inicio') is-invalid @enderror"/>
                            @else
                                <input onchange="meterInicioNaReuniaoPedagogica()" id="inicio-escolha-pedagogica-r" name="inicio"
                                       type="datetime-local" class="form-control @error('inicio') is-invalid @enderror"/>
                                @endbrowser
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                @error('inicio')
                                <span class="text-danger bg-white">
                        <strong>{{$message}}</strong>
                    </span>
                                @enderror
                        </div>
                        <div class="form-group w-50">
                            <h4>Data de Fim</h4>
                            @browser('isFirefox')
                            <input onchange="meterFimNaReuniaoPedagogica()" id="fim-escolha-pedagogica-r" name="fim"
                                   type='date' class="form-control @error('fim') is-invalid @enderror"/>
                            @else
                                <input onchange="meterFimNaReuniaoPedagogica()" id="fim-escolha-pedagogica-r" name="fim"
                                       type='datetime-local' class="form-control @error('fim') is-invalid @enderror"/>
                                @endbrowser
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                @error('fim')
                                <span class="text-danger bg-white">
                                         <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div id="botao-criar-reuniao-pedagogica-r" >
                            <a href="{{url('ibis/'.$turma->id.'/choose-meeting')}}">
                                <button class="btn btn-dark" style="width: 150px">
                                    Voltar
                                </button>
                            </a>
                            <button style="width: 150px" class="btn btn-primary" type="submit" form="form-nova-reuniao-pedagogica-r">Confirmar</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--DETALHES DA REUNIÃO--}}

<div hidden id="resumo-reuniao-pedagocia-r" class="col-4 flex-md-wrap">
    <div class="col-4 container bg-danger p-3 text-white position-fixed detalhesReuniao">
        <div class="bg-dark p-2 m-0" style="display:flex;
                                                flex-direction:column;
                                                align-items:center">
            <h5 class="text-center p-0">
                Nova Reunião:
                <hr style="border: 1px solid grey">
            </h5>
            <div class="p-1"
                 style="display:flex;
                            flex-direction: column;
                            align-items: center;
                            justify-content: space-around;
                            width: 100%">
                <div class="p-0">
                    Formadores:
                </div>
                <div id="formadores-resumo-pedagogica-r" class="p-0"
                     style="font-size: 0.7rem; height: 70px; overflow: auto">
                </div>
            </div>
            <div class="p-1"
                 style="display:flex; flex-direction: column; align-items: center;
                        justify-content: space-around; width: 100%">
                <div class="p-0">
                    Alunos:
                </div>
                <div id="alunos-resumo-pedagogica-r" class="p-0"
                     style="display:flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: space-around;
                                width: 100%;
                                height: 70px">
                </div>
            </div>

            <div class="p-1"
                 style="display:flex;
                            flex-direction: column;
                            align-items: center;
                            justify-content: space-around;
                            width: 100%">
                <div class="p-0">
                    Data de Início:
                </div>
                <div id="inicio-resumo-pedagogica-r" class="bg-dark text-white">
                </div>
            </div>
            <div class="p-1"
                 style="display:flex;
                     flex-direction: column;
                     align-items: center;
                     justify-content: space-around;
                     width: 100%">
                <div class="p-0">
                    Data de Fim:
                </div>
                <div id="fim-resumo-pedagogica-r" class="bg-dark text-white">
                </div>
            </div>
        </div>
    </div>
</div>
<form hidden id="form-nova-reuniao-pedagogica-r" method="POST" action="{{ url('ibis/'.$turma->id.'/create-meeting') }}" onsubmit="mostrarLoadingR('botao-criar-reuniao-pedagogica-r')">
    @csrf
    turma
    <input type="text" id="turma-formulario-pedagogica-r" name="turma" value="{{$turma->id}}">
    tipo
    <input type="text" id="tipo-formulario-pedagogica-r" name="tipo" value="{{$tipo->id}}">
    formadores
    <select multiple type="text" id="formadores-formulario-pedagogica-r" name="formadores[]">
        <option selected value="{{$coordenador->id}}">{{$coordenador->name}} </option>
    </select>
    alunos
    <select multiple type="text" id="alunos-formulario-pedagogica-r" name="alunos[]">
    </select>

    início
    <input type="text" id="inicio-formulario-pedagogica-r" name="inicio">
    fim
    <input type="text" id="fim-formulario-pedagogica-r" name="fim">
</form>

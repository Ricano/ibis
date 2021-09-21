    {{--CREATE FORM--}}
    <form method="POST" id="form1" class="form-check" action="{{ url('ibis') }}">
        @csrf
        {{--Cursos--}}
        <div class="form-group">
            <label for="courses" style="font-size: 20pt">Cursos</label>
            <select name="courses" id="courses" class="form-control @error('courses') is-invalid @enderror" >
                <option disabled selected >Selecione o Curso</option>
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            @error('courses')
                <span>{{ $message }}</span>
            @enderror
        </div>
        {{--Turmas--}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="groups" style="font-size: 20pt">Turmas</label>
                <select name="group_type_id" id="groups" class="form-control @error('group_type_id') is-invalid @enderror">
                    <option disabled selected >Selecione a Turma</option>
                </select>
                @error('group_type_id')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="month" style="font-size: 20pt">Mês</label>
                <select name="month" id="month" class="form-control @error('month') is-invalid @enderror">
                    <option disabled selected >Mês</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select>
                @error('month')
                    <span>{{ $message  }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="year" style="font-size: 20pt">Ano</label>
                <select name="year" id=year" class="form-control @error('month') is-invalid @enderror">
                    <option disabled selected >Ano</option>
                    <option>{{now()->year - 1}}</option>
                    <option>{{now()->year}}</option>
                    <option>{{now()->year + 1}}</option>
                    <option>{{now()->year + 2}}</option>
                </select>
                @error('year')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="city" style="font-size: 20pt">Cidade</label>

            <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                <option disabled selected >Selecione a cidade</option>
                <option value="porto">Porto</option>
                <option value="lisboa">Palmela</option>
            </select>
            @error('city')
                <span>{{ $message }}</span>
            @enderror
        </div>

        @if(Auth::user()->role_id === 1)
            <div class="form-group">
                <label for="user_id" style="font-size: 20pt">Coordenador</label>
                <select name="user_id" id="coordinator" class="form-control @error('user_id') is-invalid @enderror">
                    <option disabled selected>Selecione o Coordenador</option>
                    @foreach($users as $user)
                        @if($user->role_id === 2 || $user->role_id === 1)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('user_id')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        @else
            <select hidden class="form-control" name="user_id" id="coordinator">
                <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
            </select>
        @endif

        <div class="form-group">
            <label for="center_cost" style="font-size: 20pt">Centro de Custo</label>
            <input type="text" class="form-control" name="center_cost" id="center_cost"/>
        </div>

        {{--div where AJAX will deploy the full classname--}}
        <div id="fullname" hidden>

        </div>

        {{-- <drag and drop de formadores> --}}
        {{-- inserir ou não --}}
        <div class="form-group" style="display: flex">
            <label for="mostrar-formadores" style="font-size: 20pt">Inserir formadores?</label>
            {{-- Info tooltip --}}
            <a data-toggle="tooltip" class="btn-info" id="botao-info"
               style=" -webkit-user-select: none;
                        -khtml-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        -o-user-select: none;
                        user-select: none;text-decoration: none; border-radius: 50%; width: 25px; height: 25px; color: white; text-align: center; font-size: large; margin-left: 5px"
               title="Só aparecerão disponíveis os formadores que já tenham sido inseridos na aplicação. Utilize a área de FORMADORES, no menu principal, para inserir formadores na aplicação. Poderá sempre inserir e remover formadores, posteriormente, pelo menu da turma criada.">
                i
            </a>
            <input type="checkbox" class="form-control" name="mostrar-formadores" id="mostrar-formadores"
                   onClick="alterarVisibilidade(this,'tabelas-inserir-formadores-turma', 'flex');"
            />
        </div>


        {{-- tabelas  --}}    {{-- tem css a meter hidden e js a fazer toggle com  a checkbox --}}

        <div class="tabela-drag-formadores " id="tabelas-inserir-formadores-turma" >

            <div class="f-box">
                <h5>Formadores Disponiveis:</h5>
                <ul id="formadores-turma-sortable1" class="formadores-turma-sortable1 sortable_list connectedSortable p-2">
                    @foreach($users as $user)
                        @if(Auth::user()->role_id === 2 && $user->id !== Auth::user()->id || Auth::user()->role_id === 1)
                            <li class="ui-state-default bg-light" value="{{$user->id}}">{{$user->name}}</li>
                        @endif
                    @endforeach
                </ul>
            </div>

{{--            <div id="msg-arrasto">--}}
{{--                Arraste Formadores de uma tabela para a outra--}}
{{--            </div>--}}

            <div class="f-box">
                <h5>Para a Turma:</h5>
                <ul id="formadores-turma-sortable2" name="adicionarFormadoresTurma"
                    class="formadores-turma-sortable1 sortable_list connectedSortable p-2">
                    @if(Auth::user()->role_id === 2)
                        <li disabled class="ui-state-default bg-light" value="{{Auth::user()->id}}">{{Auth::user()->name}}</li>
                    @endif
{{--                    <li disabled class="ui-state-default" value="{{Auth::user()->id}}">{{Auth::user()->name}}</li>--}}
                </ul>
            </div>
        </div>

        <div hidden>
            <select id="formFormadoresTurma" name="formadoresTurma[]" multiple>
            </select>
        </div>

        <div hidden>
            <div id="formTurmasExistentes" name="turmasExistentes[]">
                @foreach($group_codes as $turma)
                    <div>{{$turma->group_code}}</div>
                @endforeach
            </div>
        </div>


        {{-- <drag and drop de formadores />  --}}

        <input id="subtn" class="btn btn-primary text-center justify-content-center" type="button" value="Gerar Turma">
    </form>
    <br>
    <br>

    <section class="confirmar-turma">
        <div style="display: none" id="turma-criada">
            <div class="modal-bg">
                <div class="modal">
                    <div style="width:400px;">
                        <h1 id="nome-nova-turma"></h1>
                        <div class="detalhes-turma">
                            <div class="title_value">
                                Coordenador:
                                <div id="coordenador-nova-turma">
                                </div>
                            </div>
                            <div class="title_value">
                                Curso:
                                <div id="curso-nova-turma">
                                </div>
                            </div>
                            <div class="title_value">
                                Centro de custo:
                                <div id="centro-nova-turma">
                                </div>
                            </div>
                            <div class="title_value">
                                Formadores:
                                <div  style="overflow: auto; height: 200px" id="formadores-nova-turma">
                                </div>
                            </div>
                        </div>
                        <div class="btn-confirmar-cancelar">
                            <button type="submit" form="form1" class="btn btn-success mr-5" value="Submit" style="margin-bottom: 20px">Confirmar</button>
                            <a class="btn btn-danger ml-5" style="margin-bottom: 20px;" href={{url('ibis/create-class')}} >Cancelar</a>
                            {{-- <div class="btn btn-danger" onclick="alterarVisibilidade2(this,'form1');alterarVisibilidade2(this,'turma-criada')" style="margin-top: 20px">Cancelar</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

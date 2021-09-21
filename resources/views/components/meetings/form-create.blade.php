






<div class="row">

    <div class=" col-9 container bg-danger p-3"
         style=" -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;">

        <div class="row bg-info p-2 border-bottom  border-danger" style=" margin: 0px 10px">
            <div class="col-9 text-center row" style="display: flex;align-items: center; justify-content: space-around">
                <h5 class="col-5">Tipo de reunião</h5>
                <div class="col-2">

                </div>
                <div class="form-group">

                    <div class="form-check">
                        <input
                            onclick="definirTipoDeReuniao('label-pedagogica-r');alterarVisibilidadeRadio(this, 'create-meeting-pedagogica-r','create-meeting-recuperacao-r','block')"
                            class="form-check-input" type="radio" name="tipo-de-reuniao-r"
                            id="tipo-de-reuniao-pedagogica-r">
                        <label id="label-pedagogica-r" class="form-check-label" for="nao-aproveitamento-r">
                            Pedagógica
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            onclick="definirTipoDeReuniao('label-recuperacao-r');alterarVisibilidadeRadio(this, 'create-meeting-recuperacao-r','create-meeting-pedagogica-r','block')"

                            class="form-check-input" type="radio" name="tipo-de-reuniao-r"
                            id="tipo-de-reuniao-recuperacao-r">
                        <label id="label-recuperacao-r" class="form-check-label" for="excesso-faltas-r">
                            Recuperação
                        </label>
                    </div>
                </div>


            </div>

        </div>
        <div class="bg-info p-2" style="display: none" id="create-meeting-recuperacao-r">
            <h2 class="text-center">Nova reunião de Recuperação</h2>

            <div class="form-group">
                <h3>Formador</h3>
                <select onchange="meterFormadoresNaReuniao('recuperacao')" class="form-select mb-3" id="formador-recuperacao-r">
                    <option selected>Selecione o formador</option>
                    @foreach($formadoresDaTurma as $formador)
                        <option value="{{$formador->id}}">{{$formador->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <h3>Aluno</h3>

                <select onchange="meterAlunoNaReuniaoRecuperacao()" class="form-select mb-3" id="aluno-recuperacao-r">
                    <option selected>Selecione o aluno</option>
                    @foreach($alunos as $aluno)
                        <option value="{{$aluno->id}}">{{$aluno->name}} - {{$aluno->student_number}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <h3>UFCD</h3>

                <div style="display: flex; flex-wrap: wrap">
                    <div style="margin: 0px 10px">
                        <label for="ufcd-numero-recuperacao-r" class="form-label">Código da UFCD</label>
                        <input style="width: 150px" type="text" class="form-control" id="ufcd-numero-recuperacao-r">
                    </div>
                    <div style="margin: 0px 10px">
                        <label for="ufcd-nome-recuperacao-r" class="form-label">Nome da UFCD</label>
                        <input style="width: 350px" type="text" class="form-control" id="ufcd-nome-recuperacao-r">
                    </div>

                </div>


            </div>
            <div style="width: 33%" class="form-group">
                <h3>Data e hora</h3>
                    <input id="horario-recuperacao-r" type='datetime-local' class="form-control"/>
                    <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                    </span>


            </div>


        </div>
        <div style="display: none" id="create-meeting-pedagogica-r">

            <div class="row bg-info p-2" style="margin: 0px 10px">
                <div class="col-9 text-center row">
                    <div class="col-5"
                         style="display: flex; justify-content: center;align-items: center; flex-direction: column">

                        <h5>Formadores Nesta Turma</h5>
                        <ul id="sortable1" class="sortable_list connectedSortable bg-warning p-2"
                            style="min-width: 200px; height: 200px; overflow: auto;  list-style-type: none;">
                            {{--@foreach($formadores as $formador)--}}
                            @foreach($formadoresDaTurma as $formador)

                                <li class="ui-state-default" value="{{$formador->id}}">{{$formador->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-2 text-white"
                         style="display: flex;align-items: center;justify-content: center; font-size: 0.8rem">
                        Arraste formadores de uma tabela para a outra.
                    </div>
                    <div class="col-5"
                         style="display: flex; justify-content: center;align-items: center; flex-direction: column">

                        <h5>Para a reunião</h5>
                        <ul id="sortable2" name="adicionarFormadores"
                            class="bg-success sortable_list connectedSortable p-2"
                            style="width: 200px; height: 200px; overflow: auto; list-style-type: none">
                            <li id="coordenador" class="ui-state-default">{{$coordenador->name}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <button class="btn-warning btn w-100" onclick="meterFormadoresNaReuniao('pedagogica')">Definir Formadores
                    </button>
                </div>
            </div>


            <div class="row bg-info p-2" style="margin: 0px 10px">
                <div class="col-9 text-center row">
                    <div class="col-5"
                         style="display: flex; justify-content: center;align-items: center; flex-direction: column">

                        <h5>Alunos nesta turma</h5>
                        <ul id="sortable3" class="sortable_list connectedSortable bg-warning p-2"
                            style="min-width: 200px; height: 200px; overflow: auto;  list-style-type: none;">
                            @foreach($alunos as $aluno)
                                <li class="ui-state-default" value="{{$aluno->id}}">{{$aluno->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-2 text-white"
                         style="display: flex;align-items: center;justify-content: center; font-size: 0.8rem">
                        Arraste alunos de uma tabela para a outra.
                    </div>
                    <div class="col-5"
                         style="display: flex; justify-content: center;align-items: center; flex-direction: column">

                        <h5>Para a reunião</h5>
                        <ul id="sortable4" name="adicionarAlunos" class="bg-success sortable_list connectedSortable p-2"
                            style="width: 200px; height: 200px; overflow: auto; list-style-type: none">
                        </ul>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <button class="btn-warning btn w-100" onclick="meterAlunosNaReuniao()">Definir Alunos</button>

                </div>


            </div>


            <div class="row bg-primary p-2" style="margin: 0px 10px">
                {{--CREATE FORM--}}
                <div class="col-7" style="display: flex;justify-content: space-around;align-items: center">
                    <div>
                        Data e Hora de início:
                    </div>
                    <input type="text" id="escolherDataInicio" name="escolherDataInicio" autocomplete="off"/>

                </div>
                <div class="col-2">

                    <button class="btn-warning btn w-100" onclick="definirDataInicioReuniao()">Definir Início</button>
                </div>

            </div>

            <div class="row bg-info p-2" style="margin: 0px 10px">
                <div class="col-7" style="display: flex;justify-content: space-around;align-items: center">
                    <div>
                        Data e Hora de fim:
                    </div>
                    <input type="text" id="escolherDataFim" name="escolherDataFim" autocomplete="off"/>

                </div>
                <div class="col-2">

                    <button class="btn-warning btn w-100" onclick="definirDataFimReuniao()">Definir Fim</button>
                </div>


            </div>


        </div>

    </div>

    <div class="col-3 container bg-danger p-3 text-white">

        <div class="col-12 bg-dark p-2 m-0" style="display:flex; flex-direction:column; align-items:center">
            <h5 class="text-center p-0" style="align-self: center">
                Nova Reunião
            </h5>
            <div class="row p-1" style="width: 100%;display: flex;justify-content: space-around;align-items: center">
                <div class="p-0">
                    Tipo de Reunião:
                </div>
                <div id="tipoDeReuniao2" class="p-0" style="font-size: 0.7rem">
                    - - - - - - -
                </div>
            </div>

            <div class="p-1" style="display:flex;justify-content: space-around;width: 100%">
                <div class="p-0">
                    Formadores:
                </div>
                <div id="formadoresReuniao" class="p-0" style="font-size: 0.7rem;height: 200px; overflow: auto">
                    - - - - - - - - -
                </div>
            </div>
            <div class="p-1" style="display:flex;justify-content: space-around;width: 100%">
                <div class="p-0">
                    Alunos:
                </div>
                <div id="alunosReuniao" class="p-0" style="font-size: 0.7rem;height: 200px; overflow: auto">
                    - - - - - - - - -
                </div>
            </div>

            <div id="horaEDataInicio" class="bg-dark text-white">


            </div>
            <div id="horaEDataFim" class="bg-dark text-white">

            </div>

        </div>
    </div>
</div>


/*form escondido*/

<form id="criarReuniao" name="criarReuniao" method="POST"
      action="{{ url('ibis/'.$turma->id.'/create-meeting') }}" autocomplete="off">
    @csrf
    <h3>tipo</h3>
    <input type="text" id="formTipoReuniao" name="formTipoReuniao">
    <h3>formadores</h3>
    <select id="formFormadoresReuniao" name="formFormadoresReuniao[]" multiple>
    </select>
    <h3>alunos</h3>
    <select id="formAlunosReuniao" name="formAlunosReuniao[]" multiple>
    </select>
    <h3>inicio</h3>
    <input type="text" id="formInicioReuniao" name="formInicioReuniao">
    <h3>fim</h3>
    <input type="text" id="formFimReuniao" name="formFimReuniao">
    <h3>turma</h3>
    <input type="text" value="{{$turma->group_code}}" id="formTurma" name="formTurma">
    <h3>turma_id</h3>
    <input type="text" value="{{$turma->id}}" id="formTurmaId" name="formTurmaId">


</form>

<div class="col-12 bg-dark">
    <button type="submit" form="criarReuniao" value="Submit">Submit</button>

</div>



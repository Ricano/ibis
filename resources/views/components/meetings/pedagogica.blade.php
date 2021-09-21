<div class="container">


    <section
        style="margin:auto; border-radius: 10px;padding: 25px;background-color: #222222; display: flex; justify-content: space-between;width: 80%;color: white">
        <div>

            <h4>Disponibilidade da ATA</h4>
            @if($totalPreenchidos != sizeof($alunosDaReuniao)*sizeof($formadoresDaReuniao))
                <h3>Existem Feedbacks por responder</h3>
            @else
                @if(!$reuniao->coordinator_intro)
                    <h3>A Análise Global está por preencher.</h3>
                @else
                    @if(!$reuniao->ata[0]->local)
                    <h3>O Local da Reunião está por preencher.</h3>
                    @else

                        <h3><a href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/get-ata')}}"></a> Disponível
                        </h3>
                    @endif


                @endif

            @endif

            @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                <div></div>
            @else


                @if($reuniao->ata[0]->impressa)

                    <a class="btn-primary btn"
                       href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/get-ata')}}">Disponível</a>
                @else



                    <a style="margin-top: 20px" class="btn-primary btn"
                       href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/ata/'.$reuniao->meetingType->id)}}">Pré-visualizar
                        ATA</a>

                    @if($reuniao->coordinator_intro && $reuniao->ata[0]->local && $totalPreenchidos == sizeof($alunosDaReuniao)*sizeof($formadoresDaReuniao) )
                        <button type="submit" form="form-ata-pegagogica-r" class="btn btn-success" style="margin-top: 20px">Gravar Ata</button>
                    @else
                        <button style="margin-top: 20px; margin-left: 20px" disabled type="button" form="form-ata-pegagogica-r" class="btn btn-secondary">Gravar Ata
                        </button>
                    @endif


                @endif
            @endif
        </div>

        <div id="status-r">
            <div class="status-item-r">

                <div>Feedbacks:</div>
                <div> {{$totalPreenchidos}} / {{sizeof($alunosDaReuniao)*sizeof($formadoresDaReuniao)}}
                    - {{round((($totalPreenchidos / (sizeof($alunosDaReuniao)*sizeof($formadoresDaReuniao)))*100),2)}} %
                </div>
            </div>

            <div class="status-item-r">
                @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                    @if($reuniao->coordinator_intro)
                        <div >Análise Global:</div>
                        <div >Preenchida</div>
                    @else
                        <div>Análise Global:</div>
                        <div style="color: var(--danger)">Por preencher</div>
                    @endif
                @else
                    @if($reuniao->coordinator_intro)
                        <div>Análise Global:</div>
                        <div><a class="card-link"
                                href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/ata/'.$reuniao->meetingType->id.'#apontador-analise-ok-r')}}">
                                Preenchida </a></div>
                    @else
                        <div>Análise Global:</div>
                        <div><a style="color: var(--danger)" class="card-link"
                                href="{{url('#apontador-analise-ko-r')}}">Por preencher</a></div>
                    @endif
                @endif
            </div>

            <div class="status-item-r">

            @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                    @if($reuniao->ata[0]->local)
                        <div>Local da Reunião:</div>
                        <div>{{$reuniao->ata[0]->local}}</div>
                    @else
                        <div>Local da Reunião:</div>
                        <div style="color: var(--danger)" class="card-link">Por preencher</div>
                    @endif
            @else

                    @if($reuniao->ata[0]->local)
                        <div>Local da Reunião:</div>
                        <div>{{$reuniao->ata[0]->local}}</div>
                    @else
                        <div>Local da Reunião:</div>
                        <div><a style="color: var(--danger)" class="card-link" href="{{url('#apontador-analise-ko-r')}}">Por preencher</a></div>
                    @endif
                @endif
            </div>


            <div class="status-item-r">
                @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                    @if(sizeof($reuniao->ata[0]->planos)==0)
                        <div>Planos de Ação:</div>
                        <div style="color: var(--danger)" class="card-link" >Por preencher</div>
                    @else
                        @if(sizeof($reuniao->ata[0]->planos)==1)
                            <div>Planos de Ação:</div>
                            <div>Já inserido</div>
                        @else
                            <div>Planos de Ação:</div>
                            <div class="card-link" >Já inseridos</div>
                        @endif
                    @endif

                @else
                    @if(sizeof($reuniao->ata[0]->planos)==0)
                        <div>Planos de Ação:</div>
                        <div><a style="color: var(--danger)" class="card-link"
                                href="{{url('#apontador-analise-ko-r')}}">Por preencher</a></div>
                    @else
                        @if(sizeof($reuniao->ata[0]->planos)==1)
                            <div>Planos de Ação:</div>
                            <div><a class="card-link"
                                    href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/ata/'.$reuniao->meetingType->id.'#apontador-planos-ok-r')}}">
                                    Já inserido</a></div>
                        @else
                            <div>Planos de Ação:</div>
                            <div><a class="card-link"
                                    href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/ata/'.$reuniao->meetingType->id.'#apontador-planos-ok-r')}}">
                                    Já inseridos</a></div>
                        @endif
                    @endif
                @endif
            </div>

            <div class="status-item-r">
                @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                    @if($reuniao->ata[0]->plano_atividades)
                        <div>Atividades:</div>
                        <div class="card-link" >Já inserida</div>
                    @else
                        <div>Atividades:</div>
                        <div style="color: var(--danger)" class="card-link" >Por preencher</div>
                    @endif

                @else
                    @if($reuniao->ata[0]->plano_atividades)
                        <div>Atividades:</div>
                        <div><a class="card-link"
                                href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/ata/'.$reuniao->meetingType->id.'#apontador-atividades-ok-r')}}">
                                Já inserida</a></div>
                    @else
                        <div>Atividades:</div>
                        <div><a style="color: var(--danger)" class="card-link"
                                href="{{url('#apontador-analise-ko-r')}}">Por preencher</a></div>
                    @endif
                @endif
            </div>

            <div class="status-item-r">
                @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                    @if($reuniao->ata[0]->anexos)
                        <div>Anexos:</div>
                        <div class="card-link">Já inseridos</div>
                    @else
                        <div>Anexos:</div>
                        <div style="color: var(--danger)" class="card-link" >Por preencher</div>
                    @endif
                @else
                    @if($reuniao->ata[0]->anexos)
                        <div>Anexos:</div>
                        <div><a class="card-link"
                                href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/ata/'.$reuniao->meetingType->id.'#apontador-atividades-ok-r')}}">
                                Já inseridos</a></div>
                    @else
                        <div>Anexos:</div>
                        <div><a style="color: var(--danger)" class="card-link"
                                href="{{url('#apontador-analise-ko-r')}}">Por preencher</a></div>
                    @endif
                @endif
            </div>
        </div>
    </section>
</div>


<div>
    <form style="display: none" id="form-ata-pegagogica-r"
          action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/save-ata-pedagogica') }}" method="POST">
        @csrf
        <input name="idDaAta" type="text" value="{{$reuniao->ata[0]->id}}">
    </form>
</div>

@if(!$reuniao->ata[0]->impressa)
    <section class="mt-5 row" style="gap: 5rem">
        <div class="col justify-content-center">

            @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                <h2 class="card-title">Os seus Feedbacks</h2>
            @else
                <h2 class="card-title">Feedbacks por Aluno</h2>
            @endif

            <table class="table tabela-pedagogica">
                <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                    @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                        <th scope="col" class="text-center">Feedbacks</th>
                    @else
                        <th scope="col" class="text-center">Editar</th>
                    @endif



                </tr>
                </thead>
                <tbody>
                @foreach($alunosDaReuniao as $aluno)

                    <tr class="bg-light"
                        {{--                        class="@if($loop->even)table-primary @else table-info   @endif"--}}
                    >
                        <th>{{$aluno->student_number}}</th>
                        <td scope="row">{{$aluno->name}}</td>
                        <td class="text-center">
                            <a class="btn btn-primary"
                               href="/ibis/{{$turma->id}}/meetings/{{$reuniao->id}}/student/{{$aluno->id}}">
                                X
                            </a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section>
    {{--        </section>--}}

    {{--Apenas é mostrado para os Coordenadores de Turma--}}
    {{--e os Coordenadores de Área--}}

    {{--
        @if(Auth::user()->role_id === 1 || Auth::user()->role_id === $turma->user_id)
    --}}


    {{--    <section class="mt-5">--}}
    <div class="col justify-content-center">
        <h2 class="card-title">Estado dos Feedbacks</h2>
        <table class="table tabela-pedagogica">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col">Formador</th>
                <th scope="col" class="text-center">Completados</th>
                <th scope="col" class="text-center">Total</th>
            </tr>
            </thead>
            <tbody>

            @foreach($formadoresDaReuniao as $formador)
                <tr class="bg-light"
                    {{--                    class="@if($loop->even)table-primary @else table-info   @endif"--}}
                >
                    <th scope="row">{{$formador->name}}</th>
                    <td class="text-center">{{$totais[$formador->id]}}</td>
                    <td class="text-center">{{sizeof($alunosDaReuniao)}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>



    @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
        <div></div>
    @else


        @component('components.meetings.analise', [
                 'reuniao'       =>$reuniao,
                 'turma'         =>$turma,
                 'coordenador'   =>$coordenador,
                 'alunosDaReuniao' => $alunosDaReuniao,
                 'formadoresDaReuniao' => $formadoresDaReuniao
                     ])
        @endcomponent
        {{--          SALA--}}

        {{--<h1 style="margin-top: 50px">Localização</h1>--}}
        <section class="form-pedagogica ">
            <button class="accordion " style="font-size: 20px;font-weight: bold; margin-top: 10px">Localização<span style="color: indianred; font-size: 12px; margin-left: 50px"> Preenchimento Obrigatório</span></button>
            <div class="panel-l">
                <div class="local-container col-md-12">
                    <form method="POST" id="form-localizacao"
                          action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/update-ata-local') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="width: 400px; margin-top: 10px">
                            <input style="margin-top: 10px" type="text" name="local" id=local" class="form-control">
                        </div>
                        <input id="btn-peda" type="submit" class="btn btn-success" value="Gravar">
                    </form>
                </div>
            </div>

            {{-- PLANO DE AÇAO--}}

            <button class="accordion" style="font-size: 20px;font-weight: bold">Planos de Ação</button>
            <div class="panel-l">
                <div class="action-plan-container">
                    <form method="POST"
                          action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id) }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="alunoReuniao" style="font-size: 20pt">Escolha o Aluno</label>
                            <select onchange="disableDescription(this.value)" name="alunoReuniao" id="alunos-plano-acao-l" class="form-control">
                                <option disabled selected>Selecione o Aluno</option>
                                @foreach($alunosDaReuniao as $aluno)
                                    <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                                @endforeach
                                <option id="restantes-alunos" style="font-weight: bold" value="-1">Restantes Alunos da Turma</option>
                            </select>
                        </div>
                        <div class="form-row"></div>
                        <div class="form-group" id="descricao-plano-div">
                            <label id="descricao-planos" for="descricao" style="font-size: 20pt;">Descrição</label>
                            <textarea rows="2" name="descricao" id=descricao-plano-acao"
                                      class="form-control textarea-action-plan">
                            </textarea>

                        </div>

                        <div class="form-group">
                            <label for="accao" style="font-size: 20pt">Ação a implementar</label>
                            <textarea rows="2" name="accao" id="accao" class="form-control textarea-action-plan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="intervenientes" style="font-size: 20pt">Intervenientes</label>
                            <input type="text" name="intervenientes" id=intervenientes" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="medicao" style="font-size: 20pt">Medição</label>
                            <textarea rows="2" name="medicao" id="medicao" class="form-control textarea-action-plan"></textarea>
                        </div>
                        <input id="btn-peda" type="submit" class="btn btn-success" value="Gravar">
                    </form>
                </div>
            </div>


            {{--ATIVIDADES--}}

            <button class="accordion" style="font-size: 20px;font-weight: bold">Adicionar Atividades</button>
            <div class="panel-l">
                <div class="action-plan-container">
                    <form id="form-plano-atividades" name="form-plano-atividades" method="POST"
                          action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/update-ata-atividades') }}">
                        @csrf
                        @method('PUT')

                        <div class="form_row">
                            <h3>Atividades</h3>
                            <textarea style="width: 50%; resize: none" rows="4" name="p_atividades" id=p_atividades"
                                      class="form-control"></textarea>
                        </div>
                        <input id="btn-peda" type="submit" class="btn btn-success" value="Gravar" style="margin-top: 15px">
                    </form>
                </div>
            </div>


            {{--ANEXOS--}}
            <button class="accordion" style="font-size: 20px;font-weight: bold">Adicionar Anexos</button>
            <div class="panel-l">
                <div class="action-plan-container">
                    <form id="form-anexos" name="form-anexos" method="POST"
                          action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/update-ata-anexos') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <table class="table" style="margin-bottom: 0">
                                    <thead>
                                    <tr id="anexo-group">
                                        <th id="anexo-title" width="100%" style="font-size: 20px; font-weight: normal">Anexos
                                        </th>
                                        <th id="anexo-btn"><a class="btn btn-info addAnexo">+</a></th>
                                    </tr>
                                    </thead>
                                    <tbody id="anexo-body">
                                    <tr>
                                        <td id="anexo-label"><input type="text" name="anexos[]" class="form-control"></td>
                                        <th id="anexo-btn"><a class="btn btn-danger remove" style="width: 34px">-</a></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <input id="btn-peda" type="submit" class="btn btn-success" value="Gravar">
                    </form>
                </div>
            </div>
        </section>
        @endif

        {{--    </div>--}}
        </div>
    @endif

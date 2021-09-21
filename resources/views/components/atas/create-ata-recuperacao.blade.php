{{--<div class="container row col-12 bg-white rounded-lg p-2 mt-2 mb-3 text-center ">--}}
{{--    <div class="container col-6 bg-white rounded-lg p-2 mt-2 mb-3 text-center ">--}}

{{--        <h2 class="border-bottom">Reunião de {{$reuniao->meetingType->name}}</h2>--}}
{{--        <div class="row text-center align-items-center">--}}

{{--            <h5 class="col-2">--}}
{{--                UFCD--}}
{{--            </h5>--}}
{{--            <h5 id="ata-recuperacao-form-ufcd-numero-r" class="col-2">{{$ata->ufcd->number}}</h5>--}}
{{--            <h5 id="ata-recuperacao-form-ufcd-nome-r" class="col-8">{{$ata->ufcd->name}}</h5>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="container col-6 bg-white rounded-lg p-2 mt-3 mb-2">--}}
{{--        <div class="row text-center align-items-center">--}}
{{--            <h5 class="col-3">--}}
{{--                Aluno:--}}
{{--            </h5>--}}
{{--            <h3 class="col-9">{{$alunosDaReuniao[0]->name}}</h3>--}}
{{--        </div>--}}
{{--        <div class="row text-center align-items-center">--}}
{{--            <h5 class="col-3">Formador</h5>--}}
{{--            <h3 class="col-9">{{$formadoresDaReuniao[0]->name}}</h3>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="row text-center align-items-center mt-3 ">--}}
{{--        <h5 class="col-12" >Ata da reunião</h5>--}}
{{--        @if($ata->impressa)--}}

{{--            <a class="col-12">--}}
{{--                #ícone PDF#--}}
{{--            </a>--}}
{{--        @else--}}
{{--            <h3 class="col-12">Não disponível</h3>--}}


{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}









<div hidden>
    @component('components.meetings.recuperacao', [


                                                'reuniao'               => $reuniao,
                                                'ata'                   => $ata,
                                                'alunosDaReuniao'       => $alunosDaReuniao,
                                                'formadoresDaReuniao'   => $formadoresDaReuniao,
                                                'turma'                 => $turma
                                                ])
    @endcomponent
</div>


<div style="display: flex; flex-direction: row" class="mt-5">
    <section class="container col-4 rounded-lg mb-3 text-center ">
        <div class="container createAtaRec">
            <div class="row">
                <div class="card-body bg-white justify-content-center row">
                    <div class="row justify-content-between mb-3">
                        <div>
                            <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                        </div>
                        {{--                        <h4 class="meetingTitle2">Criar Ata de Recuperação</h4>--}}
                    </div>

                    <div style="padding: 20px">
                        <div class="mb-3" {{--style="display: none"--}} id="seccao-nao-aproveitamento-r">
                            <div id="form-ata-recuperacao-1-r">
                                <h5>Indique a nota obtida na UFCD</h5>
                                <div style="display: flex" class="mb-5">
                                    <input
                                        onkeyup="preencherPropostaAtaRecuperacao();
                                            numeroPorExtenso('ano-r', {{$anoReuniao}});
                                            numeroPorExtenso('dia-r', {{$diaReuniao}})"
                                        onchange="preencherPropostaAtaRecuperacao() ;
                                            numeroPorExtenso('ano-r', {{$anoReuniao}});
                                            numeroPorExtenso('dia-r', {{$diaReuniao}})"
                                        placeholder="Ex: 9,45" type="text" class="form-control"
                                        id="ata-recuperacao-form-nota-r" autocomplete="off">
                                    <label for="ata-recuperacao-form-nota-r" class="form-label"></label>
                                </div>
                            </div>

                            <div id="form-ata-recuperacao-2-r">
                                <h5>Descreva as razões pelas quais o aluno não conseguiu aproveitamento.</h5>
                                <div class="mb-5">
                                    <div class="form-group">
                                        <label for="ata-recuperacao-form-razoes-para-nao-ter-atingido-r">Indique pelo menos uma
                                            razão.</label>
                                        <textarea
                                            onkeyup="preencherPropostaAtaRecuperacao();mostrarElemento('form-ata-recuperacao-3-r','block')"
                                            onclick="mostrarElemento('form-ata-recuperacao-3-r','block')"
                                            onchange="preencherPropostaAtaRecuperacao() ;mostrarElemento('form-ata-recuperacao-3-r','block')"
                                            placeholder="Ex: apresentar dificuldades de atenção e raciocício e mau comportamento em sala"
                                            class="form-control" id="ata-recuperacao-form-razoes-para-nao-ter-atingido-r"
                                            rows="1"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="form-ata-recuperacao-3-r">
                                <h5>Indique o desfecho da reunião</h5>
                                <div class="form-check">
                                    <input
                                        onkeyup="preencherPropostaAtaRecuperacao()"
                                        onchange="preencherPropostaAtaRecuperacao();
                                      alterarVisibilidade(this, 'estrategia','block');
                                      alterarVisibilidade(this, 'reprovacao','none'); "
                                        class="form-check-input" type="radio" name="decisao-recuperacao" id="aprovado"
                                        autocomplete="off" checked>
                                    <label class="form-check-label" for="aprovado">
                                        Adotar estratégia de recuperação
                                    </label>
                                </div>
                                <div class="form-check mb-5">
                                    <input
                                        onkeyup="preencherPropostaAtaRecuperacao()"
                                        onchange="preencherPropostaAtaRecuperacao();
                                      alterarVisibilidade(this, 'estrategia','none');
                                      alterarVisibilidade2(this, 'reprovacao','block') "
                                        class="form-check-input" type="radio" name="decisao-recuperacao" id="reprovado"
                                        autocomplete="off">
                                    <label class="form-check-label" for="reprovado">
                                        Reprovar o aluno
                                    </label>
                                </div>
                            </div>

                            <div id="estrategia">
                                <div id="form-ata-recuperacao-4-r">
                                    <h5>Descreva os motivos que levaram à decisão de adotar uma estratégia de recuperação.</h5>
                                    <div>
                                        <div class="form-group mb-5">
                                            <label for="ata-recuperacao-form-caracteristicas-recuperacao-r">Indique pelo menos um
                                                motivo.</label>
                                            <textarea onkeyup="preencherPropostaAtaRecuperacao()"
                                                      onchange="preencherPropostaAtaRecuperacao()"
                                                      placeholder="Ex: durante as horas totais da UFCD, demonstrou interesse na matéria e vontade de evoluir"
                                                      class="form-control" id="ata-recuperacao-form-caracteristicas-recuperacao-r"
                                                      rows="2">
                                </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id="form-ata-recuperacao-5-r">
                                    <h5>Indique qual a estratégia de recuperação que será adotada.</h5>
                                    <div>
                                        <div class="form-group mb-5">
                                            <label for="ata-recuperacao-form-estrategia-recuperacao-r">
                                                Indique pelo menos uma.
                                            </label>
                                            <textarea onkeyup="preencherPropostaAtaRecuperacao()"
                                                      onchange="preencherPropostaAtaRecuperacao()"
                                                      placeholder="Ex: um teste, dois trabalhos práticos..."
                                                      class="form-control" id="ata-recuperacao-form-estrategia-recuperacao-r"
                                                      rows="2">
                                </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="reprovacao" style="display: none">
                                <h1>Reprovacao</h1>
                                <div id="form-ata-recuperacao-6-r">
                                    <h5>Descreva os motivos que levaram à decisão de reprovar o aluno.</h5>
                                    <div>
                                        <div class="form-group">
                                            <label for="ata-recuperacao-form-caracteristicas-reprovacao-r">
                                                Indique pelo menos um motivo.
                                            </label>
                                            <textarea
                                                onkeyup="preencherPropostaAtaRecuperacao()"
                                                onchange="preencherPropostaAtaRecuperacao()"
                                                placeholder="Ex: não melhorou o comportamento, mesmo depois de ter sido chamado à atenção."
                                                class="form-control" id="ata-recuperacao-form-caracteristicas-reprovacao-r"
                                                rows="2">

                                </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">

                        <button type="submit"
                                form="form-ata-recuperacao-r"
                                class="btn btn-success shadow">Gravar ata</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="pre-visualizacao-ata-recuperacao" class="mr-5">
        <div style="display: flex;justify-content: center; font-family: Arial">
            <div id="recuperacao-pdf-r"
                 style="display: flex;
                 flex-direction: column;
                 justify-content: space-between ;
                 background-color: white;
                 width: 840px;height: 1188px;
                 padding:80px 80px;
                 box-shadow: 5px 5px 5px dimgray">
                <h2 style="color: red;text-align: center">    PRE-VISUALIZAÇÃO</h2>
                <div id="recuperacao-logo-atec-r" style="text-align: right;margin:10px 0px">
                    <img style="width: 200px" src="{{asset('/images/logoatec.jpg')}}" alt="ATEC-Academia de Formação">
                </div>

                <div id="recuperacao-titulo-r" style="margin: 10px 0px">
                    <h2><strong>

                            ATA
                        </strong>
                    </h2>
                </div>

                <div id="recuperacao-tabela-introducao-r" style="margin: 10px 0px">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th colspan="4" class="text-center table-active">CURSO</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="align-middle">Nome:</th>
                            <td>{{$turma->grouptype->description}}</td>
                            <th class="align-middle">Abrev.:</th>
                            <td class="align-middle">{{$turma->group_code}}</td>
                        </tr>
                        <tr>
                            <th>Tipologia:</th>
                            <td>{{$turma->grouptype->coursetype->acronym}}</td>
                            <th>Cód.:</th>
                            <td>{{$turma->center_cost}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

                <div id="recuperacao-texto-r">

                    <p>
                        @if($diaReuniao=='1')
                            Ao
                            <span style="font-weight: bold;color: blue">
                                primeiro dia de
                            </span>
                        @else Aos <span id="dia-r" style="font-weight: bold;color: blue">
                            {{$diaReuniao}}
                        </span>
                        dias de
                        @endif <span style="font-weight: bold;color: blue">
                                    {{$mesReuniao}}
                                </span>
                        , do ano de
                        <span id="ano-r" style="font-weight: bold;color: blue">
                            {{$anoReuniao}}
                        </span>, sob a presidência do coordenador
                        <span style="font-weight: bold;color: blue">
                            {{$coordenador->name}}
                        </span>
                        e com a presença do formador
                        <span style="font-weight: bold;color: blue">
                            {{$formadoresDaReuniao[0]->name}},
                        </span> realizou-se uma reunião extraordinária
                        da
                        turma
                        do <span style="font-weight: bold;color: blue">
                            {{$turma->groupType->description}}
                        </span>
                        , de
                        <span style="font-weight: bold;color: blue">
                            {{$mesTurma}}
                        </span>
                        de
                        <span style="font-weight: bold;color: blue">
                            {{$anoTurma}}
                        </span>
                        (
                        <span style="font-weight: bold;color: blue">
                            {{$turma->group_code}}
                        </span>
                        ).
                    </p>
                    <p>
                        A reunião teve como objetivo analisar a não-aprovação do
                        formando
                        <span style="font-weight: bold;color: blue">
                            {{$alunosDaReuniao[0]->name}}
                        </span>
                        que obteve
                        <span id="nota-r" style="font-weight: bold;color: blue">
                            NOTA - POR PREENCHER
                        </span>
                        valores na Unidade de Formação de Curta Duração (UFCD)
                        <span id="ufcd-numero-r" style="font-weight: bold;color: blue">
                               POR PREENCHER
                        </span> -
                        <span id="ufcd-nome-r" style="font-weight: bold;color: blue">

                        </span>
                        . O formando não atingiu
                        os objetivos mínimos esperados por
                        <span id="razoes-para-nao-ter-atingido-r" style="font-weight: bold;color: blue">
                            RAZÕES - POR PREENCHER
                        </span>.
                    </p>
                    <p>
                        Após análise do percurso do formando verificou-se que este

                        <span id="caracteristicas-r" style="font-weight: bold;color: blue">
                CARACTERISTICAS - POR PREENCHER
            {{-- bom comportamento, revelando interesse e vontade de concluir a UFCD,--}}
        </span>, pelo que ficou decidido


                        <span id="decisao-r" style="font-weight: bold;color: blue">

                        POR PREENCHER
                        </span><span id="estrategia-adotada-r" style="font-weight: bold;color: blue">
        POR PREENCHER
        </span>.
                    </p>
                    <p>
                        Nada mais havendo a tratar, deu-se por encerrada a reunião.
                    </p>
                </div>
                <div id="recuperacao-lista-presenca-r" style="margin: 10px 0px">
                    <div style="margin:10px; text-align: center; font-weight: bolder; font-size: large">LISTA DE PRESENÇAS
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">Nome</th>
                            <th style="text-align: center">Rubrica</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="align-middle">{{$coordenador->name}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="align-middle">{{$reuniao->users[0]->name}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>


                </div>

                <div id="recuperacao-rodape-r" style="margin: 30px 0px 0px">
                    <div style="border-top: 1px solid black">
                        <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                            <div>Cod:T-F-032 30-11-2006</div>
                            <div style="font-weight: bold">1/1</div>
                        </div>
                        <div style="display: flex; justify-content: center; align-items: flex-start">
                            <div style="margin: 0px 5px">
                                <img style="width: 120px" src="{{asset('/images/portugal2020.jpg')}}" alt="PT">
                            </div>
                            <div style="margin: 0px 5px">
                                <img style="width: 120px" src="{{asset('/images/fseeu.png')}}" alt="UE">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div style="display: flex;flex-direction: column;align-items: center; justify-content: center">--}}
{{--    <div--}}
{{--        style="background-color: lightgoldenrodyellow"--}}
{{--        class="container col-4 rounded-lg p-2 mt-2 mb-3 text-center ">--}}

{{--        <div class="text-center">--}}

{{--            <button type="submit" form="form-ata-recuperacao-r" class="btn btn-success">Gravar ata</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




<div style="display: none">

    <form id="form-ata-recuperacao-r" name="form-ata-recuperacao-r" method="POST"
          action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/save-ata-recuperacao') }}">
        @csrf
        <textarea form="form-ata-recuperacao-r"
                  name="textoRecuperacao"
                  id="texto-ata-recuperacao-r"
                  cols="30"
                  rows="10">
        </textarea>
    </form>

</div>

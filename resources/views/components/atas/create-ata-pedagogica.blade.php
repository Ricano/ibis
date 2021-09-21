<div style="display: flex; justify-content: center">



    <div class="row text-center align-items-center mt-3 ">
        <h5 class="col-12">Estado da Ata</h5>
        @if($ata->impressa)
            <h3 style="color: var(--green)" class="col-12" >-- Por Gravar --</h3>
        @else
            <h3  style="color: var(--red)" class="col-12">-- Por completar --</h3>
        @endif
    </div>

</div>

<a id="botao-voltar-atras-pedagogica-r" class="btn btn-success" style="margin-left: 20%" href="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id) }}">Voltar</a>

<div id="pre-visualizacao-ata-pedagogica">


    <div style="display: flex;justify-content: center;padding: 30px">
        <div id="pedagogica-pdf-r"
             style="box-shadow: black 1px 4px 10px 5px; display: flex;flex-direction: column;justify-content: flex-start ;background-color: white;width: 840px;height: 1188px; padding:50px 80px 50px">
            <h1 style="color: rgba(245,10,10,0.5);text-align: center"> PRE-VISUALIZAÇÃO</h1>
            <div  class="pedagogica-logo-atec-container-r">
                <img class="pedagogica-logo-atec-imagem-r" src="{{asset('/images/logoatec.jpg')}}"
                     alt="ATEC-Academia de Formação">
            </div>

            <div class="pedagogica-titulo-r">
                <h3 id="apontador-analise-ok-r"><strong>

                        ATA
                    </strong>
                </h3>
            </div>

            <div  class="pedagogica-tabela-container-introducao-r">
                <table class="table table-bordered table-sm pedagogica-tabela-introducao-r">
                    <thead>
                    <tr style="line-height: 15px">
                        <th colspan="4" class="text-center table-active">CURSO</th>
                    </tr>
                    </thead>
                    <tbody>
                    <colgroup>
                        <col>
                        <col style="width:50%">
                    </colgroup>
                    <tr style="line-height: 20px">
                        <th class="align-middle">Nome:</th>
                        <td>{{$turma->grouptype->description}}</td>
                        <th class="align-middle">Abrev.:</th>
                        <td class="align-middle">{{$turma->group_code}}</td>
                    </tr>
                    <tr style="line-height: 14px">
                        <th>Tipologia:</th>
                        <td>{{$turma->grouptype->coursetype->acronym}}</td>
                        <th>Cód.:</th>
                        <td>{{$turma->center_cost}}</td>

                    </tr>
                    <tr style="line-height: 14px">
                        <th>Local:</th>
                        <td>{{$ata->local}}</td>
                        <th>Data / Hora:</th>
                        <td>{{substr($reuniao->start, 0,-9)}} / {{substr($reuniao->start, 11,-3)}}</td>

                    </tr>
                    </tbody>
                </table>

            </div>

            <div  class="pedagogica-analise-r">
                <h4><strong>
                        ANÁLISE GLOBAL DA TURMA
                    </strong>
                </h4>
                <p style="text-align: justify; margin: 20px 0px; font-size: 0.85rem">
                    {!! $reuniao->coordinator_intro !!}
                </p>

            </div>

            <div  class="pedagogica-rodape-r">
                <div style="border-top: 1px solid black">
                    <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                        <div>Cod: T-F-032 30-11-2006</div>
                        <div style="font-weight: bold">1/{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

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

    {{--2ª página--}}
    <div style="display: flex;justify-content: center;padding: 30px">
        <div
            style="box-shadow: black 1px 4px 10px 5px; display: flex;flex-direction: column;justify-content: flex-start ;background-color: white;width: 840px;height: 1188px; padding:50px 80px 50px">
            <h1 style="color: rgba(245,10,10,0.5);text-align: center"> PRE-VISUALIZAÇÃO</h1>

            <div class="pedagogica-logo-atec-container-r">
                <img class="pedagogica-logo-atec-imagem-r" src="{{asset('/images/logoatec.jpg')}}"
                     alt="ATEC-Academia de Formação">
            </div>
            <h4 style="margin-bottom: 30px"><strong>
                    ANÁLISE DE CADA FORMANDO
                </strong>
            </h4>
            <div>
                <h5 style="margin-bottom: 20px"><strong> {{$feedbacks[0]->aluno->name}}</strong></h5>
                @foreach($feedbacks[0]->feedbacksFormadores as $formador)

                    @if($formador->feedback)
                        <p>{{$formador->formador->name}}: <span
                                style="color:blue"> {{$formador->feedback->description}} </span></p>

                    @else
                        <p>{{$formador->formador->name}}: <span style="color: red">Por preencher.</span></p>

                    @endif

                @endforeach


            </div>


            <div class="pedagogica-rodape-r">
                <div style="border-top: 1px solid black">
                    <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                        <div>Cod: T-F-032 30-11-2006</div>
                        <div style="font-weight: bold">2/{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

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


    {{-- páginas de cada aluno--}}
    @foreach($feedbacks as $feedback)
        @continue($loop->first)
        <div style="display: flex;justify-content: center;padding: 30px">
            <div
                style="box-shadow: black 1px 4px 10px 5px; display: flex;flex-direction: column;justify-content: flex-start ;background-color: white;width: 840px;height: 1188px; padding:50px 80px 50px">
                <h1 style="color: rgba(245,10,10,0.5);text-align: center"> PRE-VISUALIZAÇÃO</h1>

                <div class="pedagogica-logo-atec-container-r">
                    <img class="pedagogica-logo-atec-imagem-r" src="{{asset('/images/logoatec.jpg')}}"
                         alt="ATEC-Academia de Formação">
                </div>

                <div>
                    <h5 style="margin-bottom: 20px"><strong> {{$feedback->aluno->name}}</strong></h5>
                    @foreach($feedback->feedbacksFormadores as $formador)

                        @if($formador->feedback)
                            <p>{{$formador->formador->name}}: <span
                                    style="color:blue"> {{$formador->feedback->description}} </span></p>

                        @else
                            <p>{{$formador->formador->name}}: <span style="color: red">Por preencher.</span></p>

                        @endif

                    @endforeach


                </div>


                <div class="pedagogica-rodape-r">
                    <div style="border-top: 1px solid black">
                        <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                            <div>Cod: T-F-032 30-11-2006</div>
                            <div style="font-weight: bold">{{$loop->index+2}}
                                /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

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

    @endforeach

    <div id="apontador-planos-ok-r"></div>
    {{--  planos de ação--}}
    @if(sizeof($ata->planos)>0)

        <div  style="display: flex;justify-content: center;padding: 30px">
            <div
                style="box-shadow: black 1px 4px 10px 5px; display: flex;flex-direction: column;justify-content: flex-start ;background-color: white;width: 840px;height: 1188px; padding:50px 80px 50px">
                <h1 style="color: rgba(245,10,10,0.5);text-align: center"> PRE-VISUALIZAÇÃO</h1>

                <div class="pedagogica-logo-atec-container-r">
                    <img class="pedagogica-logo-atec-imagem-r" src="{{asset('/images/logoatec.jpg')}}"
                         alt="ATEC-Academia de Formação">
                </div>

                <h4 style="margin: 20px 0"><strong>
                        PLANOS DE AÇÃO
                    </strong>
                </h4>
                <div class="pedagogica-planos-container--r">
                    <table class="table-sm pedagogica-planos-r">
                        <colgroup>
                            <col>
                            <col style="width:60%">
                        </colgroup>
                        <tr style="line-height: 15px; border: 1px solid #b4c6e7; border-bottom: 2px solid #b4c6e7">
                            <th></th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>

                        <tbody style=" border: 1px solid #b4c6e7">

                        <tr>
                            <td class="align-middle p-2" rowspan="3">1</td>
                            <td class="p-2" rowspan="3" style="vertical-align: top">

                                @if($ata->planos[0]->student)

                                    <div><strong style="font-size: 1.05rem">{{$ata->planos[0]->student->name}}</strong>:</div>
                                @else
                                    <p>Performance técnica e de softskills dos restantes formandos.</p>
                                @endif

                                <p> {{$ata->planos[0]->description}}</p></td>
                            <td class="p-2">
                                <div>
                                    <strong>Ação a implementar</strong>:
                                </div>
                                <p>

                                    {{$ata->planos[0]->action}}
                                </p>
                            </td>
                        </tr>
                        <tr style="line-height: 14px">
                            <td class="p-2">
                                <div>
                                    <strong>Intervenientes da implementação</strong>:
                                </div>
                                <p>
                                    {{$ata->planos[0]->intervenientes}}
                                </p>
                            </td>


                        </tr>
                        <tr style="line-height: 14px">
                            <td class="p-2">
                                <div>
                                    <strong>Como vai ser medido e avaliado o impacto da implementação</strong>:
                                </div>
                                <p>
                                    {{$ata->planos[0]->medicao}}
                                </p>
                            </td>


                        </tr>
                        </tbody>
                    </table>

                </div>


                <div class="pedagogica-rodape-r">
                    <div style="border-top: 1px solid black">
                        <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                            <div>Cod: T-F-032 30-11-2006</div>
                            <div style="font-weight: bold">{{sizeof($feedbacks)+2}}
                                /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

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

        @if(sizeof($ata->planos)>1)

            @foreach($ata->planos as $plano)
                @continue($loop->first)
                <div style="display: flex;justify-content: center;padding: 30px">
                    <div
                        style="box-shadow: black 1px 4px 10px 5px; display: flex;flex-direction: column;justify-content: flex-start ;background-color: white;width: 840px;height: 1188px; padding:50px 80px 50px">
                        <div class="pedagogica-logo-atec-container-r">
                            <img class="pedagogica-logo-atec-imagem-r" src="{{asset('/images/logoatec.jpg')}}"
                                 alt="ATEC-Academia de Formação">
                        </div>


                        <div style="margin: 20px 0" class="pedagogica-planos-container--r">
                            <table class="table-sm pedagogica-planos-r">
                                <colgroup>
                                    <col>
                                    <col style="width:60%">
                                </colgroup>
                                <tr style="line-height: 15px; border: 1px solid #b4c6e7; border-bottom: 2px solid #b4c6e7">
                                    <th></th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>

                                <tbody style=" border: 1px solid #b4c6e7">

                                <tr>
                                    <td class="align-middle p-2" rowspan="3">{{$loop->index+1}}</td>
                                    <td class="p-2" rowspan="3" style="vertical-align: top">



                                        @if($plano->student)
                                            <div><strong style="font-size: 1.05rem">{{$plano->student->name}}</strong>:</div>
                                            <p> {{$plano->description}}</p></td>
                                    @else
                                        <p>Performance técnica e de softskills dos restantes formandos.</p>

                                    @endif



                                    <td class="p-2">
                                        <div>
                                            <strong>Ação a implementar</strong>:
                                        </div>
                                        <p>

                                            {{$plano->action}}
                                        </p>
                                    </td>
                                </tr>
                                <tr >
                                    <td class="p-2">
                                        <div>
                                            <strong>Intervenientes da implementação</strong>:
                                        </div>
                                        <p>
                                            {{$plano->intervenientes}}
                                        </p>
                                    </td>


                                </tr>
                                <tr>
                                    <td class="p-2">
                                        <div>
                                            <strong>Como vai ser medido e avaliado o impacto da implementação</strong>:
                                        </div>
                                        <p>
                                            {{$plano->medicao}}
                                        </p>
                                    </td>


                                </tr>
                                </tbody>
                            </table>

                        </div>


                        <div class="pedagogica-rodape-r">
                            <div style="border-top: 1px solid black">
                                <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                                    <div>Cod: T-F-032 30-11-2006</div>
                                    <div style="font-weight: bold">{{sizeof($feedbacks)+2+$loop->index}}
                                        /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

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



            @endforeach


        @endif



    @endif




    {{--lista de presenças--}}
    <div id="apontador-atividades-ok-r" style="display: flex;justify-content: center;padding: 30px">
        <div
            style="box-shadow: black 1px 4px 10px 5px; display: flex;flex-direction: column;justify-content: flex-start ;background-color: white;width: 840px;height: 1188px; padding:50px 80px 50px">
            <h1 style="color: rgba(245,10,10,0.5);text-align: center"> PRE-VISUALIZAÇÃO</h1>

            <div class="pedagogica-logo-atec-container-r">
                <img class="pedagogica-logo-atec-imagem-r" src="{{asset('/images/logoatec.jpg')}}"
                     alt="ATEC-Academia de Formação">
            </div>


            @if($ata->plano_atividades != "")

                <div style="margin: 10px 0px">
                    <h4><strong>
                            PLANO DE ATIVIDADES
                        </strong>
                    </h4>

                    <p>
                        {{$ata->plano_atividades}}
                    </p>

                </div>
            @endif
            @if($ata->anexos != "")
                <div  style="margin: 10px 0px">
                    <h4><strong>
                            ANEXOS
                        </strong>
                    </h4>
                    @foreach(                    explode(',', substr($ata->anexos,1,-1)) as $anexo)
                        <p>
                            {{substr($anexo,1,-1)}}
                        </p>
                    @endforeach
                </div>
            @endif

            <div  style="margin: 10px 0px">
                <div style="margin:10px; text-align: center; font-weight: bolder; font-size: large">LISTA DE
                    PRESENÇAS
                </div>
                <table class="table table-sm table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">Nome</th>
                        <th style="text-align: center">Rubrica</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reuniao->users as $participante)
                        <tr>
                            <td class="align-middle">{{$participante->name}}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>


            <div class="pedagogica-rodape-r">
                <div style="border-top: 1px solid black">
                    <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                        <div>Cod: T-F-032 30-11-2006</div>
                        <div style="font-weight: bold">{{sizeof($feedbacks)+2+sizeof($ata->planos)}}
                            /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

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






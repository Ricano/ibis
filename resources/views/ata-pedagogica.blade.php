<div style="padding: 36px">


    {{-- 1ª página--}}
    <div >

        <div style="display: flex;justify-content: flex-start ; padding:0 24px">
            <div style="text-align: right; width: 100%">

                <img style="width: 140px; margin-top: 20px" src="images/logoatec.jpg"
                     alt="ATEC-Academia de Formação">
            </div>


        </div>

        <h2 style="text-align: left; width: 100%;margin-top: 24px">
            <b>

                ATA
            </b>
        </h2>

        <div style="margin: 30px 0">
            <table cellpadding="3px" class="table-sm" style=" width: 100%; border: 1px solid lightgray; background-color:#eeeeff">
                <thead>
                <tr style="border-bottom: 1px solid black; line-height: 15px">
                    <th colspan="4" style="background-color: #eeeeff; text-align: center">CURSO</th>
                </tr>
                </thead>
                <tbody style="background-color: white">
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
                    <td>{{$turma->grouptype->coursetype->acronym}}</td>
                    <th>Data / Hora:</th>
                    <td>{{substr($reuniao->start, 0,-9)}} / {{substr($reuniao->start, 11,-3)}}</td>

                </tr>
                </tbody>
            </table>

        </div>

        <div class="pedagogica-analise-r">
            <h3><b>
                    ANÁLISE GLOBAL DA TURMA
                </b>
            </h3>
            <p style="text-align: justify; margin: 20px 0px; font-size: 0.85rem">
                {!! $reuniao->coordinator_intro !!}
            </p>

        </div>

        <div style="border-top: 1px solid black; position: fixed;
                bottom: 0px;
                left: 56px;
                right: 0px;
                height: 80px;
                ">
            <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                <div>Cod: T-F-032 30-11-2006</div>
                <div style=" text-align: right;font-weight: bold">1/{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

            </div>
            <div style="display: flex; justify-content: center; align-items: flex-start">
                <div style="text-align: center;margin: 0px 5px">
                    <img style="padding-right: 100px;width: 90px" src="images/portugal2020.jpg" alt="PT">
                </div>
                <div style="text-align: center;margin: 0px 5px">
                    <img style="padding-left: 100px;width: 90px" src="images/fseeu.png" alt="UE">
                </div>
            </div>


        </div>

    </div>

    <div style="page-break-after: always"></div>

    <div>
        <div style="display: flex;justify-content: flex-start ; padding:0 24px">
            <div style="text-align: right; width: 100%">

                <img style="width: 140px; margin-top: 20px" src="images/logoatec.jpg"
                     alt="ATEC-Academia de Formação">
            </div>


        </div>


        <h3 style="margin-bottom: 30px"><b>
                ANÁLISE DE CADA FORMANDO
            </b>
        </h3>
        <div>
            <h3 style="margin-bottom: 20px"> {{$feedbacks[0]->aluno->name}}</h3>
            @foreach($feedbacks[0]->feedbacksFormadores as $formador)

                @if($formador->feedback)
                    <p style="font-weight: bolder"> {{$formador->formador->name}}: <span style="font-weight: normal"
                        > {{$formador->feedback->description}} </span></p>

                @else
                    <p>{{$formador->formador->name}}: <span>Por preencher.</span></p>

                @endif

            @endforeach


        </div>


        <div style="border-top: 1px solid black; position: fixed;
                bottom: 0px;
                left: 56px;
                right: 0px;
                height: 80px;
                ">
            <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                <div>Cod: T-F-032 30-11-2006</div>
                <div style=" text-align: right;font-weight: bold">2/{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

            </div>
            <div style="display: flex; justify-content: center; align-items: flex-start">
                <div style="text-align: center;margin: 0px 5px">
                    <img style="padding-right: 100px;width: 90px" src="images/portugal2020.jpg" alt="PT">
                </div>
                <div style="text-align: center;margin: 0px 5px">
                    <img style="padding-left: 100px;width: 90px" src="images/fseeu.png" alt="UE">
                </div>
            </div>
        </div>

    </div>
    <div style="page-break-after: always"></div>

    @foreach($feedbacks as $feedback)
        @continue($loop->first)



        <div>
            <div style="display: flex;justify-content: flex-start ; padding:0 24px">
                <div style="text-align: right; width: 100%">

                    <img style="width: 140px; margin-top: 20px" src="images/logoatec.jpg"
                         alt="ATEC-Academia de Formação">
                </div>


            </div>

            <div>
                <h3 style="margin-bottom: 20px"> {{$feedback->aluno->name}}</h3>
                @foreach($feedback->feedbacksFormadores as $formador)

                    @if($formador->feedback)
                        <p style="font-weight: bolder"> {{$formador->formador->name}}: <span style="font-weight: normal"
                            > {{$formador->feedback->description}} </span></p>

                    @else
                        <p>{{$formador->formador->name}}: <span>Por preencher.</span></p>

                    @endif

                @endforeach


            </div>


            <div style="border-top: 1px solid black; position: fixed;
                bottom: 0px;
                left: 56px;
                right: 0px;
                height: 80px;
                ">
                <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                    <div>Cod: T-F-032 30-11-2006</div>
                    <div style=" text-align: right;font-weight: bold">{{$loop->index+2}}
                        /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

                </div>
                <div style="display: flex; justify-content: center; align-items: flex-start">
                    <div style="text-align: center;margin: 0px 5px">
                        <img style="padding-right: 100px;width: 90px" src="images/portugal2020.jpg" alt="PT">
                    </div>
                    <div style="text-align: center;margin: 0px 5px">
                        <img style="padding-left: 100px;width: 90px" src="images/fseeu.png" alt="UE">
                    </div>
                </div>
            </div>
        </div>

        <div style="page-break-after: always"></div>

    @endforeach


    @if(sizeof($ata->planos)>0)


        <div>
            <div style="display: flex;justify-content: flex-start ; padding:0 24px">
                <div style="text-align: right; width: 100%">

                    <img style="width: 140px; margin-top: 20px" src="images/logoatec.jpg"
                         alt="ATEC-Academia de Formação">
                </div>


            </div>

            <h3 style="margin-bottom: 30px"><b>
                    PLANOS DE AÇÃO
                </b>
            </h3>

            <div style="margin: 30px 0">
                <table cellpadding="3px" class="table-sm" style=" border: 1px solid lightgray; background-color:#eeeeff">
                    <colgroup>
                        <col>
                        <col style="width:60%">
                    </colgroup>
                    <tr style="line-height: 15px; border: 1px solid #b4c6e7; border-bottom: 2px solid #b4c6e7">
                        <th></th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>

                    <tbody style="background-color: white; border: 1px solid #b4c6e7">

                    <tr>
                        <td class="align-middle p-2" rowspan="3">1</td>
                        <td class="p-2" rowspan="3" style="vertical-align: top">
                            @if($ata->planos[0]->student)
                                <div><strong style="font-size: 1.05rem">{{$ata->planos[0]->student->name}}</strong>:</div>
                                <p> {{$ata->planos[0]->description}}</p></td>
                        @else
                            <p>Performance técnica e de softskills dos restantes formandos.</p>

                        @endif
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


            <div style="border-top: 1px solid black; position: fixed;bottom: 0px;left: 56px;right: 0px;height: 80px;">
                <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                    <div>Cod: T-F-032 30-11-2006</div>
                    <div style=" text-align: right;font-weight: bold">{{sizeof($feedbacks)+2}}
                        /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

                </div>
                <div style="display: flex; justify-content: center; align-items: flex-start">
                    <div style="text-align: center;margin: 0px 5px">
                        <img style="padding-right: 100px;width: 90px" src="images/portugal2020.jpg" alt="PT">
                    </div>
                    <div style="text-align: center;margin: 0px 5px">
                        <img style="padding-left: 100px;width: 90px" src="images/fseeu.png" alt="UE">
                    </div>
                </div>
            </div>


        </div>
        <div style="page-break-after: always"></div>


        @if(sizeof($ata->planos)>1)

            @foreach($ata->planos as $plano)
                @continue($loop->first)

                <div>
                    <div style="display: flex;justify-content: flex-start ; padding:0 24px">
                        <div style="text-align: right; width: 100%">

                            <img style="width: 140px; margin-top: 20px" src="images/logoatec.jpg"
                                 alt="ATEC-Academia de Formação">
                        </div>


                    </div>

                    <div style="margin: 30px 0">
                        <table cellpadding="3px" class="table-sm"
                               style=" border: 1px solid lightgray; background-color:#eeeeff">
                            <colgroup>
                                <col>
                                <col style="width:60%">
                            </colgroup>
                            <tr style="line-height: 15px; border: 1px solid #b4c6e7; border-bottom: 2px solid #b4c6e7">
                                <th></th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>

                            <tbody style="background-color: white; border: 1px solid #b4c6e7">

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
                            <tr style="line-height: 14px">
                                <td class="p-2">
                                    <div>
                                        <strong>Intervenientes da implementação</strong>:
                                    </div>
                                    <p>
                                        {{$plano->intervenientes}}
                                    </p>
                                </td>


                            </tr>
                            <tr style="line-height: 14px">
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

                    <div
                        style="border-top: 1px solid black; position: fixed;bottom: 0px;left: 56px;right: 0px;height: 80px;">
                        <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                            <div>Cod: T-F-032 30-11-2006</div>
                            <div style=" text-align: right;font-weight: bold"> {{sizeof($feedbacks)+2+$loop->index}}
                                /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

                        </div>
                        <div style="display: flex; justify-content: center; align-items: flex-start">
                            <div style="text-align: center;margin: 0px 5px">
                                <img style="padding-right: 100px;width: 90px" src="images/portugal2020.jpg" alt="PT">
                            </div>
                            <div style="text-align: center;margin: 0px 5px">
                                <img style="padding-left: 100px;width: 90px" src="images/fseeu.png" alt="UE">
                            </div>
                        </div>
                    </div>

                </div>

                <div style="page-break-after: always"></div>
            @endforeach
        @endif
    @endif


    <div>
        <div style="display: flex;justify-content: flex-start ; padding:0 24px">
            <div style="text-align: right; width: 100%">

                <img style="width: 140px; margin-top: 20px" src="images/logoatec.jpg"
                     alt="ATEC-Academia de Formação">
            </div>


        </div>


        @if($ata->plano_atividades != "")

            <div style="margin: 20px 0px">
                <h3>
                    PLANO DE ATIVIDADES

                </h3>

                <p>
                    {{$ata->plano_atividades}}
                </p>

            </div>
        @endif
        @if($ata->anexos != "")
            <div style="margin: 10px 0px">
                <h3> ANEXOS
                </h3>
                @foreach(                    explode(',', substr($ata->anexos,1,-1)) as $anexo)
                    <p>
                        {{substr($anexo,1,-1)}}
                    </p>
                @endforeach
            </div>
        @endif

        <div style="margin: 10px 0px">
            <h3><b>
                    LISTA DE PRESENÇAS
                </b>
            </h3>


            <div style="margin: 30px 0">
                <table cellpadding="3px" class="table-sm" style=" width: 100%; border: 1px solid lightgray; background-color:#eeeeff">
                    <colgroup>
                        <col span="1" style="width: 80%;">
                        <col span="1" style="width: 20%;">
                    </colgroup>
                    <thead>
                    <tr style="line-height: 15px; border: 1px solid #b4c6e7; border-bottom: 2px solid #b4c6e7">
                        <th style="text-align: center">Nome</th>
                        <th style="text-align: center">Rubrica</th>
                    </tr>
                    </thead>


                    <tbody style="background-color: white; border: 1px solid #b4c6e7">


                    @foreach($reuniao->users as $participante)
                        <tr>
                            <td class="align-middle">{{$participante->name}}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>


                </table>

            </div>


            <div style="border-top: 1px solid black; position: fixed;bottom: 0px;left: 56px;right: 0px;height: 80px;">
                <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                    <div>Cod: T-F-032 30-11-2006</div>
                    <div style=" text-align: right;font-weight: bold">{{sizeof($feedbacks)+2+sizeof($ata->planos)}}
                        /{{sizeof($feedbacks)+2+sizeof($ata->planos)}}</div>

                </div>
                <div style="display: flex; justify-content: center; align-items: flex-start">
                    <div style="text-align: center;margin: 0px 5px">
                        <img style="padding-right: 100px;width: 90px" src="images/portugal2020.jpg" alt="PT">
                    </div>
                    <div style="text-align: center;margin: 0px 5px">
                        <img style="padding-left: 100px;width: 90px" src="images/fseeu.png" alt="UE">
                    </div>
                </div>
            </div>


        </div>
    </div>





</div>

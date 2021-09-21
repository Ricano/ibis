<section class="mb-4">
    <div class="container w-100 bg-white rounded-lg text-center table-users">
        <h2 class="border-bottom p-3 mt-2 mb-3">Reunião de {{$reuniao->meetingType->name}}</h2>
        <div class="row align-items-center">

            <h5 class="w-100 text-left ml-5"><b>UFCD: </b><ata-number id="ata-recuperacao-form-ufcd-numero-r">{{$ata->ufcd->number}}</ata-number> <ata-name id="ata-recuperacao-form-ufcd-nome-r">{{$ata->ufcd->name}}</ata-name></h5>

            {{--        </div>--}}
            {{--    </div>--}}

            {{--    <div class="container w-75 bg-white rounded-lg p-2 mt-3 mb-2">--}}
            {{--        <div class="row text-center align-items-center">--}}
            <h5 class="w-100 text-left ml-5"><b>Aluno:</b> {{$alunosDaReuniao[0]->name}}</h5>
            {{--        </div>--}}
            {{--        <div class="row text-center align-items-center">--}}


            <h5 class="w-100 text-left ml-5 mb-4"><b>Formador:</b> {{$formadoresDaReuniao[0]->name}}</h5>
        </div>
        @if(Request::is('ibis/'. $turma->id . '/meetings/' . $reuniao->id))
            <div class="row text-center align-items-center mt-3">

                @if($ata->impressa)
                    <h3 class="col-12">Ata da reunião -
                        <a href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/get-ata')}}">Disponível</a>
                    </h3>
                @else
                    <h3 class="col-12">Ata da reunião:  <ata class="text-danger">Não disponível</ata></h3>
                @endif
            </div>
            @if(!$ata->impressa)
                <div class="text-center p-3">
                    <a href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/ata/'.$reuniao->meetingType->id)}}"
                       class="btn btn-success">Criar ata</a>
                </div>
            @endif
        @endif
    </div>



</section>

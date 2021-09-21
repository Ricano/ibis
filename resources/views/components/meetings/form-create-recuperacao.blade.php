<div class="row justify-content-center">
    <div class="container createClass w-50">
        <div class="row">
            <div class="card-body bg-white justify-content-center p-5 row">
                <div class="row justify-content-between">
                    <div>
                        <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                    </div>
                    {{--                    <div class="card-header bg-dark align-items-center" id="c-headerRec"; style="margin:0 -33px 0 0; border-radius: 15px 0 0 15px">--}}
                    <h4 class="meetingTitle">Nova Reunião de Recuperação</h4>
                    {{--                    </div>--}}
                </div>

                <div class="form-group">
                    <div class="p-2" id="create-meeting-recuperacao-r">
                        <div class="">
                            <h3>Formador</h3>
                            <select onchange="meterFormadorNaReuniaoRecuperacao()" class="form-control mb-3"
                                    id="formador-escolha-recuperacao-r">
                                <option selected disabled>Selecione o formador</option>
                                @foreach($formadoresDaTurma as $formador)
                                    <option value="{{$formador->id}}">{{$formador->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h3>Aluno</h3>

                            <select onchange="meterAlunoNaReuniaoRecuperacao()" class="form-control mb-3"
                                    id="aluno-escolha-recuperacao-r">
                                <option selected disabled>Selecione o aluno</option>
                                @foreach($alunos as $aluno)
                                    <option value="{{$aluno->id}}">{{$aluno->name}} - {{$aluno->student_number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <h3>UFCD</h3>

                            <select onchange="meterUfcdNaReuniaoRecuperacao()" class="form-control mb-3"
                                    id="ufcd-escolha-recuperacao-r">
                                <option selected disabled>Selecione a UFCD</option>
                                @foreach($ufcds as $ufcd)
                                    <option @if($loop->odd)style="background-color: #dafaff"
                                            @endif value="{{$ufcd->id}}">{{$ufcd->number}} - {{$ufcd->name}}</option>
                                @endforeach
                            </select>


                        </div>
                        <div class="form-group w-50">
                            <h3>Início</h3>
                            @browser('isFirefox')
                            <input onchange="meterInicioNaReuniaoRecuperacao()" id="inicio-escolha-recuperacao-r"
                                   type='date' name="inicio" class="form-control @error('inicio') is-invalid @enderror"/>
                            @else
                                <input onchange="meterInicioNaReuniaoRecuperacao()" id="inicio-escolha-recuperacao-r"
                                       type='datetime-local' name="inicio" class="form-control @error('inicio') is-invalid @enderror"/>
                                @endbrowser
                                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
                                @error('inicio')
                                <span class="text-danger">
                <strong>{{$message}}</strong>
            </span>
                                @enderror

                        </div>
                        <div class="form-group w-50">
                            <h3>Fim</h3>
                            @browser('isFirefox')
                            <input onchange="meterFimNaReuniaoRecuperacao()" id="fim-escolha-recuperacao-r"
                                   type='date' name="fim" class="form-control @error('fim') is-invalid @enderror"/>
                            @else
                                <input onchange="meterFimNaReuniaoRecuperacao()" id="fim-escolha-recuperacao-r"
                                       type='datetime-local' name="fim" class="form-control @error('fim') is-invalid @enderror"/>
                                @endbrowser
                                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
                                @error('fim')
                                <span class="text-danger">
                 <strong>{{$message}}</strong>
            </span>
                                @enderror


                        </div>
                        <a href="{{url('ibis/'.$turma->id.'/choose-meeting')}}">
                            <button class="btn btn-dark" style="width: 150px">
                                Voltar
                            </button>
                        </a>
                        <button type="submit" form="form-nova-reuniao-recuperacao-r" class="btn btn-primary" style="width: 150px">
                            Confirmar
                        </button>
                    </div>



                    <div hidden class="col-3 container bg-danger p-3 text-white">
                        <div class="bg-dark p-2 m-0" style="display:flex; flex-direction:column; align-items:center">
                            <h5 class="text-center p-0" style="align-self: center">
                                Nova Reunião
                            </h5>
                            <div class="p-1"
                                 style="display:flex;flex-direction: column;align-items: center;justify-content: space-around;width: 100%">
                                <div class="p-0">
                                    Formador
                                </div>
                                <div id="formador-resumo-recuperacao-r" class="p-0"
                                     style="font-size: 0.7rem;height: 200px; overflow: auto">
                                </div>
                            </div>
                            <div class="p-1"
                                 style="display:flex;flex-direction: column;align-items: center;justify-content: space-around;width: 100%">
                                <div class="p-0">
                                    Aluno
                                </div>
                                <div id="aluno-resumo-recuperacao-r" class="p-0"
                                     style="display:flex;flex-direction: column;align-items: center;justify-content: space-around;width: 100%">
                                </div>
                            </div>
                            <div class="p-1"
                                 style="display:flex;flex-direction: column;align-items: center;justify-content: space-around;width: 100%">
                                <div class="p-0">
                                    UFCD
                                </div>
                                <div id="ufcd-resumo-recuperacao-r" class="bg-dark text-white">
                                </div>

                            </div>
                            <div class="p-1"
                                 style="display:flex;flex-direction: column;align-items: center;justify-content: space-around;width: 100%">
                                <div class="p-0">
                                    Data e hora
                                </div>
                                <div id="inicio-resumo-recuperacao-r" class="bg-dark text-white">
                                </div>
                            </div>
                            <div class="p-1"
                                 style="display:flex;flex-direction: column;align-items: center;justify-content: space-around;width: 100%">
                                <div class="p-0">
                                    Data e hora
                                </div>
                                <div id="fim-resumo-recuperacao-r" class="bg-dark text-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form hidden id="form-nova-reuniao-recuperacao-r" method="POST" action="{{ url('ibis/'.$turma->id.'/create-meeting') }}">
                    @csrf
                    turma
                    <input type="text" id="turma-formulario-recuperacao-r" name="turma" value="{{$turma->id}}">
                    tipo
                    <input type="text" id="tipo-formulario-recuperacao-r" name="tipo" value="{{$tipo->id}}">
                    formador
                    <input type="text" id="formador-formulario-recuperacao-r" name="formadores[]">
                    aluno
                    <input type="text" id="aluno-formulario-recuperacao-r" name="alunos[]">
                    ufcd
                    <input type="text" id="ufcd-formulario-recuperacao-r" name="ufcd">
                    início
                    <input type="text" id="inicio-formulario-recuperacao-r" name="inicio">
                    fim
                    <input type="text" id="fim-formulario-recuperacao-r" name="fim">
                </form>

            </div>
        </div>
    </div>
</div>

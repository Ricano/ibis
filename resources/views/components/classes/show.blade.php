<section>
    <div class="container">
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-6"  style="display: flex; justify-content: space-around">
                <button class="btn btn-info" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide-to="0">
                    <span class="visually-hidden" style="color: white">Reuniões</span>
                </button>
                <button class="btn btn-info" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide-to="1">
                    <span class="visually-hidden" style="color: white">Alunos</span>
                </button>
                <button class="btn btn-info" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide-to="2">
                    <span class="visually-hidden" style="color: white">Formadores</span>
                </button>
            </div>
        </div>
    </div>
</section>


<section class="m-5" style="display: flex; justify-content: center;">
    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h3>Reuniões</h3>
                <table class="table d-block text-center">
                    <thead >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data da criação</th>
                        <th scope="col">Data de fim</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ata</th>
                        @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                            <th scope="col">Preencher Feedback</th>
                        @else
                            <th scope="col">Gerir</th>

                        @endif
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reunioes as $reuniao)
                        @if(Auth::user()->role_id === 3 || Auth::user()->id === 2 && Auth::user()->id !== $turma->user_id)
                            @foreach($reuniao->users as $teacher)
                                @if(Auth::user()->id === $teacher->id)
                                    <tr class="text-center">
                                        <th class="align-middle" scope="col">{{$reuniao->id}}</th>
                                        <th class="align-middle" scope="col">{{$reuniao->start}}</th>
                                        <th scope="col"
                                            class="align-middle bg-transparent"
                                        >{{$reuniao->end}}</th>
                                        <th class="align-middle" scope="col">{{$reuniao->meetingtype->name}}</th>
                                        <th class="align-middle" scope="col">
                                            @if($reuniao->ata->first()->impressa)
                                                <a href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/get-ata')}}">Disponível</a>
                                            @else
                                                Por elaborar
                                            @endif
                                        </th>

                                            <th class="align-middle" scope="col">
                                        @if($reuniao->ata[0]->impressa)

                                                Ata Completa
                                        @else
                                                <a href="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id) }}" class="btn btn-info">+</a>
                                        @endif
                                            </th>

                                            <th class="align-middle" scope="col">
                                            @if( ($reuniao->ata[0]->impressa == 0) && (strtotime($reuniao->end) <= strtotime(\Carbon\Carbon::now()->timezone('Europe/Lisbon')->toDateTimeString())))
                                                <div class="text-danger">Em atraso</div>

                                            @else
                                                <div></div>
                                            @endif
                                            </th>






                                    </tr>
                                @endif
                            @endforeach
                        @else

{{--@if($reuniao->meeting_type_id == 1)--}}

{{--                            <tr class="text-center" style="background-color: rgba(100,230,100,0.25)" >--}}
{{--     @else--}}
{{--                            <tr class="text-center" style="background-color: rgba(100,230,230,0.25)">--}}
{{--                                     @endif--}}

                                <th class="align-middle" scope="col">{{$reuniao->id}}</th>
                                <th class="align-middle" scope="col">{{$reuniao->start}}</th>
                                <th scope="col"
                                        class="align-middle bg-transparent"
                                >{{$reuniao->end}}</th>
                                <th class="align-middle" scope="col">{{$reuniao->meetingtype->name}}</th>
                                <th class="align-middle" scope="col">
                                    @if($reuniao->ata->first()->impressa)
                                        <a href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/get-ata')}}">Disponível</a>
                                    @else
                                        Por elaborar
                                    @endif
                                </th>
                                <th class="align-middle" scope="col">
                                    @if($reuniao->ata[0]->impressa)

                                        Ata Completa
                                    @else
                                        <a href="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id) }}" class="btn btn-info">+</a>
                                    @endif
                                </th>

                                <th class="align-middle" scope="col">
                                    @if( ($reuniao->ata[0]->impressa == 0) && (strtotime($reuniao->end) <= strtotime(\Carbon\Carbon::now()->timezone('Europe/Lisbon')->toDateTimeString())))
                                        <div class="text-danger">Em atraso</div>

                                    @else
                                        <div></div>
                                    @endif
                                </th>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

            </div>

            <div class="carousel-item c-item">
                <h3>Alunos</h3>
                <table class="table d-block" id="lista-alunos-turma-r">
                    <thead>
                    <tr>
                        <th scope="col" onMouseOver="this.style.cursor='pointer'" onclick="ordenarTabelaPorNome('lista-alunos-turma-r')">Nome</th>
                        <th scope="col">Número</th>
                        @if(Auth::user()->role_id === 1 || Auth::user()->id === $turma->user_id)
                            <th scope="col">Detalhes</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alunos as $user)
                        <tr>
                            <th scope="col">{{$user->name}}</th>
                            <th scope="col">{{$user->student_number}}</th>
                            @if(Auth::user()->role_id === 1 || Auth::user()->id === $turma->user_id)
                                <th scope="col" class="align-middle">
                                    <a href="{{url('/ibis/'. $turma->id .'/students/'. $user->id .'/info')}}"
                                        class="btn btn-info">
                                        +
                                    </a>
                                </th>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            <div class="carousel-item c-item">
                <h3>Formadores</h3>
                <table class="table d-block" id="lista-formadores-turma-r">
                    <thead>
                    <tr class="text-center">
                        <th scope="col"  onMouseOver="this.style.cursor='pointer'" onclick="ordenarTabelaPorNome('lista-formadores-turma-r')">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        @if(Auth::user()->role_id === 1 || Auth::user()->id === $turma->user_id)
                            <th scope="col">Detalhes</th>
                        @endif
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($formadores as $user)
                        <tr class="text-center">
                            <th scope="col">{{$user->name}}</th>
                            <th scope="col">{{$user->email}}</th>
                            <th scope="col">{{$user->telephone}}</th>
                            @if(Auth::user()->role_id === 1 || Auth::user()->id === $turma->user_id)
                                <th class="align-middle">
                                    <a href="{{url('/ibis/'. $turma->id .'/users/'. $user->id .'/info')}}" class="btn btn-info">+</a>
                                </th>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



{{--3 tabelas fora do carrossel}}--}}

{{--<section>--}}
{{--    <h3>Alunos nesta turma</h3>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">Nome</th>--}}
{{--            <th scope="col">Número</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        @foreach($alunos as $user)--}}


{{--            <tr>--}}
{{--                <th scope="col">{{$user->name}}</th>--}}
{{--                <th scope="col">{{$user->student_number}}</th>--}}
{{--            </tr>--}}
{{--        @endforeach--}}


{{--        </tbody>--}}
{{--    </table>--}}
{{--</section>--}}


{{--<section>--}}
{{--    <h3>Formadores nesta turma</h3>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">Nome</th>--}}
{{--            <th scope="col">Email</th>--}}
{{--            <th scope="col">Telefone</th>--}}
{{--            <th scope="col">Detalhes</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        @foreach($formadores as $user)--}}


{{--            <tr>--}}
{{--                <th scope="col">{{$user->name}}</th>--}}
{{--                <th scope="col">{{$user->email}}</th>--}}
{{--                <th scope="col">{{$user->telephone}}</th>--}}
{{--                <th scope="col"><a class="btn btn-info">+</a></th>--}}
{{--            </tr>--}}
{{--        @endforeach--}}


{{--        </tbody>--}}
{{--    </table>--}}
{{--</section>--}}


{{--<section>--}}
{{--    <h3>Reuniões desta turma</h3>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">ID</th>--}}
{{--            <th scope="col">Data da criação</th>--}}
{{--            <th scope="col">Data de fim</th>--}}
{{--            <th scope="col">Tipo</th>--}}
{{--            <th scope="col">Estado</th>--}}
{{--            <th scope="col">Ata</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        @foreach($reunioes as $reuniao)--}}


{{--            <tr>--}}
{{--                <th scope="col">{{$reuniao->id}}</th>--}}
{{--                <th scope="col">{{$reuniao->start}}</th>--}}
{{--                <th scope="col">{{$reuniao->end}}</th>--}}
{{--                <th scope="col">{{$reuniao->meeting_type_id}}</th>--}}
{{--                <th scope="col">--}}
{{--                    @if($reuniao->end > date("Y-m-d h:i:s"))--}}
{{--                        aberta--}}
{{--                    @else--}}
{{--                        fechada--}}
{{--                    @endif--}}


{{--                </th>--}}
{{--                <th scope="col"><a class="btn btn-info">+</a></th>--}}
{{--            </tr>--}}
{{--        @endforeach--}}


{{--        </tbody>--}}
{{--    </table>--}}
{{--    {{$reunioes->links()}}--}}
{{--</section>--}}


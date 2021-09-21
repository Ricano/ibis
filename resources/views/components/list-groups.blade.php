@component('components.page-header.header')
@endcomponent

@if($groups->isEmpty())
    <div
        style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin-top: 200px;">
        <h2>Ainda não foi adicionada qualquer turma!</h2>
        <hr>
        <h5>Utilize a opção <strong>CRIAR TURMA</strong> na barra de navegação
            para adicionar a sua primeira turma, ou clique <a href="{{url(Request::path() . '/create-class')}}">aqui</a>.
        </h5>
    </div>
@endif



<div id="lg-row" class="row">
    @foreach($groups as $group)

        @if($group->user_id === Auth::user()->id || Auth::user()->role_id === 1)
            <div class="form-group col-sm" style="display: flex; justify-content: center">
                <a id="lg-card-link" class="card-link" href="{{ url('ibis/'.$group->id)}}">
                    <div id="lg-card" class="card" style="width: 15vw; ">
                        <div style="display: flex; justify-content: space-between">
                            <div style="border-radius: 0 10px 10px 0;
                            width: fit-content;padding-right:15px;margin-left:-20px;
                            background-color: {{$group->groupType->courseType->color}} ">
                                <div style="margin-left:10px" id="lg-card-tipo-de-curso-r"
                                     class="text-white">{{$group->groupType->courseType->acronym}}</div>
                            </div>
                            @foreach($group->students as $student)
                                @foreach($student->meetings as $meeting)
                                    @if($meeting->ata[0]->impressa == 0)
                                        <div style="position: absolute;
                                                    top: -10px;
                                                    right: -8px;
                                                    padding: 1px 12px;
                                                    border-radius: 50%;
                                                    background-color: #f55555;
                                                    color: white;">
                                            <div style="font-size: 15pt">{{$contagemReunioesAbertas[$group->id]}}</div>
                                        </div>
                                        @break(2)
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div class="card-body">
                            <h4 id="lg-card-title" class="card-title">{{$group->group_code}}</h4>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between">
                            @foreach($users as $user)
                                @if($user->id === $group->user_id)
                                    <div style="font-size: 12px">Coordenador:</div>
                                    <div>{{ $user->name }}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
        @else
            @foreach($teacher->groups as $teacher_group)
                @if($teacher_group->id === $group->id)
                    <div class="form-group col-sm" style="display: flex; justify-content: center">
                        <a id="lg-card-link" class="card-link" href="{{ url('ibis/'.$group->id)}}">
                            <div id="lg-card" class="card" style="width: 15vw; ">
                                <div style="display: flex; justify-content: space-between">
                                    <div style="border-radius: 0 10px 10px 0;
                                                width: fit-content;
                                                padding-right:15px;
                                                margin-left:-20px;
                                                background-color: {{$group->groupType->courseType->color}} ">
                                        <div style="margin-left:10px" id="lg-card-tipo-de-curso-r"
                                             class="text-white">{{$group->groupType->courseType->acronym}}</div>
                                    </div>
                                    @foreach($group->students as $student)
                                        @foreach($student->meetings as $meeting)
                                            @if($meeting->ata[0]->impressa == 0)


                                                <div
                                                    style=" position: absolute;top: -10px;  right: -10px; padding: 5px 10px;width: 30px;height: 30px;  border-radius: 50%;  background-color:#f55555;  color: white;">
                                                    !
                                                </div>
                                                @break(2)
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <h4 id="lg-card-title" class="card-title">{{$group->group_code}}</h4>
                                </div>
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    @foreach($users as $user)
                                        @if($user->id === $group->user_id)
                                            <div style="font-size: 12px">Coordenador:</div>
                                            <div>{{ $user->name }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</div>

<div class="container createClass">
    <div class="row">
        <div class="card-body bg-white justify-content-center p-5 row">
            <div class="row justify-content-between">
                <div>
                    <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                </div>
                <h4 class="meetingTitle">Criar Nova Turma</h4>
            </div>
            <div class="row justify-content-center">
                <div class="p-3">
                    <h2 class="text-center card-header">Escolha o tipo de reunião</h2>
                    <div class="flex-row reunioes">
                        @foreach($tipos as $tipo)
                            <a class="btn btn-primary" href="{{url('ibis/' . $turma->id.'/create-meeting/'.$tipo->id)}}">{{$tipo->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="justify-content-center row">
                @component('components.button-voltar-a-turma', ['turma'=>$turma])
                @endcomponent
            </div>
        </div>
    </div>
</div>


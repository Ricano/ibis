<div class="container" style="">
    <div style="display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 3rem;">
        <a href="{{url('ibis/'.$turma->id)}}" style="text-decoration: none;">
        <div class="card-header c-header bg-light" style="border-radius: 10px; box-shadow: 5px 5px 5px dimgray; padding: 24px 24px 0 24px; border: 0">
            <section style="padding: 0">
                <div>Coordenador: {{ $coordenador->name }}</div>
                <div>ID da Reunião: {{ $reuniao->id }}</div>
                <div>Início: {{ $reuniao->start }}</div>
                <div>Fim: {{ $reuniao->end }}</div>
                <div style="margin-top: 10px; text-align: center; background-color: #1d2124;
                color: white; font-size: 16px; padding: 5px; border: 0 solid black; border-radius: 5px 5px 0 0; margin-bottom: 0">
                    Reunião {{$reuniao->meetingType->name}}
                </div>
            </section>
        </div>
        </a>
        <div style="display: flex; justify-content: center; align-items: center">
                <h1 style="padding-top:20px" class="text-center">Feedbacks sobre o aluno:
                    <span style="color:var(--blue)">{{$aluno->name}}</span>
                </h1>
        </div>
    </div>
</div>

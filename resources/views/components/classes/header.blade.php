<div style="display: flex;
            flex-direction: row;
            justify-content: center;
            margin:0 50px 100px;">
    <div class="card-header row" style="flex-wrap: nowrap; width: 100%; margin-top: 10px;">
        <section class="w-75 mr-5">
            <h2>Turma: {{ $nome }}</h2>
            <h3>Coordenador: {{ $coordenador->name }}</h3>
            <h5>{{ $curso->description }}</h5>
            <h5>{{ $tipo }}</h5>
            <h5>Centro custo: {{ $centro }}</h5>
        </section>
        @if(Auth::user()->role_id === 1 || Auth::user()->id === $turma->user_id)
            @component('components.classes.class-show-buttons', ['turma'=>$turma])
            @endcomponent
        @endif
    </div>
</div>


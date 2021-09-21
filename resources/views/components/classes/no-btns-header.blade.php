<div style="display: flex;
            flex-direction: row;
            justify-content: center;
            margin-bottom: 3rem;">
    <a href="{{url('ibis/'.$turma->id)}}" style="text-decoration: none;">
    <div class="card-header c-header bg-light p-4" style="border-radius: 10px; box-shadow: 5px 5px 5px dimgray">
        <section>
            <h2> {{ $turma->group_code }}</h2>
            <div>Coordenador: {{ $coordenador->name }}</div>
{{--            <h5>{{ $turma->group_code }}</h5>--}}
{{--            <h5>{{ $tipo }}</h5>--}}
            <div>Centro custo: {{ $turma->center_cost }}</div>
        </section>
    </div>
    </a>
</div>

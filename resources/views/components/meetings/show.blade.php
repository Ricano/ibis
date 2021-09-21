<h1>
  Coordenador:   {{$coordenador->name}}
</h1>

<h1>
   Turma:  {{$turma->group_code}}
</h1>
<h1>
    Curso: {{$turma->grouptype->description}}
</h1>
<h1>
    {{$turma->grouptype->coursetype->name}}
</h1>
<h1>
    Centro de custo: {{$turma->center_cost}}
</h1>

<h1>
    Id da reunião: {{$reuniao->id}}
</h1>
<h1>
    Início: {{$reuniao->start}}
</h1>
<h1>
    Fim: {{$reuniao->end}}
</h1>

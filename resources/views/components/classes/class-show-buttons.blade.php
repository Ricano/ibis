<section style="display: flex; flex-direction: column; justify-content: space-evenly;">
    <a href="{{url('ibis/' . $turma->id . '/students')}}"  class="btn btn-primary">Adicionar Alunos</a>
    <a href="{{url('ibis/' . $turma->id . '/users')}}" class="btn btn-primary">Adicionar Formadores</a>
    <a href="{{url('ibis/' . $turma->id.'/choose-meeting')}}" class="btn btn-success">Criar Reunião</a>
    <form action="{{url('ibis/' . $turma->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger w-100">Eliminar turma</button>
    </form>
</section>




<div style="display: flex;flex-direction: column; margin: 30px">


    <h1 style="text-align: center">Feedbacks dados pelo formador: {{$formador->name}}</h1>


    <table class="table table-striped d-block w-100">
        <thead>
        <tr>
            <th scope="col">Aluno</th>
            <th scope="col">Número</th>
            <th scope="col">Feedback</th>
            <th scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alunosNaReuniao as $aluno)
            <tr>
                <th scope="col">{{$aluno->name}}</th>
                <th scope="col">{{$aluno->student_number}}</th>
                <th id="feedback" scope="col"> <i style="color: red"> Ainda não foi dado qualquer feedback.</i>
                </th>
                <th scope="col"><a class="btn-primary btn"  href="/ibis/{{$turma->id}}/meetings/{{$reuniao->id}}/teacher/{{$formador->id}}/student/{{$aluno->id}}">...</a></th>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>

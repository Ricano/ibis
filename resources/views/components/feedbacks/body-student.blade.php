<div style="display: flex;flex-direction: column; margin: 30px; flex-direction: row; justify-content: center">

    <table class="table table-striped" id="fdbk-student-table" style="width: 65%; margin-top: 20px">
        <thead>
        <tr>
            <th scope="col">Formador</th>
            <th scope="col">Email</th>
            <th scope="col">Feedback</th>
            <th scope="col">Editar</th>

        </tr>
        </thead>
        <tbody>
        @foreach($formadoresNaReuniao as $formador)
            @if( Auth::user()->role_id == 2 || Auth::user()->role_id == 1 || Auth::user() == $formador)
                <tr>
                    <th scope="col">{{$formador->name}}</th>
                    <th scope="col">{{$formador->email}}</th>

                    @if($feedbacks[$formador->id])
                        <th id="feedback" scope="col"><i
                                style="color: blue"> {{$feedbacks[$formador->id]->description}}</i>
                        </th>
                    @else
                        <th id="feedback" scope="col"><i style="color: darkred">Ainda não foi dado feedback</i>
                        </th>
                    @endif
                    <th scope="col"><a class="btn-primary btn"
                                       href="/ibis/{{$turma->id}}/meetings/{{$reuniao->id}}/student/{{$aluno->id}}/teacher/{{$formador->id}}">...</a>
                    </th>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>




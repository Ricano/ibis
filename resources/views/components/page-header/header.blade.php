<header style="background: lightsteelblue; margin-top: -25px" class="align-items-center mb-4" >
    <div class="row justify-content-center">
        @if(Request::is('ibis/create-class'))
            <h1 class="pt-3 pb-2">Criar Turma</h1>
        @elseif(Request::is('ibis/users/add-teacher'))
            <h1 class="pt-3 pb-2">Formadores</h1>
        @elseif(Request::is('ibis/users/add-coordinator'))
            <h1 class="pt-3 pb-2">Coordenadores</h1>
        @elseif(Request::is('ibis'))
            <h1 class="pt-3 pb-2">As suas Turmas</h1>
        @endif
    </div>
</header>

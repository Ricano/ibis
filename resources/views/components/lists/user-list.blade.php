<section class="mt-4 container">

    <table class="table bg-light table-users" id="tabela-listagem-users-r">
        <thead class="bg-dark text-white">
        <tr>
            <th scope="col" class="text-center" onMouseOver="this.style.cursor='pointer'" onclick="ordenarTabelaPorNome('tabela-listagem-users-r')">Nome</th>

            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Telefone</th>
            <th scope="col" class="text-center">Detalhes</th>
        </tr>
        </thead>
        <tbody>

        @if(Request::is('ibis/users/add-teacher'))
            @foreach($formadores as $user)
                <tr>
                    <td scope="col" class="text-center">{{$user->name}}</td>
                    <td scope="col" class="text-center">{{$user->email}}</td>
                    <td scope="col" class="text-center">{{$user->telephone}}</td>
                    <td scope="col" class="text-center"><a href="{{url('ibis/users/' . $user->id)}}" class="btn btn-info ml-3">+</a></td>
                </tr>
            @endforeach

        @elseif(Request::is('ibis/users/add-coordinator'))
            @foreach($coordenadores as $user)
                <tr>
                    <td scope="col" class="text-center">{{$user->name}}</td>
                    <td scope="col" class="text-center">{{$user->email}}</td>
                    <td scope="col" class="text-center">{{$user->telephone}}</td>
                    <td scope="col" class="text-center"><a href="{{$user->id}}" class="btn btn-info ml-3">+</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

{{--    @if(Request::is('ibis/users/add-teacher'))--}}
{{--        {{$formadores->links()}}--}}
{{--    @elseif(Request::is('ibis/users/add-coordinator'))--}}
{{--        {{$coordenadores->links()}}--}}
{{--    @endif--}}

</section>

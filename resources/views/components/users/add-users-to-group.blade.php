<div class="container createClass">
    <div class="row">
        <div class="card-body bg-white justify-content-center p-5 row">
            <div class="row justify-content-between">
                <div>
                    <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                </div>
                <h4 class="meetingTitle">Adicionar formadores à turma</h4>
            </div>
            <div class="text-center row">
                <div class="f-box">
                    <h5>Formadores Disponíveis</h5>
                    <ul  onmouseleave="editarFormadoresDaTurma()"  id="sortableEditarFormadoresTurma1" class="formadores-turma-sortable1 sortable_list connectedSortable p-2">
                        {{--@foreach($formadores as $formador)--}}
                        @foreach($formadoresForaDaTurma as $fA)
                            @if($fA->id !== Auth::user()->id)
                                <li class="ui-state-default" value="{{$fA->id}}">{{$fA->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="f-box">
                    <h5>Formadores da Turma</h5>
                    <ul onmouseleave="editarFormadoresDaTurma()" id="sortableEditarFormadoresTurma2" name="editarFormadoresDaTurma"
                        class="formadores-turma-sortable1 sortable_list connectedSortable p-2">
                        @foreach($formadoresDaTurma as $formador)
                            <li class="ui-state-default" value="{{$formador->id}}">{{$formador->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div align="center">
                <div class="text-center btns-adicionarFormadoresATurma w-25 mt-4">

                    <button class="btn-primary btn w-100" type="submit" form="editarFormadoresDaTurma" value="Submit">Finalizar</button>
                </div>
            </div>
        </div>



        <div style="display: none">
            <form id="editarFormadoresDaTurma" method="POST" action="{{ url('ibis/'.$idDaTurma->id.'/users') }}">
                @csrf
                <select id="formEditarFormadoresTurma" name="NovosFormadoresTurma[]" multiple>
                    @foreach($formadoresDaTurma as $formador)
                        <option selected="" value="{{$formador->id}}">{{$formador->name}}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
</div>

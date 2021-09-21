<section id="apontador-analise-ko-r">

    <button class="accordion-analise" style="font-size: 20px;font-weight: bold">Análise Global da Turma<span style="color: indianred; font-size: 12px; margin-left: 50px"> Preenchimento Obrigatório</span></button>
    <div class="panel-l">
        <div class="local-container col-md-12">
            <form id="form-analise-global"  name="form-analise-global" method="POST"
                  action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group" name="analise-global-txt" style="margin-top: 10px">
                    <textarea style="margin-top: 20px" rows="4" name="analise" id="analise-txt" class="form-control textarea-action-plan" ></textarea>
                    <input style="margin-top: 10px" type="submit" class="btn btn-success" value="Gravar" onclick="storeAnaliseWithParagraph()">
                </div>
            </form>
        </div>
    </div>

    {{--    <div class="row p-1" style="border: #1b1e21 5px solid">--}}
    {{--        <div class="col-10">--}}
    {{--            <h4 >--}}
    {{--                {{$reuniao->coordinator_intro}}--}}
    {{--            </h4>--}}
    {{--        </div>--}}
    {{--        <div class="">--}}

    {{--            <button type="button" class="btn btn-primary"  class="mostrar-analise-global"--}}
    {{--                    onClick="escondido('analise-global-txt');">Editar</button>--}}
    {{--        </div>--}}

    {{--        <input type="checkbox" class="form-control" name="mostrar-formadores" id="mostrar-formadores"--}}
    {{--               onClick="alterarVisibilidade(this,'analise_global_txt', 'flex');"/>--}}



    {{--        <form id="form-analise-global"  name="form-analise-global" method="POST"--}}
    {{--              action="{{ url('ibis/'.$turma->id.'/meetings/'.$reuniao->id) }}">--}}
    {{--            @csrf--}}
    {{--            @method('PUT')--}}
    {{--            <div id="analise-global-txt" class="escondido" name="analise-global-txt">--}}
    {{--                <textarea name="analise" form="form-analise-global" cols="50" rows="10"></textarea>--}}
    {{--                <input type="submit" class="btn btn-success" value="Gravar">--}}
    {{--            </div>--}}
    {{--        </form>--}}

</section>

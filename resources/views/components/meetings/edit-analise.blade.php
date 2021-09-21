<div class="container">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <h3>
                Análise Global da Turma
            </h3>
            <form id="analiseForm" method="POST" action="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/analise/')}}">
                    @csrf
                    @method('PUT')

                <div class="form-group row ">
                    <textarea id="analise" name="analise" rows="10" cols="100" style="text-align: justify">
                         {{$reuniao->coordinator_intro}}
                     </textarea>
                </div>
                <div class="form-group row ">
                    <div>
                        <input type="submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>






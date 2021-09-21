
<div id="obter-pdf-recuperacao-r" class="text-center">
    <a class="btn btn-primary" href="{{url('ibis/'.$turma->id.'/meetings/'.$reuniao->id.'/get-pdf')}}">Obter PDF</a>

</div>


<div style="display: flex;justify-content: center;padding: 30px; font-family: Arial">

    <div id="recuperacao-pdf-r" style="display: flex;flex-direction: column;justify-content: space-between ;background-color: white;width: 840px;height: 1188px; padding:100px 80px">
        <div id="recuperacao-logo-atec-r" style="text-align: right;margin:10px 0px">
            <img style="width: 200px" src="{{asset('/images/logoatec.jpg')}}" alt="ATEC-Academia de Formação">
        </div>
        <div id="recuperacao-titulo-r" style="margin: 10px 0px">
            <h2><strong>

                    ATA
                </strong>
            </h2>
        </div>

        <div id="recuperacao-tabela-introducao-r" style="margin: 10px 0px">
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th colspan="4" class="text-center table-active">CURSO</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th  class="align-middle">Nome:</th>
                    <td>{{$turma->grouptype->description}}</td>
                    <th  class="align-middle">Abrev.:</th>
                    <td  class="align-middle">{{$turma->group_code}}</td>
                </tr>
                <tr>
                    <th>Tipologia:</th>
                    <td>{{$turma->grouptype->coursetype->acronym}}</td>
                    <th>Cód.:</th>
                    <td>{{$turma->center_cost}}</td>
                </tr>
                </tbody>
            </table>

        </div>

        <div id="recuperacao-texto-r" style="margin: 10px 0px">
            @foreach($texto as $paragrafo)
                <p>{{$paragrafo}}</p>
            @endforeach
        </div>
        <div id="recuperacao-lista-presenca-r" style="margin: 10px 0px">
            <div style="margin:10px; text-align: center; font-weight: bolder; font-size: large">LISTA DE PRESENÇAS</div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center">Nome</th>
                    <th style="text-align: center">Rubrica</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td  class="align-middle">{{$coordenador->name}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td  class="align-middle">{{$reuniao->users[0]->name}}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>


        </div>

        <div id="recuperacao-rodape-r" style="margin: 30px 0px 0px">
            <div style="border-top: 1px solid black">
                <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
                    <div>Cod:T-F-032 30-11-2006</div>
                    <div style="font-weight: bold">1/1</div>
                </div>
                <div style="display: flex; justify-content: center; align-items: flex-start">
                    <div style="margin: 0px 5px">
                        <img style="width: 120px" src="{{asset('/images/portugal2020.jpg')}}" alt="PT">
                    </div>
                    <div style="margin: 0px 5px">
                        <img style="width: 120px" src="{{asset('/images/fseeu.png')}}" alt="UE">
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

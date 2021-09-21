<div style="padding: 50px">


    <div id="recuperacao-logo-atec-r" style="text-align: right;margin:10px 0px">
        <img style="width: 200px" src="images/logoa.jpg" alt="ATEC-Academia de Formação">
    </div>
    <div id="recuperacao-titulo-r" style="margin: 10px 0px">
        <h2><strong>

                ATA
            </strong>
        </h2>
    </div>
    <div id="recuperacao-tabela-introducao-r" style="margin: 30px 0">
        <table style="width: 100%; border: 1px solid lightgray; background-color:#eeeeff">
            <thead>
            <tr>
                <th colspan="6" style="background-color: #eeeeff; text-align: center">CURSO</th>
            </tr>
            </thead>
            <tbody  style=" border: 1px solid lightgray ;padding:0" >
            <tr>
                <th  style="background-color: white" >Nome:</th>
                <td colspan="3" style="background-color: white">{{$turma->grouptype->description}}</td>
                <th  style="background-color: white" >Abrev.:</th>
                <td  style="background-color: white" >{{$turma->group_code}}</td>
            </tr>
            <tr>
                <th  style="background-color: white;">Tipologia:</th>
                <td  colspan="3" style="background-color: white;">{{$turma->grouptype->coursetype->acronym}}</td>
                <th style="background-color: white;">Cód.:</th>
                <td style="background-color: white;">{{$turma->center_cost}}</td>
            </tr>
            </tbody>
        </table>

    </div>
    <div id="recuperacao-texto-r" style="margin: 10px 0px">
        @foreach($texto as $paragrafo)
            <p>{{$paragrafo}}</p>
        @endforeach
    </div>





    <h4  style="margin: 30px 0"><b>
            LISTA DE PRESENÇAS
        </b>
    </h4>


    <div style="margin: 30px 0">
        <table cellpadding="5px" class="table-sm" style=" width: 100%; border: 1px solid lightgray; background-color:#eeeeff">
            <colgroup>
                <col span="1" style="width: 80%;">
                <col span="1" style="width: 20%;">
            </colgroup>
            <thead>
            <tr style="line-height: 15px; border: 1px solid #b4c6e7; border-bottom: 2px solid #b4c6e7">
                <th style="text-align: center">Nome</th>
                <th style="text-align: center">Rubrica</th>
            </tr>
            </thead>


            <tbody style="background-color: white; border: 1px solid #b4c6e7">
            <tr>
                <td class="align-middle">{{$coordenador->name}}</td>
                <td></td>
            </tr>
            <tr>
                <td class="align-middle">{{$reuniao->users[0]->name}}</td>
                <td></td>
            </tr>
            </tbody>





        </table>

    </div>




    <div style="border-top: 1px solid black; position: fixed;bottom: 0px;left: 0px;right: 0px;height: 80px;">
        <div style="margin: 2px 0px 0px ;display: flex; justify-content: space-between">
            <div>Cod: T-F-032 30-11-2006</div>
            <div style=" text-align: right;font-weight: bold">1/1</div>

        </div>
        <div style="display: flex; justify-content: center; align-items: flex-start">
            <div style="text-align: center;margin: 0px 5px">
                <img style="padding-right: 100px;width: 90px" src="images/portugal2020.jpg" alt="PT">
            </div>
            <div style="text-align: center;margin: 0px 5px">
                <img style="padding-left: 100px;width: 90px" src="images/fseeu.png" alt="UE">
            </div>
        </div>
    </div>
</div>

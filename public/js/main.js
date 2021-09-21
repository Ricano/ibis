/**
*
* Script to enable 'Gerar Turma' button
* on Create a Class ONLY when all the
* fields have a value
*
 */

$('#subtn').attr('disabled', true)

let validaSelects = false;
let validaCenterCost = false;

$(document).ready(function(){
    $('select').each(function(){
        $(this).on('change', function(){
            if($('#courses').val()      !== null &&
                $('#groups').val()      !== null &&
                $('#month').val()       !== null &&
                $('#year').val()        !== null &&
                $('#city').val()        !== null &&
                $('#coordinator').val() !== null)
            {
                validaSelects = true
            }
            else validaSelects = false

            abrirBotao()
        });
    });

    document.getElementById('center_cost').addEventListener('input', MyFunction)
    function MyFunction(){
        let cc = document.getElementById('center_cost')
        if(cc.value !== "") {
            validaCenterCost = true
        }
        else validaCenterCost = false

        abrirBotao()
    }
})

function abrirBotao(){
    if(validaSelects && validaCenterCost){
        $('#subtn').attr('disabled', false)
    }
    else $('#subtn').attr('disabled', true)
}

/**
*
* Criar nova turma
*
*/
$(document).ready(function () {
    $('select[name="courses"]').on('change', function () {
        let courseID = $(this).val();
        if (courseID) {
            $.ajax({
                url: window.location.pathname + '/' + courseID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                   $('select[name="group_type_id"]').empty();
                    $('select[name="group_type_id"]').append('<option selected disabled>Selecione a Turma</option>');
                    $.each(data, function (key, value) {
                        $('select[name="group_type_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                }
            })
        } else {
            $('select[name="group_type_id"]').empty();
        }
    })
})

$('input[id="subtn"]').on('click', function () {

    let novoNome = nomearTurma();
    // alert(novoNome)

    if (nomeDaNovaTurmaEValido(novoNome)) {
        meterFormadoresNaTurma();

        mostrarDadosDaNovaTurma(novoNome);
    } else
        alert(`Dados inválidos. Já existe uma turma com o nome ${novoNome}`)
})

/**
 *
 * Função para Modal de Nova Turma
 *
 * @param novoNome
 */
function mostrarDadosDaNovaTurma(novoNome){
    alterarVisibilidade2(this,'turma-criada')
    alterarVisibilidade2(this,'form1')

    document.getElementById('nome-nova-turma').innerText = novoNome

    document.getElementById('coordenador-nova-turma').innerText = document.getElementById('coordinator').options[document.getElementById('coordinator').selectedIndex].text;

    document.getElementById('curso-nova-turma').innerText = document.getElementById('courses').options[document.getElementById('courses').selectedIndex].text;

    document.getElementById('centro-nova-turma').innerText = document.getElementById('center_cost').value;


    let formadores = document.getElementById('formFormadoresTurma').children;

    document.getElementById('formadores-nova-turma').innerHTML=""

    for (const option of formadores) {
    document.getElementById('formadores-nova-turma').innerHTML += `<div>${option.innerText}</div>`
    }
}

/**
 *
 * Função para Modal de Nova Turma
 *
 * @param novoNome
 */
// function mostrarDadosDoNovoUser(){
//     alterarVisibilidade2(this,'user-criado')
//     alterarVisibilidade2(this,'form-register')
//
//     document.getElementById('nome-novo-user').innerText = document.getElementById('name').value;
//
//     document.getElementById('email-novo-user').innerText = document.getElementById('email').value;
//
//     document.getElementById('contribuinte-novo-user').innerText = document.getElementById('taxpayer').value;
//
//     document.getElementById('tel-novo-user').innerText = document.getElementById('telephone').value;
//
//     document.getElementById('cargo-novo-user').innerText = document.getElementById('role').value;
//
//     document.getElementById('area-novo-user').innerText = document.getElementById('area').value;
//
//
//     // let formadores = document.getElementById('formFormadoresTurma').children;
//
//     // document.getElementById('formadores-nova-turma').innerHTML=""
//     //
//     // for (const option of formadores) {
//     //     document.getElementById('formadores-nova-turma').innerHTML += `<div>${option.innerText}</div>`
//     // }
// }

function nomeDaNovaTurmaEValido(novoNome) {

    let turmasExistentes = document.getElementById('formTurmasExistentes').children
    for (let i = 0; i < turmasExistentes.length; i++) {
        if (turmasExistentes[i].innerHTML === novoNome)
            return false
    }
        return true;
}

function nomearTurma() {
    let turma = $("#groups option:selected").text();
    let mes = $('select[name="month"]').val();
    let ano = $('select[name="year"]').val();
    let cd = $('select[name="city"]').val();
    let cidade = cd.charAt(0).toUpperCase();

    $('input[id="group_code"]').remove();
    $('div[id="fullname"]').append('<input id="group_code" name="group_code" type="text" value="' + turma + cidade + '_' + mes + '.' + ano.slice(-2) + '"/>')

    let novoNome = `${turma}${cidade}_${mes}.${ano.slice(-2)}`
    return novoNome
}

function meterFormadoresNaTurma() {
    let lista = [];
    let formadores = document.getElementById('formadores-turma-sortable2');
    formadores = formadores.children;
    for (const formador of formadores) {
        lista.push(formador.innerHTML);
    }
    let listaFormadores = document.getElementById('formFormadoresTurma');

    for (const formador of formadores) {
        let string1 = `"<option selected value="`;
        let string2 = formador.value;
        let string3 = `">`;
        let string4 = formador.innerHTML.toString();
        let string5 = "</option>";
        let result = string1 + string2 + string3 + string4 + string5;
        listaFormadores.innerHTML += result;
    }
}

function alterarVisibilidade(eventsender, idDoObjeto, cssDisplayStyle) {
    let novoEstado = "none";
    if (eventsender.checked === true) {
        novoEstado = cssDisplayStyle;
    }
    document.getElementById(idDoObjeto).style.display = novoEstado;
}

function alterarVisibilidade2(eventsender, idDoObjeto) {
    let estado1 = "none";
    let estado2 = "grid";

    if (document.getElementById(idDoObjeto).style.display === estado1 || null) {

        document.getElementById(idDoObjeto).style.display = estado2;
    }else
        document.getElementById(idDoObjeto).style.display = estado1;
}

function editarFormadoresDaTurma() {

    let lista = [];
    let formadores = document.getElementById('sortableEditarFormadoresTurma2');
    formadores = formadores.children;
    for (const formador of formadores) {
        lista.push(formador.innerHTML);
    }
    let listaFormadores = document.getElementById('formEditarFormadoresTurma');

    listaFormadores.innerHTML="";

    for (const formador of formadores) {
        let string1 = `"<option selected value="`;
        let string2 = formador.value;
        let string3 = `">`;
        let string4 = formador.innerHTML.toString();
        let string5 = "</option>";
        let result = string1 + string2 + string3 + string4 + string5;
        listaFormadores.innerHTML += result;

    }
}


/**
*
* Criar nova reunião
*
 */
$(function () {
    $("#sortableEditarFormadoresTurma1").sortable({
        connectWith: ".sortableEditarFormadoresTurma2",
    }).disableSelection();


});


$(function () {
    $(".sortable_list").sortable({
        connectWith: ".connectedSortable",
        /*stop: function(event, ui) {
            var item_sortable_list_id = $(this).attr('id');
            console.log(ui);
            //alert($(ui.sender).attr('id'))
        },
        receive: function(event, ui) {
            alert("dropped on = "+this.id); // Where the item is dropped
            alert("sender = "+ui.sender[0].id); // Where it came from
            alert("item = "+ui.item[0].innerHTML); //Which item (or ui.item[0].id)
        }
        */
    }).disableSelection();


});

$(function () {
    $(".sortable_list1").sortable({
        connectWith: ".connectedSortable1",
        items: "li:not(.naoMexe)"
        /*stop: function(event, ui) {
            var item_sortable_list_id = $(this).attr('id');
            console.log(ui);
            //alert($(ui.sender).attr('id'))
        },
        receive: function(event, ui) {
            alert("dropped on = "+this.id); // Where the item is dropped
            alert("sender = "+ui.sender[0].id); // Where it came from
            alert("item = "+ui.item[0].innerHTML); //Which item (or ui.item[0].id)
        }
        */
    }).disableSelection();
});

function meterFormadoresNaReuniao(tipoDeReuniao) {
    let lista = [];
    //lista visualização

    if (tipoDeReuniao == 'pedagogica') {
        let listaFormadores2 = document.getElementById('formadoresReuniao');
        listaFormadores2.innerHTML = "";
        let listaFormadores = document.getElementById('formFormadoresReuniao');
        listaFormadores.innerHTML = "";
        let formadores = document.getElementById('sortable2');
        formadores = formadores.children;
        for (const formador of formadores) {
            lista.push(formador.innerHTML);
        }
        /**
         *  form escondido
         */

        for (const formador of formadores) {
            let string1 = `"<option selected value="`;
            let string2 = formador.innerHTML;
            let string3 = `">`;
            let string4 = formador.innerHTML.toString();
            let string5 = "</option>";
            let result = string1 + string2 + string3 + string4 + string5;
            //    console.log(result);
            listaFormadores.innerHTML += result;
        }
        for (const formador of formadores) {
            let string1 = "<div>";
            let string2 = formador.innerHTML;
            let string3 = "</div>";
            let result = string1 + string2 + string3;
            //    console.log(result);
            listaFormadores2.innerHTML += result;
        }

    } else {

        let formadorEscolhido = document.getElementById('formador-escolha-recuperacao-r');
        let formadorApresentado = document.getElementById('formador-resumo-recuperacao-r');

        let string1 = "<div>";
        let string2 = formadorEscolhido.options[formadorEscolhido.selectedIndex].text;
        let string3 = "</div>";
        let result = string1 + string2 + string3;
        formadorApresentado.innerHTML = result;



        let string4 = `"<option selected value="`;
        let string5 = formador.value;
        let string6 = `">`;
        let string7 = formador.options[formador.selectedIndex].text;
        let string8 = "</option>";
        let result2 = string4 + string5 + string6 + string7 + string8;
        //    console.log(result);
        listaFormadores.innerHTML += result2;


    }
}

function meterFormadorNaReuniaoRecuperacao(){

    let formadorEscolhido = document.getElementById('formador-escolha-recuperacao-r');

    /**
     * Inserir no quadro de apresentação
     *
     * @type {HTMLElement}
     */
    let formadorApresentado = document.getElementById('formador-resumo-recuperacao-r');
    let string1 = "<div>";
    let string2 = formadorEscolhido.options[formadorEscolhido.selectedIndex].text;
    let string3 = "</div>";
    let result = string1 + string2 + string3;
    formadorApresentado.innerHTML = result;

    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let formadorFormulario = document.getElementById('formador-formulario-recuperacao-r');
    formadorFormulario.value = formadorEscolhido.value;





}
function meterAlunoNaReuniaoRecuperacao(){

    let alunoEscolhido = document.getElementById('aluno-escolha-recuperacao-r');

    /**
     * Inserir no quadro de apresentação
     *
     * @type {HTMLElement}
     */
    let alunoApresentado = document.getElementById('aluno-resumo-recuperacao-r');
    let string1 = "<div>";
    let string2 = alunoEscolhido.options[alunoEscolhido.selectedIndex].text;
    let string3 = "</div>";
    let result = string1 + string2 + string3;
    alunoApresentado.innerHTML = result;


    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let alunoFormulario = document.getElementById('aluno-formulario-recuperacao-r');
    alunoFormulario.value = alunoEscolhido.value;



}
function meterUfcdNaReuniaoRecuperacao(){

    let ufcdEscolhida = document.getElementById('ufcd-escolha-recuperacao-r');

    /**
     * Inserir no quadro de apresentação
     *
     * @type {HTMLElement}
     */
    let ufcdApresentada = document.getElementById('ufcd-resumo-recuperacao-r');
    let string1 = "<div>";
    let string2 = ufcdEscolhida.options[ufcdEscolhida.selectedIndex].text;
    let string3 = "</div>";
    let result = string1 + string2 + string3;
    ufcdApresentada.innerHTML = result;

    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let ufcdFormulario = document.getElementById('ufcd-formulario-recuperacao-r');
    ufcdFormulario.value = ufcdEscolhida.value;


}
function meterInicioNaReuniaoRecuperacao(){

    let horarioEscolhido = document.getElementById('inicio-escolha-recuperacao-r');

    /**
     * Inserir no quadro de apresentação
     *
     * @type {HTMLElement}
     */
    let horarioApresentado = document.getElementById('inicio-resumo-recuperacao-r');
    let horario = horarioEscolhido.value.split("T");
    let dia = horario[0];
    let hora = horario[1];
    horarioApresentado.innerHTML = `<div>${dia}</div><div>${hora}</div>`;

    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let horarioFormulario = document.getElementById('inicio-formulario-recuperacao-r');
    horarioFormulario.value = horarioEscolhido.value;


}
function meterFimNaReuniaoRecuperacao(){

    let horarioEscolhido = document.getElementById('fim-escolha-recuperacao-r');

    /**
     * Inserir no quadro de apresentação
     *
     * @type {HTMLElement}
     */
    let horarioApresentado = document.getElementById('fim-resumo-recuperacao-r');
    let horario = horarioEscolhido.value.split("T");
    let dia = horario[0];
    let hora = horario[1];
    horarioApresentado.innerHTML = `<div>${dia}</div><div>${hora}</div>`;

    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let horarioFormulario = document.getElementById('fim-formulario-recuperacao-r');
    horarioFormulario.value = horarioEscolhido.value;


}

function meterFormadoresNaReuniaoPedagogica(){

    let formadoresEscolhidos = document.getElementById('sortable2').children;


    let formadoresApresentados = document.getElementById('formadores-resumo-pedagogica-r');
    formadoresApresentados.innerHTML='';

    for (const formador of formadoresEscolhidos) {
        formadoresApresentados.innerHTML+= `<div>${formador.innerHTML}</div>`;
    }


    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let formadoresFormulario = document.getElementById('formadores-formulario-pedagogica-r');
    formadoresFormulario.innerHTML = "";

    for (const formador of formadoresEscolhidos) {
        let string1 = `"<option selected value="`;
        let string2 = formador.value;
        let string3 = `">`;
        let string4 = formador.innerHTML;
        let string5 = "</option>";
        let result = string1 + string2 + string3 + string4 + string5;
        //    console.log(result);
        formadoresFormulario.innerHTML += result;

    }
}
function meterAlunosNaReuniaoPedagogica(){
    let alunosEscolhidos = document.getElementById('sortable4').children;
    let alunosApresentados = document.getElementById('alunos-resumo-pedagogica-r');
    alunosApresentados.innerHTML='';
    for (const aluno of alunosEscolhidos) {
        alunosApresentados.innerHTML+= `<div>${aluno.innerHTML}</div>`;
    }
    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let alunosFormulario = document.getElementById('alunos-formulario-pedagogica-r');
    alunosFormulario.innerHTML = "";

    for (const aluno of alunosEscolhidos) {
        let string1 = `"<option selected value="`;
        let string2 = aluno.value;
        let string3 = `">`;
        let string4 = aluno.innerHTML;
        let string5 = "</option>";
        let result = string1 + string2 + string3 + string4 + string5;
        //    console.log(result);
        alunosFormulario.innerHTML += result;

    }


}
function meterInicioNaReuniaoPedagogica(){

    let horarioEscolhido = document.getElementById('inicio-escolha-pedagogica-r');

    /**
     * Inserir no quadro de apresentação
     *
     * @type {HTMLElement}
     */
    let horarioApresentado = document.getElementById('inicio-resumo-pedagogica-r');
    let horario = horarioEscolhido.value.split("T");
    let dia = horario[0];
    let hora = horario[1];
    horarioApresentado.innerHTML = `<div>${dia}</div><div>${hora}</div>`;

    /**
     * Inserir  no formulário escondido
     *
     * @type {HTMLElement}
     */
    let horarioFormulario = document.getElementById('inicio-formulario-pedagogica-r');
    horarioFormulario.value = horarioEscolhido.value;


}
function meterFimNaReuniaoPedagogica(){

    let horarioEscolhido = document.getElementById('fim-escolha-pedagogica-r');

    /**
     * Inserir no quadro de apresentação
     *
     * @type {HTMLElement}
     */
    let horarioApresentado = document.getElementById('fim-resumo-pedagogica-r');
    let horario = horarioEscolhido.value.split("T");
    let dia = horario[0];
    let hora = horario[1];
    horarioApresentado.innerHTML = `<div>${dia}</div><div>${hora}</div>`;

    //Inserir  no formulário escondido
    let horarioFormulario = document.getElementById('fim-formulario-pedagogica-r');
    horarioFormulario.value = horarioEscolhido.value;


}

function meterAlunosNaReuniao() {
    let lista = [];

    let alunos = document.getElementById('sortable4');

    alunos = alunos.children;
    for (const aluno of alunos) {
        lista.push(aluno.innerHTML);
    }


    let listaAlunos = document.getElementById('formAlunosReuniao');
    listaAlunos.innerHTML = "";


    for (const aluno of alunos) {
        let string1 = `"<option selected value="`;
        let string2 = aluno.value;
        let string3 = `">`;
        let string4 = aluno.innerHTML.toString();
        let string5 = "</option>";
        let result = string1 + string2 + string3 + string4 + string5;
        //    console.log(result);
        listaAlunos.innerHTML += result;

    }

    let listaAlunos2 = document.getElementById('alunosReuniao');
    listaAlunos2.innerHTML = "";

    for (const aluno of alunos) {


        let string1 = "<div>";
        let string2 = aluno.innerHTML;
        let result = string1 + string2 + string1;
        //    console.log(result);
        listaAlunos2.innerHTML += result;

    }


    // console.log(lista);


}

function definirDataInicioReuniao() {
    let dataHora = document.getElementById('escolherDataInicio').value;
    let dataHoraFinal = document.getElementById('horaEDataInicio');
    dataHoraFinal.innerHTML = dataHora;

    let inicio = document.getElementById('formInicioReuniao');
    inicio.value = getSqlDate(dataHora);

    console.log(inicio.value);

}

/**
 * 'YYYY-MM-DD hh:mm:ss'
 *
 */
function definirDataFimReuniao() {
    let dataHora = document.getElementById('escolherDataFim').value;
    let dataHoraFinal = document.getElementById('horaEDataFim');
    dataHoraFinal.innerHTML = dataHora;

    let fim = document.getElementById('formFimReuniao');
    fim.value = getSqlDate(dataHora);
}

function definirTipoDeReuniao(elemento) {
    document.getElementById('tipoDeReuniao2').innerHTML = document.getElementById(elemento).innerHTML;
    document.getElementById('formTipoReuniao').value = document.getElementById('tipoDeReuniao2').innerHTML;


}

function getSqlDate(someDate) {
    let semVirgula = someDate.split(',');
    return semVirgula[0] + semVirgula[1];
}


/**
 * tooltip
 *
 */
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});


/**
 * ata
 *
 * @type {boolean}
 */
let elementoEstaVisivel = false;

function alterarVisibilidadeGeral(idDoObjeto, style) {
    elementoEstaVisivel = !elementoEstaVisivel
    if (elementoEstaVisivel)
        document.getElementById(idDoObjeto).style.display = style;
    else
        document.getElementById(idDoObjeto).style.display = 'none';

}

function preencherPropostaAtaRecuperacao() {

    $ufcdNumero = document.getElementById('ata-recuperacao-form-ufcd-numero-r').innerText;
    $ufcdNome = document.getElementById('ata-recuperacao-form-ufcd-nome-r').innerText;
    $nota = document.getElementById('ata-recuperacao-form-nota-r').value;
    $razoes = document.getElementById('ata-recuperacao-form-razoes-para-nao-ter-atingido-r').value;
    $decisao = document.getElementsByName('decisao-recuperacao');
    $caracteristicasRecuperacao = document.getElementById('ata-recuperacao-form-caracteristicas-recuperacao-r').value
    $caracteristicasReprovacao = document.getElementById('ata-recuperacao-form-caracteristicas-reprovacao-r').value
    $estrategia = document.getElementById('ata-recuperacao-form-estrategia-recuperacao-r').value;



    $ufcdNumeroAta = document.getElementById('ufcd-numero-r');
    $ufcdNomeAta = document.getElementById('ufcd-nome-r');
    $notaAta = document.getElementById('nota-r');
    $razoesAta = document.getElementById('razoes-para-nao-ter-atingido-r');
    $quandoAta = document.getElementById('quando-r');
    $caracteristicasAta = document.getElementById('caracteristicas-r');
    $decisaoAta = document.getElementById('decisao-r');
    $estrategiaAta = document.getElementById('estrategia-adotada-r');


    $ufcdNumeroAta.innerText = $ufcdNumero;
    $ufcdNomeAta.innerText = $ufcdNome;
    $notaAta.innerText = $nota;
    $razoesAta.innerText = $razoes;
    $estrategiaAta.innerText = $estrategia;

    $caracteristicasAta.innerText    = $decisao[0].checked === true ?$caracteristicasRecuperacao:$caracteristicasReprovacao;
    $decisaoAta.innerText            = $decisao[0].checked === true ? 'que será implementada uma estratégia de recuperação, neste caso, ' : 'que irá ser efetuada, à Direção, a proposta de reprovação do aluno';

    $texto =document.getElementById('recuperacao-texto-r');
    $sitioParaTexto =document.getElementById('texto-ata-recuperacao-r');

    $sitioParaTexto.value = $texto.innerText;

}


// extenso

function numeroPorExtenso(elementId, numero) {
    let num = '' + numero;
    let anoPorExtenso = num.extenso();
    let sitio = document.getElementById(elementId);

    sitio.innerHTML = anoPorExtenso;

}

String.prototype.extenso = function (c) {
    var ex = [
        ["zero", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove", "dez", "onze", "doze", "treze", "catorze", "quinze", "dezasseis", "dezassete", "dezoito", "dezanove"],
        ["dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"],
        ["cem", "cento", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"],
        ["mil", "milhão", "bilião", "trilião", "quadrilião", "quintilião", "sextilião", "septilião", "octilião", "nonilião", "decilião", "undecilião", "dodecilião", "tredecilião", "quatrodecilião", "quindecilião", "sedecilião", "septendecilião", "octencilião", "nonencilião"]
    ];
    var a, n, v, i, n = this.replace(c ? /[^,\d]/g : /\D/g, "").split(","), e = " e ", $ = "real", d = "centavo", sl;
    for (var f = n.length - 1, l, j = -1, r = [], s = [], t = ""; ++j <= f; s = []) {
        j && (n[j] = (("." + n[j]) * 1).toFixed(2).slice(2));
        if (!(a = (v = n[j]).slice((l = v.length) % 3).match(/\d{3}/g), v = l % 3 ? [v.slice(0, l % 3)] : [], v = a ? v.concat(a) : v).length) continue;
        for (a = -1, l = v.length; ++a < l; t = "") {
            if (!(i = v[a] * 1)) continue;
            i % 100 < 20 && (t += ex[0][i % 100]) ||
            i % 100 + 1 && (t += ex[1][(i % 100 / 10 >> 0) - 1] + (i % 10 ? e + ex[0][i % 10] : ""));
            s.push((i < 100 ? t : !(i % 100) ? ex[2][i == 100 ? 0 : i / 100 >> 0] : (ex[2][i / 100 >> 0] + e + t)) +
                ((t = l - a - 2) > -1 ? " " + (i > 1 && t > 0 ? ex[3][t].replace("ão", "ões") : ex[3][t]) : ""));
        }
        a = ((sl = s.length) > 1 ? (a = s.pop(), s.join(" ") + e + a) : s.join("") || ((!j && (n[j + 1] * 1 > 0) || r.length) ? "" : ex[0][0]));
        a && r.push(a + (c ? (" " + (v.join("") * 1 > 1 ? j ? d + "s" : (/0{6,}$/.test(n[0]) ? "de " : "") + $.replace("l", "is") : j ? d : $)) : ""));
    }
    return r.join(e);
}

function mostrarElemento(elemento, estilo){
    document.getElementById(elemento).style.display = estilo
}



function escondido(elemento){
    let x = document.getElementById(elemento)
    x.classList.toggle('escondido')
}

/**
 *
 * SCRIPT PARA CONFIRMAR DELETE
 */

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('.servideletebtn').click(function (e) {
        e.preventDefault();

        let delete_id = $('.serdelete_val_id').val();

        swal({
            title: "Deseja eliminar este registo?",
            text: "Uma vez eliminado, não poderá reverter esta decisão!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete) {

                let data = {
                    "_token": $('input[name="csrf-token"]').val(),
                    "id": delete_id,
                }

                $.ajax({
                    type: "DELETE",
                    url: window.location.url,
                    data: data,
                    success: function (response) {
                        // swal("Eliminado com sucesso", {
                        swal(response.status, {
                            icon: "success",
                        })
                        .then((result) => {
                            let role = $('.roleId').val()
                            if(role === 2)
                                location.assign('add-coordinator');
                            else location.assign('add-teacher');
                        });
                    }
                });
            }
        });
    });
});

/**
 *
 * SCRIPT PARA CONFIRMAR UPDATE
 */

// $(document).ready(function () {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     })
//
//     $('.AtualizarBtn').click(function (e) {
//         e.preventDefault();
//         let update_id = $('.serupdate_val_id').val();
//
//         swal({
//             title: "Deseja atualizar este registo?",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//         })
//         .then((willUpdate) => {
//             if(willUpdate) {
//                 let data = {
//                     "_token": $('input[name="csrf-token"]').val(),
//                     "id": update_id,
//                 }
//
//             $.ajax({
//                 type: "PUT",
//                 url: window.location.url,
//                 data: data,
//                 success: function (response) {
//                     // swal("Eliminado com sucesso", {
//                     swal(response.status, {
//                         icon: "success",
//                     })
//                         .then((result) => {
//                             let role = $('.UpdRoleId').val()
//                             if(role === 2)
//                                 location.assign('add-coordinator');
//                             else location.assign('add-teacher');
//                         });
//                     }
//                 });
//             }
//         });
//     });
// });

/**
 *
 * SCRIPT PARA O COORDNENADOR
 * SELECIONADO A CRIAR TURMA SEJA
 * POR DEFEITO UM FORMADOR SELECIONADO
 */

function addCoordenadorPorDefeito(novoNome){

    document.getElementById('formadores-turma-sortable2').innerText = novoNome

    document.getElementById('coordenador-nova-turma').innerText = document.getElementById('coordinator').options[document.getElementById('coordinator').selectedIndex].text;

    document.getElementById('curso-nova-turma').innerText = document.getElementById('courses').options[document.getElementById('courses').selectedIndex].text;

    document.getElementById('centro-nova-turma').innerText = document.getElementById('center_cost').value;


    let formadores = document.getElementById('formFormadoresTurma').children;

    document.getElementById('formadores-nova-turma').innerHTML=""

    for (const option of formadores) {
        document.getElementById('formadores-nova-turma').innerHTML += `<div>${option.innerText}</div>`
    }
}


/**
 *
 * Script para o nav-item
 * ficar Active dependendo da página
 *
 */

// // Get the container element
// let container = document.getElementById("navbar-header");
//
// // Get all buttons with class="btn" inside the container
// let as = container.getElementsByClassName("nv");
//
// // Loop through the buttons and add the active class to the current/clicked button
// for (let i = 0; i < as.length; i++) {
//     as[i].addEventListener("click", function() {
//         let current = document.getElementsByClassName("active");
//         current[0].className = current[0].className.replace(" active", "");
//         this.className += " active";
//     });
// }




$('.addAnexo').on('click', function (){
    addAnexo();
});

function addAnexo(){
    var tr =
        '<tr>\n' +
        '<th id="anexo-title">Anexos</th>\n' +
        '<th id="anexo-btn"><a class="btn btn-info addAnexo">+</a> </th>\n' +
        '</tr>\n' +
        '</thead>\n' +
        '<tbody>\n' +
        '<tr>\n' +
        '<td id="anexo-label"><input type="text" name="anexos[]" class="form-control"></td>\n' +
        '<th id="anexo-btn"><a class="btn btn-danger remove" style="width: 34px">-</a> </th>\n' +
        '</tr>';
    $('#anexo-body').append(tr);
};
$('tbody').on('click', '.remove', function(){
    $(this).parent().parent().remove();
});

// ACCORDION

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active-l");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "0px";
            }
        });
    }

//                ACCORDION PARA O COMPONENT ANALISE

var acc2 = document.getElementsByClassName("accordion-analise");
var i;

for (i = 0; i < acc2.length; i++) {
    acc2[i].addEventListener("click", function() {
        this.classList.toggle("active-l");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }

    });
}


function storeAnaliseWithParagraph() {
    var txt = document.getElementById("analise-txt").value;

    var txttostore = '<p>' + txt.replace(/\n/g, "</p>\n<p>") + '</p>';

    document.getElementById("analise-txt").value=txttostore;

    console.log(txttostore);
}




$(".accordion").on("click", function(){
    $("html, body").animate({ scrollTop: $(this).offset().top }, 'fast');
    return true;
});

$("#anexo-btn").on("click", function(){
    $("html, body").animate({ scrollTop: $(this).offset().top }, 'fast');
    return true;
});


$("#input-formadores-ficheiro-r").on("change", function(e) {
    let fileName = e.target.files[0].name;

    let sitioDoBotaoDeImportarR = document.getElementById('sitio-do-botao-de-importar-r');
    sitioDoBotaoDeImportarR.innerHTML=`
        <div style="margin-top: 30px">
            <h4 id="sitio-do-nome-do-ficheiro-r" style="padding: 0px;text-align: center; background-color:#f2f7fd; color: #3490dc"></h4>
        </div>
        <div style="display: flex;justify-content: center">
            <button form="form-de-importar-formadores-ficheiro-r" id="submit-formadores-ficheiro-r" type="submit" class="btn btn-success" style="margin-top: 0px">Importar Alunos</button>
        </div>`
let sitioDoNomeDoFicheiroR = document.getElementById( 'sitio-do-nome-do-ficheiro-r' );
sitioDoNomeDoFicheiroR.innerText=fileName;
});






function ordenarTabelaPorNome(tableId) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById(tableId);
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[0];
            y = rows[i + 1].getElementsByTagName("TD")[0];
            //check if the two rows should switch place:
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

function mostrarLoadingR(elementoPai){


    let pai=    document.getElementById(elementoPai);
    pai.innerHTML = `             <div class="spinner-border" role="status">
                               <!-- <span>Loading...</span>-->
                            </div>`


}


// $('#example4').Tabledit({
//     url: 'example.php',
//     deleteButton: false,
//     saveButton: false,
//     autoFocus: false,
//     buttons: {
//         edit: {
//             class: 'btn btn-sm btn-primary',
//             html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp EDIT',
//             action: 'edit'
//         }
//     },
//     columns: {
//         identifier: [0, 'id'],
//         editable: [[1, 'car'], [2, 'color']]
//     }
// });


 //
 function disableDescription(e){

    let selected = document.getElementById('alunos-plano-acao-l')
    let descricao = document.getElementById('descricao-plano-div')

     descricao.style.display = 'block';

     if(selected.value == '-1'){
        descricao.style.display = 'none';
     }
 }




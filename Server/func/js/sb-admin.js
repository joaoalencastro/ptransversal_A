$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {
    $(window).bind("load resize", function() {
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
});

function Getinfofromserver(callback) {

    //Requisição HTTP, por dados provindos do url dado. Caso os dados recebidos sejam os esperados, entra no caso do SUCCESS
    return $.ajax({
        url: 'tarefas_funcionario/ajax_serverside.php ',
        data: "",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var info = data;
            callback(info);
            }
    });
}

function gethistoryfromserver(callback)
{
    return $.ajax({
        url: 'tarefas_funcionario/history.php ',
        dataType: 'json',
        success: function (data) {
            var info = data;
            callback(info);
        }
    });
}
function init(x)
{
    //                      GERA TABELA
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
    document.getElementById("dataTables-example").className = "table table-striped table-bordered table-hover";

    //                      POPULA A TABELA
    if (x === 0)          //  TABELA DE PENDÊNCIAS X == 0 -
    {
        Getinfofromserver(function (a) {
            var geral = a;
            //              A REQUISIÇÃO DEVE SER FEITA AQUI
            var sala = geral[0];
            var nome = geral[1];
            var tipo = geral[4];
            var hora = geral[2];
            var aux = geral[5];
            for (var i = 0; i < sala.length; i++) {
                $("#bodyTable").append("<tr style='margin-right= 20px' >" +
                    "<td>" + sala[i] + "</td>" +
                    "<td>" + nome[i] + "</td>" +
                    "<td>" + tipo[i] + "</td>" +
                    "<td>" + hora[i] + "</td>" +
                    "<td align='center'>" + "<input type='submit' id='" + i + "' value='Verificar' name='' class='btn btn-primary'>" + "</td></tr>");

                    document.getElementById(i).onclick = function () {
                        var buttonid = this.id;
                        window.open('newTab.html','mywin','width=500,height=500');
                    $.ajax({
                        type: "POST",
                        url: "tarefas_funcionario/auxfile.php",
                        data: "aux= " + aux[buttonid]
                    });
                };
            }
        });
    }
    else if (x === 1) {
    gethistoryfromserver(function(a){
        var geral = a;
            //          A
            var sala = geral[0];
            var nomefunc = geral[1];
            var nomesoli = geral[2];
            var tipo = geral[3];
            var hora = geral[4];
            var dia = geral[5];
            var status = geral[6];
            for (var i = 0; i < sala.length; i++) $("#bodyTable").append("<tr style='margin-right= 20px' ><td>" + sala[i] + "</td><td>" + nomefunc[i] + "</td><td>" + nomesoli[i] + "</td><td>" + tipo[i] + "</td><td>" + hora[i] + "</td><td>" + dia[i] + "</td><td align='center'>" + status[i] + "</td></tr>");

        });
   
    }
    else if(x === 2) {

            $.ajax({
                type: "POST",
                url: "tarefas_funcionario/ajax2.php",
                dataType: 'json',
                success: function (data) {
                    var geral = data;
                    console.log(data);
                    var sala = geral[0];
                    var nome = geral[1];
                    var tipo = geral[4];
                    var hora = geral[2];
                    var hora_soli = geral[3];
                    var motivo = geral[5];

                    document.getElementById("aceitar").onclick = function() {
                        var geral_aux = 'aceitar';
                        $.ajax({
                       type: "POST",
                       url: "tarefas_funcionario/altertable.php",
                       data: "resposta= " + geral_aux,
                       success: function (data) {
                           /*alert("Solicitação Aceita");
                           window.close();
                           init(0);
                       */console.log(data);
                       }
                    })};
                    document.getElementById("recusar").onclick = function() {
                        var geral_aux = "recusar";
                        $.ajax({
                            type: "POST",
                            url: "tarefas_funcionario/altertable.php",
                            data: "resposta= " + geral_aux,
                            success: function (data) {
                                alert(data);
                                //window.close();
                            }
                        })};
                    $("#bodyTable").append("<tr><td>Identificador da Sala</td><td>" + sala + "</td></tr>");
                    $("#bodyTable").append("<tr><td>Nome do Solicitante</td><td>" + nome + "</td></tr>");
                    $("#bodyTable").append("<tr><td>Tipo de Solicitante</td><td>" + tipo + "</td></tr>");
                    $("#bodyTable").append("<tr><td>Horário de Reserva</td><td>" + hora + "</td></tr>");
                    $("#bodyTable").append("<tr><td>Hora da Solicitação</td><td>" + hora_soli + "</td></tr>");
                    $("#bodyTable").append("<tr><td>Motivo</td><td>" + motivo + "</td></tr>");
                }
            });
    }
}


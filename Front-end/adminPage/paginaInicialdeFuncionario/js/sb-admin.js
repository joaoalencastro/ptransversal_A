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
})
function init(x)
{
    //                      GERA TABELA
	$(document).ready(function(){ $('#dataTables-example').dataTable();});
	document.getElementById("dataTables-example").className = "table table-striped table-bordered table-hover";
	
    //                      POPULA A TABELA
    if(x == 0)          //  TABELA DE PENDÊNCIAS X == 0 -
    {   


        //              A REQUISIÇÃO DEVE SER FEITA AQUI 
        var sala = ["AT-11","BT-16/15","AT-13","BT-25/15 ","AT-15","AT-19","Lab-Redes","LCCC","SG-11","Auditório"];
        var nome = ["André","Beatriz","Carlos","Daiana","Ernandes","Fábio","Gabriela","Iago","Joesley","Lampião"];
        var tipo = ["Aluno","Professor(a)","Monitor","Monitor","Aluno","Aluno","Professor","Monitor","Monitor","Aluno"];
        var hora = ["10:30","10:32","10:33","10:34","10:35","10:36","10:37","10:38","10:39","10:40"];
        var dia = ["23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17",]
        var status = "Aprovada";
        var input = "<input type='submit' value='Verificar' name='' class='btn btn-primary'>";
        for(var i = 0; i < sala.length; i++) $("#bodyTable").append("<tr style='margin-right= 20px' ><td>"+sala[i]+"</td><td>"+nome[i]+"</td><td>"+tipo[i]+"</td><td>"+hora[i]+"</td><td>"+dia[i]+"</td><td align='center'>"+input+"</td></tr>");
        //
        
    }
    else if(x == 1)
    {
        //          A 
        var sala = ["AT-11","BT-16/15","AT-13","BT-25/15 ","AT-15","AT-19","Lab-Redes","LCCC","SG-11","Auditório"];
        var nome = ["André","Beatriz","Carlos","Daiana","Ernandes","Fábio","Gabriela","Iago","Joesley","Lampião"];
        var tipo = ["Aluno","Professor(a)","Monitor","Monitor","Aluno","Aluno","Professor","Monitor","Monitor","Aluno"];
        var hora = ["10:30","10:32","10:33","10:34","10:35","10:36","10:37","10:38","10:39","10:40"];
        var dia = ["23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17",]
        var status = "Aprovada";
        var dia1 = "10/05/17";
        for(var i = 0; i < sala.length; i++) $("#bodyTable").append("<tr style='margin-right= 20px' ><td>"+sala[i]+"</td><td>"+nome[i]+"</td><td>"+tipo[i]+"</td><td>"+hora[i]+"</td><td>"+dia[i]+"</td><td>"+dia1+"</td><td align='center'>"+status+"</td></tr>");
    }
    else if(x == 2)
    {
        $("#bodyTable").append("<tr><td>Nome do Solicitante</td><td> Lucas Garcia</td></tr>");
        $("#bodyTable").append("<tr><td>Identificador da Sala</td><td> Lucas Garcia</td></tr>");
        $("#bodyTable").append("<tr><td>Horário de Reserva</td><td> Lucas Garcia</td></tr>");
        $("#bodyTable").append("<tr><td>Hora da Solicitação</td><td> Lucas Garcia</td></tr>");
        $("#bodyTable").append("<tr><td>Hora da Solicitação</td><td> Lucas Garcia</td></tr>");
        $("#bodyTable").append("<tr><td>Hora da Solicitação</td><td> Lucas Garcia</td></tr>");
        




    }
   

   
}
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
function init()
{
	$(document).ready(function(){ $('#dataTables-example').dataTable();});
	document.getElementById("dataTables-example").className = "table table-striped table-bordered table-hover";
	/*				VAR PARA TESTEEEEEE 		*/
	var sala = ["AT-11","BT-16/15","AT-13","BT-25/15 ","AT-15","AT-19","Lab-Redes","LCCC","SG-11","Auditório"];
	var nome = ["André","Beatriz","Carlos","Daiana","Ernandes","Fábio","Gabriela","Iago","Joesley","Lampião"];
	var tipo = ["Aluno","Professor","Monitor","Monitor","Aluno","Aluno","Professor","Monitor","Monitor","Aluno"];
	var hora = ["10:30","10:32","10:33","10:34","10:35","10:36","10:37","10:38","10:39","10:40"];
	var dia = ["23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17","23/05/17",]
	/*																	*/
	var input = "<input type='submit' value='Verificar' name='' class='btn btn-primary'>"
	for(var i = 0; i < sala.length; i++)
    {
         $("#bodyTable").append("<tr style='margin-right= 20px' ><td>"+sala[i]+"</td><td>"+nome[i]+"</td><td>"+tipo[i]+"</td><td>"+hora[i]+"</td><td>"+dia[i]+"</td><td align='center'>"+input+"</td></tr>");
    }
   
}
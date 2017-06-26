// Freelancer Theme JavaScript

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function(){ 
            $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

    // Floating label headings for the contact form
    $(function() {
        $("body").on("input propertychange", ".floating-label-form-group", function(e) {
            $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
        }).on("focus", ".floating-label-form-group", function() {
            $(this).addClass("floating-label-form-group-with-focus");
        }).on("blur", ".floating-label-form-group", function() {
            $(this).removeClass("floating-label-form-group-with-focus");
        });
    });

})(jQuery); // End of use strict

//LOGIN
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 3500;
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
    
    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }
    
    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }
    
    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
        }, $msgShowTime);
    }

function date(x)     //RETORNA O DIA ATUAL + 1
{   
    var aux = new Date();
    var now = new Date();
    now.setDate(aux.getDate() + 1); 

    var day = now.getDate();
    var month = now.getMonth();
    var year = now.getFullYear();
    month++;
    if(day < 10)
    {
        var zero = '0';
        day = zero.concat(day);
    }
    if(month < 10)
    {
        var zero = '0';
        month = zero.concat(month);
    }
    days = ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"];
    if(x != 'inicio')
        return day + '/' + month + '/'+ year;
    else
        return days[now.getDay()] + ', ' + day + '/' + month + '/'+ year;
    
}

function requestStatus(stateReq)
{
    if(stateReq != 'inicio')
    {
        return statusChar;
    }
    else  //REQUISIÇÃO DE DADOS É FEITA AQUI   OBS: FAZER DE UM JEITO QUE EU POSSA  REQUISITAR SEMPRE, SEM TER QUE FAZER CONEXÃO COM O SERVIDOR
    {
        var status = [0,2,1,2,2,2,2,0,0,2,2,1,0,2,1,2,1,2,2,1,2,1,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,0,0,2,0,2,0,2,2,2,2,2,2,2,0,2,0,2,2,2,2,0,0,0,0,2,2,2,1,2,2,2,2,0,0,1,0,2,2,2,2,2,2,2,2,0,1,2,1];

        var status1  = [0,2,1,2,2,2,2,0,0,2,2,1,0,2,1,2,1,2,2,1,2,1,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,0,0,2,0,2,0,2,2,2,2,2,2,2,0,2,0,2,0,2,2,0,0,0,0,2,2,2,1,0,2,2,2,0,0,1,0,2,2,2,2,2,2,2,2,2,2,2,1];
        var statusChar = [status,status1,status,status,status,status1,status,status,status,status,status,status,status,status,status1];
        return statusChar;
        var statusChar = [status,status1,status,status,status,status1,status,status,status,status,status,status,status,status,status1];
        return statusChar;
    }
}   
function Status(status) 
{
    for(let i = 0; i < 150;i++)
    {
        let id_str = "q";
        id_str = id_str.concat(100+i);
        if(status[i] == 0)
        {
            $('#'+ id_str).click(function(){$("#login-modal").modal("show");});
        }
        else if(status[i] == 1)
        {       
                document.getElementById(id_str).onclick = function(){$("#login-modal").modal("show");};
                document.getElementById(id_str).style.background = "#F0F03E";
                document.getElementById(id_str).style.cursor = "cursor";
                $("#"+id_str).hover(function(){ $(this).css("background-color", "#008B8B");}, function(){
                $(this).css("background-color", "#F0F03E");});
        }
        else if(status[i] == 2)
        {
            document.getElementById(id_str).style.background = "#E03A3A";
            document.getElementById(id_str).style.cursor = "auto";
        }
    }
}
function setDate(x)
{
            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val($('#datepicker').datepicker('getFormattedDate'));
             });

            var semana = ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"];
            var data = document.getElementById("my_hidden_input").value;
            var arr = data.split("/").reverse();
            var teste = new Date(arr[0], arr[1] - 1, arr[2]);
            var dia = teste.getDay();
            if(x == 'inicio')
            {
                document.getElementById("Title").innerHTML = date('inicio');
                var statusChar = requestStatus('inicio');
                Status(statusChar[0]);
            }
            else
            {
                document.getElementById("Title").innerHTML = semana[dia] + ', ' + data;
                var statusChar = requestStatus('inicio');
                var aux = date('0');
                var arr1 = aux.split("/").reverse();
  
                var newDate = (arr[1]) +'/' + arr[2] + '/' + arr[0]; 
                var oldDate = (arr1[1]) +'/' + arr1[2] + '/' + arr1[0]; 
                var date1 = new Date(oldDate);
                var date2 = new Date(newDate);
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));                 
                var status = statusChar[diffDays];
                Status(status);
            }
            
}
function init()
{  
                /*              CRIANDO TABELAS           */
           //REQUISITA CHAR COM OS NOMES DAS SALAS
        var nomeSala = ["BT-16/15","BT-25/15","BT-34/15","BT-52/15","Lab-Redes","SG-11","Auditório"];
        //





        var newSala = [1,1];
        for(var i = 0; i < nomeSala.length;i++)
        {
            var temp = nomeSala[i];
            var sala = temp.split("/");
            if(sala[1] != undefined)
                newSala[i] = sala[0] + '_' + sala[1];
            else
                newSala[i] = nomeSala[i];
        }
        var cont = 100;

        for(var i = 0; i < nomeSala.length;i++)
        {
            let caminho = "#" + newSala[i] + "Q";
            $("#tabela-agenda").append(" <tr style='background: green;'> ");
            $("#tabela-agenda").append(" <td class='coluna-agenda'>" + nomeSala[i] + "<a href='#"+ newSala[i]+"M' data-toggle='modal' > <i  class='fa fa-info-circle'></i></a></td> ");
            


            for(var j = 0; j < 14;j++)
            {
                cont++;
                var id_str = "q";
                id_str = id_str.concat(cont);
                $("#tabela-agenda").append("<td class='botao-agenda' id='"+ id_str + "'></td> ");


            }
            $("#tabela-agenda").append(" </tr> ");

        }    
        setDate('inicio'); 

        /*              CALENDARIO              */
        $('#datapicker').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            startDate: '+1d',
            endDate : '+15d',
            daysOfWeekDisabled: [0]

        }).on('changeDate', function (e) {
        setDate();
        });

        for(var i = 0; i < nomeSala.length;i++)
        {
                var html =  '<div class="portfolio-modal modal" id="'+newSala[i]+'M" tabindex="-1" role="dialog" aria-hidden="true">'+
                                '<div class="modal-content">'+
                                    '<div class="close-modal" data-dismiss="modal">'+
                                        '<div class="lr">'+
                                            '<div class="rl">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="container">'+
                                        '<h4>'+nomeSala[i]+'</h4>'+
                                        '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<table class="table table-striped">'+
                                                    '<thead>'+
                                                      '<tr>'+
                                                        '<th></th>'+
                                                        '<th>Segunda-Feira</th>'+
                                                        '<th>Terça-Feira</th>'+
                                                        '<th>Quarta-Feira</th>'+
                                                        '<th>Quinta-Feira</th>'+
                                                        '<th>Sexta-Feira</th>'+
                                                        '<th>Sábado</th>'+
                                                        '<th>Domingo</th>'+
                                                      '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>'+
                                                      '<tr >'+
                                                        '<td>08:00</th>'+
                                                      '</tr>'+
                                                      '<tr>'+
                                                        '<td>10:00</th>'+
                                                      '</tr>'+
                                                      '<tr>'+
                                                        '<td>12:00</th>'+
                                                      '</tr>'+
                                                      '<tr>'+
                                                        '<td>14:00</th>'+
                                                      '</tr>'+
                                                      '<tr>'+
                                                        '<td>16:00</th>'+
                                                      '</tr>'+
                                                      '<tr>'+
                                                        '<td>18:00</th>'+
                                                      '</tr>'+
                                                      '<tr>'+
                                                        '<td>20:00</th>'+
                                                      '</tr>'+
                                                    '</tbody>'+
                                                  '</table>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row">'+
                                            '<div class="col-md-6">'+
                                                '<img style="padding-top:70px;" src="img/room/'+newSala[i]+'.jpeg" class="img-responsive" alt'+newSala[i]+'>'+
                                            '</div  class="col-md-6">'+
                                            '<div style="position:relative;top:57px">'+
                                                '<h4 style="text-align: left; padding-left: 30px">Número de Cadeiras:</h4>  '+
                                                '<h4 style="text-align: left; padding-left: 30px">Projetor:</h4>  '+
                                                '<h4 style="text-align: left; padding-left: 30px">Ar-condicionado:</h4>  '+
                                                '<h4 style="text-align: left; padding-left: 30px">Projetor:</h4>  '+
                                                '<h4 style="text-align: left; padding-left: 30px">Laboratório:</h4>  '+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                    $("#generic").append(html);
       }
      
}
function initMap() {
        var uluru = {lng: -47.872535, lat: -15.763555};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
    });
}
function Getmateriasfromserver(callback){
    var status_aux;
    //Requisição HTTP, por dados provindos do url dado. Caso os dados recebidos sejam os esperados, entra no caso do SUCCESS
    return $.ajax({
        url: 'materiasphp/materias.php',
	dateType: 'json',
        success: function(data)
        {
            status_aux = data;
            callback(status_aux);
	    var test = JSON.stringify(data);
		console.log(data);
		console.log(test[1]);
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg)
	}
    });




}function pesquisa() {

    var substringMatcher = function (strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(JSON.parse(strs), function (i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };
    Getmateriasfromserver(function(a)    {
        var geral = a;
        var materias = geral[0];
    	console.log(materias);

        $('#the-basics .typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'materias',
                source: substringMatcher(materias)
            });
    });
}
function fecharmodal() {

    $('#portfolioModal2').modal('hide');
    window.location.href = "http://homol.redes.unb.br/ptr012017-B-grupoA/index.html#about";
}
function resgatevalor() {
    var form = document.getElementById('formulario');

    form.addEventListener('submit', function(e) {
        // alerta o valor do campo
        var codigo = "Código- ";
        var prof = "Professor: ";
        var dias = "Dias: ";
        var horario = "Horario: ";
        var vagas = "Vagas: ";
        var local = "Local: ";
        var campo = document.getElementById('barra-pesquisa').value;
        $('#modalResultado').modal('show');
        $('#modalResultado').find('.principal').text(campo + " :");
        $('#modalResultado').find('.codigo').text(codigo);
        $('#modalResultado').find('.prof').text(prof);
        $('#modalResultado').find('.dias').text(dias);
        $('#modalResultado').find('.horario').text(horario);
        $('#modalResultado').find('.vagas').text(vagas);
        $('#modalResultado').find('.local').text(local);

    
    e.preventDefault();
    
    });
}

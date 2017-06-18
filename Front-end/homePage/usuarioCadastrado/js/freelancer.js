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

/*                                  LOGIN                       */
function toggleNavPanel(x)
{
    var panel = document.getElementById(x), navarrow = document.getElementById("navarrow"), maxH="600px";
    if(panel.style.height == maxH){
        panel.style.height = "0px";
        navarrow.innerHTML = "&#9662;";
        document.getElementById('logBar').style.background = "#2C3E50";
    }else{
        panel.style.height = maxH;
        navarrow.innerHTML = "&#9652;";
        document.getElementById('logBar').style.background = "#18BC9C";
        document.getElementById('logBar').style.color = 'white';
    }
}
/*                          MODULO DE LOGIN                                 */
$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

      if (e.type === 'keyup') {
            if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
            label.removeClass('active highlight'); 
            } else {
            label.removeClass('highlight');   
            }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
            label.removeClass('highlight'); 
            } 
      else if( $this.val() !== '' ) {
            label.addClass('highlight');
            }
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
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

function Status(status) //ATUALIZA O STATUS
{
    //REQUISITA CHAR COM OS NOMES DAS SALAS
    var nomeSala = ["AT-11","BT-16/15","AT-13","BT-25/15","AT-15","AT-19","Lab-Redes","LCCC","SG-11","Auditório"];
    //
    var k = 0;
    for(var i = 0; i < nomeSala.length;i++)
    {
            for(var j = 8; j < 22;j++)
            {
                var id_str = nomeSala[i] + ":" + j;
                let iD = id_str;
                if(status[k] == 0)
                {
                   
                    document.getElementById(id_str + ':B').onclick = function() {clickSolic(iD);};
                    document.getElementById(id_str).style.background = "green";
                }
                else if(status[k] == 1)
                {
                    document.getElementById(id_str + ':B').onclick = function() {clickSolic(iD);};
                    document.getElementById(id_str).style.background = "#F0F03E";

                }
                else if(status[k] == 2)
                {
                    document.getElementById(id_str).style.background = "#E03A3A";
                    document.getElementById(id_str).style.cursor = "auto";
                    document.getElementById(id_str + ":F").disabled = true;
                }
                k++;
            }
    }

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
                2,2,2,2,0,0,2,0,2,0,2,2,2,2,2,2,2,0,2,0,2,2,2,2,0,0,0,0,2,2,2,1,2,2,2,2,0,0,1,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,2,2,0,2,0,2,2,0,2,2,2,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,2,2,2,2,0,1,1]; 
        var status1  = [0,2,1,2,2,2,2,0,0,2,2,1,0,2,1,2,1,2,2,1,2,1,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,0,0,2,0,2,0,2,2,2,2,2,2,2,0,2,0,2,0,2,2,0,0,0,0,2,2,2,1,0,2,2,2,0,0,1,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,2,2,0,0,0,2,2,0,2,2,2,1,1,2,2,0,2,2,2,2,2,2,2,2,2,2,1,1,0,2,2,2,1,0,0]; 
        var statusChar = [status,status1,status,status,status,status1,status,status,status,status,status,status,status,status,status1];
        return statusChar;
    }
}
function setdate(x)
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
function clickSolic(id_str)
{
    console.log(id_str);
    var dia = document.getElementById("Title").innerHTML;
    var arr = dia.split(" ");
    id_str = id_str.split(':');
    //  idstr[0] é o nome da sala; idstr[1] é o horário e arr[1] o dia 
    alert("Você requisitou a sala "+ id_str[0] + ", no dia "+ arr[1]+ " às " + id_str[1]+":00 hrs");

}
function init()
{
 /*              CRIANDO TABELAS           */
           //REQUISITA CHAR COM OS NOMES DAS SALAS
        var nomeSala = ["AT-11","BT-16/15","AT-13","BT-25/15","AT-15","AT-19","Lab-Redes","LCCC","SG-11","Auditório"];
           //
        var cont = 100;
        for(var i = 0; i < nomeSala.length;i++)
        {

            $("#tabela-agenda").append(" <tr style='background: green;'> ");
            $("#tabela-agenda").append(" <td class='coluna-agenda'>" + nomeSala[i] + "&nbsp;<i class='fa fa-info-circle'></i>&nbsp;&nbsp;</td> ");
  
            for(var j = 8; j < 22;j++)
            {
                var id_str = nomeSala[i] + ":" + j;
                var html = " " +
                "<td class='botao-agenda' id="+ id_str +"> " +
                "   <div class='oi dropdown'>" +
                "        <button style='opacity:0;' id="+id_str+':F'+" class='dropdown-toggle' data-toggle='dropdown'>click</button> "+ 
                "           <ul class='nodrop dropdown-menu dropdown-user'  style='height: 280px;'>" +
                "               <div class='row' style='color:black'>" +
                "                   <h5 style='font-size:11px; position:relative; left: 22px;'>Motivo da Solicitação </h5> " +
                "                       <div style='position: relative; left: 25px' class='radio'> " +
                "                          <label><input type='radio' name='optradio'>Monitoria</label> "+
                "                      </div> "+
                "                       <div style='position: relative; left: 25px' class='radio'> " +
                "                          <label><input type='radio' name='optradio'>Aula</label> "+
                "                      </div> "+
                "                       <div style='position: relative; left: 25px' class='radio'> " +
                "                          <label><input type='radio' name='optradio'>Palestra</label> "+
                "                      </div> "+
                "                       <div style='position: relative; left: 25px' class='radio'> " +
                "                          <label><input type='radio' name='optradio'>Sala de estudos</label> "+
                "                      </div> "+
                "                      <li style='max-width:150px;position: relative; left: 20px' class='divider' ></li>           "+
                "                      <div style='position: relative; left: 25px' class='radio'> " +
                "                          <label><input type='radio' name='optradio'>Outro:</label> "+
                "                      </div> "+
                "                      <input style='position:relative; left: 20px; max-width:145px; max-height: 200px;' placeholder='Seja breve' type='text' class='form-control' rows='2' >"+
                "                      <li><button id="+id_str+':B'+ " style='position: relative; left: 60px; top:10px' class='btn btn-default bnt-solicitacao'>Enviar</button></li>                                    "+
                "               </div>"+        
                "           </ul>"+
                "   </div>"+
                "</td>";
                $("#tabela-agenda").append(html);
                $('.table-responsive').on('show.bs.dropdown', function () {
                $('.table-responsive').css( "overflow", "inherit" );});
                $('.table-responsive').on('hide.bs.dropdown', function () {
                $('.table-responsive').css( "overflow", "auto" );})

                $('.nodrop').click(function(e) {
                    e.stopPropagation();
                });


                /*$('.oi').on('hide.bs.dropdown', function () {
                    return false;
                });*/
            }
            $("#tabela-agenda").append(" </tr> ");
        }       
        setdate('inicio');

        /*              CALENDARIO              */
        $('#datapicker').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            startDate: '+1d',
            endDate : '+15d',
            daysOfWeekDisabled: [0]
        }).on('changeDate', function (e) {
            setdate();
        });

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
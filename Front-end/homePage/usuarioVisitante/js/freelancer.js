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
$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
                if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form":
                var $rg_username=$('#register_username').val();
                var $rg_email=$('#register_email').val();
                var $rg_password=$('#register_password').val();
                if ($rg_username == "ERROR") {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
                } else {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
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
});

function date()
{
    var now = new Date;
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
    var d = new Date();
     days = ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"];
    return days[d.getDay()] + ', ' + day + '/' + month + '/'+ year;
}   
function Status(status) 
{
    for(var i = 0; i < 150;i++)
    {
        var id_str = "q";
        id_str = id_str.concat(100+i);
        if(status[i] == 1)
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
                document.getElementById("Title").innerHTML = date();
                //requisita CHAR de status da tabela do dia atual



                var status = [0,2,1,2,2,2,2,0,0,2,2,1,0,2,1,2,1,2,2,1,2,1,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,0,0,2,0,2,0,2,2,2,2,2,2,2,0,2,0,2,2,2,2,0,0,0,0,2,2,2,1,2,2,2,2,0,0,1,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,2,2,0,2,0,2,2,0,2,2,2,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,2,2,2,2,0,2,1];
                Status(status);
            }
            else
            {
                document.getElementById("Title").innerHTML = semana[dia] + ', ' + data;
                //requisita CHAR de status da tabela
                var status = [1,2,1,2,2,2,2,0,0,2,2,1,0,2,1,2,1,2,2,1,2,1,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,0,0,2,0,2,0,2,2,2,2,2,2,2,0,2,0,2,2,2,2,0,0,0,0,2,2,2,1,2,2,2,2,0,0,1,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
                2,2,2,2,2,2,0,2,0,2,2,0,2,2,2,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,2,2,2,2,0,2,1];
                Status(status);
            }
            
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
            $("#tabela-agenda").append(" <td class='coluna-agenda'>" + nomeSala[i] + "<a href='#myModal' data-toggle='modal' data-target='#myModal' <i class='fa fa-info-circle'></i></a></td> ");
  
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
            daysOfWeekDisabled: [0]
            //endDate: '+15d',
            //startDate: '+2d'

        }).on('changeDate', function (e) {
        setDate();
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

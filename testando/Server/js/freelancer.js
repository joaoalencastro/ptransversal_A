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
var $msgShowTime = 2000;
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

function getroomfromserver(callback){
    var status_aux;
    //Requisição HTTP, por dados provindos do url dado. Caso os dados recebidos sejam os esperados, entra no caso do SUCCESS
    return $.ajax({
        url: '../Server/materiasphp/salas.php',
        dataType: 'json',
        success: function(data)
        {
            status_aux = data;
            callback(status_aux);
        }
    });
}
function requestStatus(dia)
{    getroomfromserver(function(a)    {


    var geral = a;
    var salas = geral[0];
    var status_aux = geral[3];
    var horarios = geral[2];
    var dias = geral[1];
    var date1 = new Date(dia);
    var arr2 =  new Date(date1).getDay();
    var salas_aux = [];
if(dia === new Date()) {
    var month = dia.getUTCMonth() + 1; //months from 1-12
    var day = dia.getUTCDate();
    var year = dia.getUTCFullYear();

    var newdate = day + "/0" + month + "/" + year;
}
    for(var i =0;i<salas.length;i++){
        var domingo_aux = ["disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel"];
        var quinta_aux = ["disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel"];
        var segunda_aux = ["disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel"];
        var sexta_aux = ["disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel"];
        var terca_aux = ["disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel"];
        var sabado_aux = ["disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel"];
        var quarta_aux = ["disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel","disponivel"];


        var hs = horarios[i].split("\r\n");
        var ds = dias[i].split("\r\n");

        for(var j = 0;j<hs.length;j++){
            if(hs[j] === "8:00-9:50" || hs[j] === "10:00-11:50" || hs[j] === "12:00-13:50" || hs[j] === "14:00-15:50" || hs[j] === "16:00-17:50" || hs[j] === "18:00-19:50" || hs[j] === "20:00-21:50")
            {
                var dias1= ds[j].split('/')[0];
                var dias2= ds[j].split('/')[1];
                if(dias1 === "domingo") {
                    if (hs[j] === "8:00-9:50") {
                        domingo_aux[0] = status_aux[i];
                        domingo_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        domingo_aux[2] = status_aux[i];
                        domingo_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        domingo_aux[4] = status_aux[i];
                        domingo_aux[i][5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        domingo_aux[6] = status_aux[i];
                        domingo_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        domingo_aux[8] = status_aux[i];
                        domingo_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        domingo_aux[10] = status_aux[i];
                        domingo_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        domingo_aux[12] = status_aux[i];
                        domingo_aux[13] = status_aux[i];
                    }
                }
                if(dias1 === "segunda") {
                    if (hs[j] === "8:00-9:50") {
                        segunda_aux[0] = status_aux[i];
                        segunda_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        segunda_aux[2] = status_aux[i];
                        segunda_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        segunda_aux[4] = status_aux[i];
                        segunda_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        segunda_aux[6] = status_aux[i];
                        segunda_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        segunda_aux[8] = status_aux[i];
                        segunda_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        segunda_aux[10] = status_aux[i];
                        segunda_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        segunda_aux[12] = status_aux[i];
                        segunda_aux[13] = status_aux[i];
                    }
                }
                if(dias1 === "terca") {

                    if (hs[j] === "8:00-9:50") {
                        terca_aux[0] = status_aux[i];
                        terca_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        terca_aux[2] = status_aux[i];
                        terca_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        terca_aux[4] = status_aux[i];
                        terca_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        terca_aux[6] = status_aux[i];
                        terca_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        terca_aux[8] = status_aux[i];
                        terca_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        terca_aux[10] = status_aux[i];
                        terca_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        terca_aux[12] = status_aux[i];
                        terca_aux[13] = status_aux[i];
                    }
                }
                if(dias1 === "quarta") {
                    if (hs[j] === "8:00-9:50") {
                        quarta_aux[0] = status_aux[i];
                        quarta_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        quarta_aux[2] = status_aux[i];
                        quarta_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        quarta_aux[4] = status_aux[i];
                        quarta_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        quarta_aux[6] = status_aux[i];
                        quarta_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        quarta_aux[8] = status_aux[i];
                        quarta_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        quarta_aux[10] = status_aux[i];
                        quarta_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        quarta_aux[12] = status_aux[i];
                        quarta_aux[13] = status_aux[i];
                    }
                }
                if(dias1 === "quinta") {
                    if (hs[j] === "8:00-9:50") {
                        quinta_aux[0] = status_aux[i];
                        quinta_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        quinta_aux[2] = status_aux[i];
                        quinta_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        quinta_aux[4] = status_aux[i];
                        quinta_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        quinta_aux[6] = status_aux[i];
                        quinta_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        quinta_aux[8] = status_aux[i];
                        quinta_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        quinta_aux[10] = status_aux[i];
                        quinta_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        quinta_aux[12] = status_aux[i];
                        quinta_aux[13] = status_aux[i];
                    }
                }
                if(dias1 === "sexta") {
                    if (hs[j] === "8:00-9:50") {
                        sexta_aux[0] = status_aux[i];
                        sexta_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        sexta_aux[2] = status_aux[i];
                        sexta_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        sexta_aux[4] = status_aux[i];
                        sexta_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        sexta_aux[6] = status_aux[i];
                        sexta_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        sexta_aux[8] = status_aux[i];
                        sexta_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        sexta_aux[10] = status_aux[i];
                        sexta_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        sexta_aux[12] = status_aux[i];
                        sexta_aux[13] = status_aux[i];
                    }
                }
                if(dias1 === "sabado") {
                    if (hs[j] === "8:00-9:50") {
                        sabado_aux[0] = status_aux[i];
                        sabado_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        sabado_aux[2] = status_aux[i];
                        sabado_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        sabado_aux[4] = status_aux[i];
                        sabado_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        sabado_aux[6] = status_aux[i];
                        sabado_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        sabado_aux[8] = status_aux[i];
                        sabado_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        sabado_aux[10] = status_aux[i];
                        sabado_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        sabado_aux[12] = status_aux[i];
                        sabado_aux[13] = status_aux[i];
                    }
                }
                if(dias2 === "domingo") {
                    if (hs[j] === "8:00-9:50") {
                        domingo_aux[0] = status_aux[i];
                        domingo_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        domingo_aux[2] = status_aux[i];
                        domingo_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        domingo_aux[4] = status_aux[i];
                        domingo_aux[i][5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        domingo_aux[6] = status_aux[i];
                        domingo_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        domingo_aux[8] = status_aux[i];
                        domingo_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        domingo_aux[10] = status_aux[i];
                        domingo_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        domingo_aux[12] = status_aux[i];
                        domingo_aux[13] = status_aux[i];
                    }
                }
                if(dias2 === "segunda") {
                    if (hs[j] === "8:00-9:50") {
                        segunda_aux[0] = status_aux[i];
                        segunda_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        segunda_aux[2] = status_aux[i];
                        segunda_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        segunda_aux[4] = status_aux[i];
                        segunda_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        segunda_aux[6] = status_aux[i];
                        segunda_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        segunda_aux[8] = status_aux[i];
                        segunda_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        segunda_aux[10] = status_aux[i];
                        segunda_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        segunda_aux[12] = status_aux[i];
                        segunda_aux[13] = status_aux[i];
                    }
                }
                if(dias2 === "terca") {
                    if (hs[j] === "8:00-9:50") {
                        terca_aux[0] = status_aux[i];
                        terca_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        terca_aux[2] = status_aux[i];
                        terca_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        terca_aux[4] = status_aux[i];
                        terca_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        terca_aux[6] = status_aux[i];
                        terca_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        terca_aux[8] = status_aux[i];
                        terca_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        terca_aux[10] = status_aux[i];
                        terca_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        terca_aux[12] = status_aux[i];
                        terca_aux[13] = status_aux[i];
                    }
                }
                if(dias2 === "quarta") {
                    if (hs[j] === "8:00-9:50") {
                        quarta_aux[0] = status_aux[i];
                        quarta_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        quarta_aux[2] = status_aux[i];
                        quarta_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        quarta_aux[4] = status_aux[i];
                        quarta_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        quarta_aux[6] = status_aux[i];
                        quarta_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        quarta_aux[8] = status_aux[i];
                        quarta_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        quarta_aux[10] = status_aux[i];
                        quarta_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        quarta_aux[12] = status_aux[i];
                        quarta_aux[13] = status_aux[i];
                    }
                }
                if(dias2 === "quinta") {
                    if (hs[j] === "8:00-9:50") {
                        quinta_aux[0] = status_aux[i];
                        quinta_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        quinta_aux[2] = status_aux[i];
                        quinta_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        quinta_aux[4] = status_aux[i];
                        quinta_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        quinta_aux[6] = status_aux[i];
                        quinta_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        quinta_aux[8] = status_aux[i];
                        quinta_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        quinta_aux[10] = status_aux[i];
                        quinta_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        quinta_aux[12] = status_aux[i];
                        quinta_aux[13] = status_aux[i];
                    }
                }
                if(dias2 === "sexta") {
                    if (hs[j] === "8:00-9:50") {
                        sexta_aux[0] = status_aux[i];
                        sexta_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        sexta_aux[2] = status_aux[i];
                        sexta_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        sexta_aux[4] = status_aux[i];
                        sexta_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        sexta_aux[6] = status_aux[i];
                        sexta_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        sexta_aux[8] = status_aux[i];
                        sexta_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        sexta_aux[10] = status_aux[i];
                        sexta_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        sexta_aux[12] = status_aux[i];
                        sexta_aux[13] = status_aux[i];
                    }
                }
                if(dias2 === "sabado") {
                    if (hs[j] === "8:00-9:50") {
                        sabado_aux[0] = status_aux[i];
                        sabado_aux[1] = status_aux[i];
                    }
                    if (hs[j] === "10:00-11:50") {
                        sabado_aux[2] = status_aux[i];
                        sabado_aux[3] = status_aux[i];
                    }
                    if (hs[j] === "12:00-13:50") {
                        sabado_aux[4] = status_aux[i];
                        sabado_aux[5] = status_aux[i];
                    }
                    if (hs[j] === "14:00-15:50") {
                        sabado_aux[6] = status_aux[i];
                        sabado_aux[7] = status_aux[i];
                    }
                    if (hs[j] === "16:00-17:50") {
                        sabado_aux[8] = status_aux[i];
                        sabado_aux[9] = status_aux[i];
                    }
                    if (hs[j] === "18:00-19:50") {
                        sabado_aux[10] = status_aux[i];
                        sabado_aux[11] = status_aux[i];
                    }
                    if (hs[j] === "20:00-21:50") {
                        sabado_aux[12] = status_aux[i];
                        sabado_aux[13] = status_aux[i];
                    }
                }
            }else{
                var dias_aux= hs[j].split(',')[0];
                var horario = hs[j].split(',')[1];
                if(newdate === dias_aux){
                    if(ds[j] === "domingo") {
                        if (horario === "8:00-9:00") {
                            domingo_aux[0] = status_aux[i];
                        }
                        if(horario === "9:00-10:00"){
                            domingo_aux[1] = status_aux[i];
                        }
                        if (horario === "10:00-11:00") {
                            domingo_aux[2] = status_aux[i];
                        }
                        if (horario === "11:00-12:00") {
                            domingo_aux[3] = status_aux[i];
                        }
                        if (horario === "12:00-13:00") {
                            domingo_aux[4] = status_aux[i];
                        }
                        if (horario === "13:00-14:00") {
                            domingo_aux[5] = status_aux[i];
                        }
                        if (horario === "14:00-15:00") {
                            domingo_aux[6] = status_aux[i];
                        }
                        if (horario === "15:00-16:00") {
                            domingo_aux[7] = status_aux[i];
                        }
                        if (horario === "16:00-17:00") {
                            domingo_aux[8] = status_aux[i];
                        }
                        if (horario === "17:00-18:00") {
                            domingo_aux[9] = status_aux[i];
                        }
                        if (horario === "18:00-19:00") {
                            domingo_aux[10] = status_aux[i];
                        }
                        if (horario === "19:00-20:00") {
                            domingo_aux[11] = status_aux[i];
                        }
                        if (horario === "20:00-21:00") {
                            domingo_aux[12] = status_aux[i];
                            domingo_aux[13] = status_aux[i];
                        }
                    }
                    if(ds[j] === "segunda") {
                        if (horario === "8:00-9:00") {
                            segunda_aux[0] = status_aux[i];
                        }
                        if(horario === "9:00-10:00"){
                            segunda_aux[1] = status_aux[i];
                        }
                        if (horario === "10:00-11:00") {
                            segunda_aux[2] = status_aux[i];
                        }
                        if (horario === "11:00-12:00") {
                            segunda_aux[3] = status_aux[i];
                        }
                        if (horario === "12:00-13:00") {
                            segunda_aux[4] = status_aux[i];
                        }
                        if (horario === "13:00-14:00") {
                            segunda_aux[5] = status_aux[i];
                        }
                        if (horario === "14:00-15:00") {
                            segunda_aux[6] = status_aux[i];
                        }
                        if (horario === "15:00-16:00") {
                            segunda_aux[7] = status_aux[i];
                        }
                        if (horario === "16:00-17:00") {
                            segunda_aux[8] = status_aux[i];
                        }
                        if (horario === "17:00-18:00") {
                            segunda_aux[9] = status_aux[i];
                        }
                        if (horario === "18:00-19:00") {
                            segunda_aux[10] = status_aux[i];
                        }
                        if (horario === "19:00-20:00") {
                            segunda_aux[11] = status_aux[i];
                        }
                        if (horario === "20:00-21:00") {
                            segunda_aux[12] = status_aux[i];
                            segunda_aux[13] = status_aux[i];
                        }
                    }
                    if(ds[j] === "terca") {
                        if (horario === "8:00-9:00") {
                            terca_aux[0] = status_aux[i];
                        }
                        if(horario === "9:00-10:00"){
                            terca_aux[1] = status_aux[i];
                        }
                        if (horario === "10:00-11:00") {
                            terca_aux[2] = status_aux[i];
                        }
                        if (horario === "11:00-12:00") {
                            terca_aux[3] = status_aux[i];
                        }
                        if (horario === "12:00-13:00") {
                            terca_aux[4] = status_aux[i];
                        }
                        if (horario === "13:00-14:00") {
                            terca_aux[5] = status_aux[i];
                        }
                        if (horario === "14:00-15:00") {
                            terca_aux[6] = status_aux[i];
                        }
                        if (horario === "15:00-16:00") {
                            terca_aux[7] = status_aux[i];
                        }
                        if (horario === "16:00-17:00") {
                            terca_aux[8] = status_aux[i];
                        }
                        if (horario === "17:00-18:00") {
                            terca_aux[9] = status_aux[i];
                        }
                        if (horario === "18:00-19:00") {
                            terca_aux[10] = status_aux[i];
                        }
                        if (horario === "19:00-20:00") {
                            terca_aux[11] = status_aux[i];
                        }
                        if (horario === "20:00-21:00") {
                            terca_aux[12] = status_aux[i];
                            terca_aux[13] = status_aux[i];
                        }
                    }
                    if(ds[j] === "quarta") {
                        if (horario === "8:00-9:00") {
                            quarta_aux[0] = status_aux[i];
                        }
                        if(horario === "9:00-10:00"){
                            quarta_aux[1] = status_aux[i];
                        }
                        if (horario === "10:00-11:00") {
                            quarta_aux[2] = status_aux[i];
                        }
                        if (horario === "11:00-12:00") {
                            quarta_aux[3] = status_aux[i];
                        }
                        if (horario === "12:00-13:00") {
                            quarta_aux[4] = status_aux[i];
                        }
                        if (horario === "13:00-14:00") {
                            quarta_aux[5] = status_aux[i];
                        }
                        if (horario === "14:00-15:00") {
                            quarta_aux[6] = status_aux[i];
                        }
                        if (horario === "15:00-16:00") {
                            quarta_aux[7] = status_aux[i];
                        }
                        if (horario === "16:00-17:00") {
                            quarta_aux[8] = status_aux[i];
                        }
                        if (horario === "17:00-18:00") {
                            quarta_aux[9] = status_aux[i];
                        }
                        if (horario === "18:00-19:00") {
                            quarta_aux[10] = status_aux[i];
                        }
                        if (horario === "19:00-20:00") {
                            quarta_aux[11] = status_aux[i];
                        }
                        if (horario === "20:00-21:00") {
                            quarta_aux[12] = status_aux[i];
                            quarta_aux[13] = status_aux[i];
                        }
                    }
                    if(ds[j] === "quinta") {
                        if (horario === "8:00-9:00") {
                            quinta_aux[0] = status_aux[i];
                        }
                        if(horario === "9:00-10:00"){
                            quinta_aux[1] = status_aux[i];
                        }
                        if (horario === "10:00-11:00") {
                            quinta_aux[2] = status_aux[i];
                        }
                        if (horario === "11:00-12:00") {
                            quinta_aux[3] = status_aux[i];
                        }
                        if (horario === "12:00-13:00") {
                            quinta_aux[4] = status_aux[i];
                        }
                        if (horario === "13:00-14:00") {
                            quinta_aux[5] = status_aux[i];
                        }
                        if (horario === "14:00-15:00") {
                            quinta_aux[6] = status_aux[i];
                        }
                        if (horario === "15:00-16:00") {
                            quinta_aux[7] = status_aux[i];
                        }
                        if (horario === "16:00-17:00") {
                            quinta_aux[8] = status_aux[i];
                        }
                        if (horario === "17:00-18:00") {
                            quinta_aux[9] = status_aux[i];
                        }
                        if (horario === "18:00-19:00") {
                            quinta_aux[10] = status_aux[i];
                        }
                        if (horario === "19:00-20:00") {
                            quinta_aux[11] = status_aux[i];
                        }
                        if (horario === "20:00-21:00") {
                            quinta_aux[12] = status_aux[i];
                            quinta_aux[13] = status_aux[i];
                        }
                    }
                    if(ds[j] === "sexta") {
                        if (horario === "8:00-9:00") {
                            sexta_aux[0] = status_aux[i];
                        }
                        if(horario === "9:00-10:00"){
                            sexta_aux[1] = status_aux[i];
                        }
                        if (horario === "10:00-11:00") {
                            sexta_aux[2] = status_aux[i];
                        }
                        if (horario === "11:00-12:00") {
                            sexta_aux[3] = status_aux[i];
                        }
                        if (horario === "12:00-13:00") {
                            sexta_aux[4] = status_aux[i];
                        }
                        if (horario === "13:00-14:00") {
                            sexta_aux[5] = status_aux[i];
                        }
                        if (horario === "14:00-15:00") {
                            console.log('sa');
                            sexta_aux[6] = status_aux[i];
                            console.log(sexta_aux);
                        }
                        if (horario === "15:00-16:00") {
                            sexta_aux[7] = status_aux[i];
                        }
                        if (horario === "16:00-17:00") {
                            sexta_aux[8] = status_aux[i];
                        }
                        if (horario === "17:00-18:00") {
                            sexta_aux[9] = status_aux[i];
                        }
                        if (horario === "18:00-19:00") {
                            sexta_aux[10] = status_aux[i];
                        }
                        if (horario === "19:00-20:00") {
                            sexta_aux[11] = status_aux[i];
                        }
                        if (horario === "20:00-21:00") {
                            sexta_aux[12] = status_aux[i];
                            sexta_aux[13] = status_aux[i];
                        }
                    }
                    if(ds[j] === "sabado") {
                        if (horario === "8:00-9:00") {
                            sabado_aux[0] = status_aux[i];
                        }
                        if(horario === "9:00-10:00"){
                            sabado_aux[1] = status_aux[i];
                        }
                        if (horario === "10:00-11:00") {
                            sabado_aux[2] = status_aux[i];
                        }
                        if (horario === "11:00-12:00") {
                            sabado_aux[3] = status_aux[i];
                        }
                        if (horario === "12:00-13:00") {
                            sabado_aux[4] = status_aux[i];
                        }
                        if (horario === "13:00-14:00") {
                            sabado_aux[5] = status_aux[i];
                        }
                        if (horario === "14:00-15:00") {
                            sabado_aux[6] = status_aux[i];
                        }
                        if (horario === "15:00-16:00") {
                            sabado_aux[7] = status_aux[i];
                        }
                        if (horario === "16:00-17:00") {
                            sabado_aux[8] = status_aux[i];
                        }
                        if (horario === "17:00-18:00") {
                            sabado_aux[9] = status_aux[i];
                        }
                        if (horario === "18:00-19:00") {
                            sabado_aux[10] = status_aux[i];
                        }
                        if (horario === "19:00-20:00") {
                            sabado_aux[11] = status_aux[i];
                        }
                        if (horario === "20:00-21:00") {
                            sabado_aux[12] = status_aux[i];
                            sabado_aux[13] = status_aux[i];
                        }
                    }
                }
            }

            var sala_descartavel = [domingo_aux,segunda_aux,terca_aux,quarta_aux,quinta_aux,sexta_aux,sabado_aux];
        }
        salas_aux[i] = sala_descartavel[arr2];

    }
    console.log("domingo=",domingo_aux,"segunda=",segunda_aux,"terca=",terca_aux,"quarta=",quarta_aux,"quinta=",quinta_aux,"sexta=",sexta_aux,"sabado=",sabado_aux);
    Status(salas_aux);


    });


}

function Status(status)
{   var mult = 0;
    for(var k=0;k<status.length;k++) {
        for (var i = 0; i < 15; i++) {
            var id_str = "q";
             mult++;
            id_str = id_str.concat(100 + mult);
            if (status[k][i] === "disponivel") {

                $('#' + id_str).click(function () {
                    $("#login-modal").modal("show");
                });
            }
            else if (status[k][i] === "pendente") {
                document.getElementById(id_str).onclick = function () {
                    $("#login-modal").modal("show");
                };
                document.getElementById(id_str).style.background = "#F0F03E";
                document.getElementById(id_str).style.cursor = "cursor";
                $("#" + id_str).hover(function () {
                    $(this).css("background-color", "#008B8B");
                }, function () {
                    $(this).css("background-color", "#F0F03E");
                });
            }
            else if (status[k][i] === "indisponivel") {
                document.getElementById(id_str).style.background = "#E03A3A";
                document.getElementById(id_str).style.cursor = "auto";
            }
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
    if(x === 'inicio')
    {
        document.getElementById("Title").innerHTML = date('inicio');
        var date1 = new Date();
        date1.setDate(date1.getDate() + 1);
        requestStatus(date1);
    }
    else
    {
        document.getElementById("Title").innerHTML = semana[dia] + ', ' + data;
        var aux = date('0');
        var newDate = (arr[1]) +'/' + arr[2] + '/' + arr[0];
        console.log(newDate);
        requestStatus(newDate);
    }

}

function init()
{
    getroomfromserver(function (a) {
    var geral = a;

    /*              CRIANDO TABELAS           */
    //REQUISITA CHAR COM OS NOMES DAS SALAS
    var nomeSala = geral[0];

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
});
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
        url: '../Server/materiasphp/sasa.php',
        success: function(data)
        {
            status_aux = data;
            callback(status_aux);
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
            alert(msg)}
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
            $.each(strs, function (i, str) {
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
    Getmateriasfromserver(function(a)    {
        var form = document.getElementById('formulario');

        form.addEventListener('submit', function(e) {
            var i_aux;

            var campo = document.getElementById('barra-pesquisa').value;
            var geral = a;
            var nome_aux = geral[0];
            for(var i=0;i<nome_aux.length;i++){
                if(campo === nome_aux[i])
                {
                    i_aux = i;
                }
            }
            // alerta o valor do campo
            var codigo = geral[3];
            var prof = geral[2];
            var dias = geral[4];
            var horario = geral[6];
            var vagas = geral[1];
            var local = geral[5];

            $('#modalResultado').modal('show');
            $('#modalResultado').find('.principal').text(campo + " :");
            $('#modalResultado').find('.codigo').text(codigo[i_aux]);
            $('#modalResultado').find('.prof').text(prof[i_aux]);
            $('#modalResultado').find('.dias').text(dias[i_aux]);
            $('#modalResultado').find('.horario').text(horario[i_aux]);
            $('#modalResultado').find('.vagas').text(vagas[i_aux]);
            $('#modalResultado').find('.local').text(local[i_aux]);


            e.preventDefault();

        });
    });
}
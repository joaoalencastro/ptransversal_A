<!---------------------------------------------------------------------------
Example client script for JQUERY:AJAX -> PHP:MYSQL example
---------------------------------------------------------------------------->

<html>
<head>
    <script language="javascript" type="text/javascript" src="jquery-1.4.4.js"></script>
</head>
<body>
<button onclick="Status(status)">
    click here
</button>
<script>
    var status;
    var salas;
    $(function ()
    {
        //Requisição HTTP, por dados provindos do url dado. Caso os dados recebidos sejam os esperados, entra no caso do SUCCESS
        $.ajax({
            url: 'ajax_serverside.php',
            data: "",
            dataType: 'json',
            success: function(data)
            {
                 status = data[0];
                 salas = data[1];
                 console.log(status);
                 console.log(salas);
            },
            error:function() {
                alert("Error");
            }
        });
    });
    function Status(status,salas)
    {
        for(var i =0;i<status.length;i++) {
            if (status[i] === '1'){
                console.log("esta disponivel")
            }else if (status[i]=== '0')
            {
                console.log("esta ocupada")
            }else if (status[i] === '2'){
                console.log("esta pendente")
            }

        }
    }

</script>
</body>
</html>
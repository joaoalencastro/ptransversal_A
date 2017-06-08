<!---------------------------------------------------------------------------
Example client script for JQUERY:AJAX -> PHP:MYSQL example
---------------------------------------------------------------------------->

<html>
<head>
    <script language="javascript" type="text/javascript" src="jquery-1.4.4.js"></script>
</head>
<body>
<form action="search.php" method="post">
    Digite sua pesquisa aqui:<input type="text" name="pesquisa"><br><br>
    <input type="submit" value="Enviar">
</form>
<script>
/*    var status;

    $(function ()
    {

        //envia uma requisição HTTP para o "url". Caso receba um arquivo no formato JSON, ele entra no caso do SUCCESS

        $.ajax({
            url: 'api.php',                  //the script to call to get data
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'json',                //data format
            success: function(data)          //on recieve of reply
            {
                 status = data;
            },
            error: function(jqXHR, exception) {
                if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error.\n' + jqXHR.responseText);
                }
            }


        });
    });

    function test1(){
        var status_aux = status;
        for(var i=0;i<status_aux.length;i+=2) {
            alert(status_aux[i]);
        }
    }
*/
</script>
</body>
</html>
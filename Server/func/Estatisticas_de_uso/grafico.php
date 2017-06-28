<?php
require('conexao2.php');
include('./PHPlot.php');

#Dados para o Grafico
$sql = "SELECT * FROM usuario;";
$result = mysqli_query($conexao,$sql);
if (!$result) {
	die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i = 0;
while ($ln = mysqli_fetch_array($result)){
	$i = $i + 1;
}




#Matriz utilizada para gerar os graficos
$data = array(
array("", $i ),
);
#Instancia o objeto e setando o tamanho do grafico na tela
$plot = new PHPlot(800,600);
#Tipo de borda, consulte a documentacao
$plot->SetImageBorderType("plain");
#Tipo de grafico, nesse caso barras, existem diversos(pizza…)
$plot->SetPlotType("bars");
#Setando os valores com os dados do array
$plot->SetDataValues($data);
#Titulo do grafico
$plot->SetTitle("Cadastro de usuários no Site");
#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
$plot->SetLegend(array("Usuários Cadastrados com Sucesso"));
#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
$plot->SetXTickLabelPos("none");
$plot->SetXTickPos("none");
#Gera o grafico na tela
$plot->DrawGraph();
?>

<?php
require('conexao2.php');
require('phplot.php');
#include('./PHPlot.php');

$grafico = new PHPlot(1000,800); //cria um gráfico com tamanho 800x600 pixels

$grafico->SetTitle("Dados Interessantes");



//Dados para gerar o gráfico



$sql2 = "SELECT * FROM fluxo_sala;";
$result2 = mysqli_query($conexao,$sql2);
if (!$result2) {
	die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i2 = 0;
while ($ln2 = mysqli_fetch_array($result2)){
	$i2 = $i2 + 1;
}


$sql3 = "SELECT * FROM fluxo_sala WHERE status_sala = 'pendente';";
$result3 = mysqli_query($conexao,$sql3);
if (!$result3) {
	die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i3 = 0;
while ($ln3 = mysqli_fetch_array($result3)){
	$i3 = $i3 + 1;
}


//gerando Grafico
#Matriz utilizada para gerar os graficos
$data = array(
array("", $i2, $i3 ),
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
$plot->SetTitle("Estátistica de solicitações");
#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
$plot->SetLegend(array("Solicitações Recebidas","Solicitações Pendentes"));
#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
$plot->SetXTickLabelPos("none");
$plot->SetXTickPos("none");
#Gera o grafico na tela
$plot->DrawGraph();

?>

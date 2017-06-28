<?php
require('conexao2.php');
include('phplot.php');

$grafico = new PHPlot(1000,800); //cria um gráfico com tamanho 800x600 pixels

$grafico->SetTitle("Dados Interessantes");



//Dados para gerar o gráfico


$sql3 = "SELECT * FROM fluxo_sala WHERE status = 'indisponivel';";
$result3 = mysqli_query($conexao,$sql3);
if (!$result3) {
	die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i3 = 0;
while ($ln3 = mysqli_fetch_array($result3)){
	
	$i3 = $i3 + 1;
}
$sql = "SELECT * FROM fluxo_sala WHERE status = 'pendente';";
$result = mysqli_query($conexao,$sql);
if (!$result) {
	die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i = 0;
while ($ln= mysqli_fetch_array($result)){
	
	$i = $i + 1;
}

$sql4 = "SELECT * FROM fluxo_sala;";
$result4 = mysqli_query($conexao,$sql4);
if (!$result4) {
	die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i4 = 0;
while ($ln4= mysqli_fetch_array($result4)){
	
	$i4 = $i4 + 1;
}



$i2 = ($i4 - ($i3 + $i));

//gerando Grafico
#Matriz utilizada para gerar os graficos
$data = array(
array("", $i3, $i, $i2),
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
$plot->SetTitle("Estátistica de Salas");
#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
$plot->SetLegend(array("Salas Indisponiveis","Salas Pendentes", "Salas Disponíveis"));
#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
$plot->SetXTickLabelPos("none");
$plot->SetXTickPos("none");
#Gera o grafico na tela
$plot->DrawGraph();

?>

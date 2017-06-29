<?

# Exemplo de gráfico de barras utilizando o PHPlot
# Ubuntu para Iniciantes - 10/2012
# http:ubuntuiniciantes.com.br
# twitter : http://twitter.com/iniciantesUbunt
# faceboock: http://www.facebook.com/iniciantes.doubuntu
# Compartilhe Conhecimento

require_once 'phplot.php';

// nesse caso será utilizado uma estrutura de array
// a situação é a mesma para dados vindo de uma consulta sql

$dados = array(
array('Janeiro', '10230', '11345'), 
array('Fevereiro', '12334', '8902'),
);

// cria um objeto
$MeuGrafico = new PHPlot(400, 200);

$MeuGrafico->SetImageBorderType('plain');
// define o formato do arquivo da imagem
$MeuGrafico->SetFileFormat("png");

// define o tipo de grafico, nesse caso em barras
$MeuGrafico->SetPlotType('bars');

// Define a fonte Padrão, nesse caso o arquivo ttf está no mesmo diretório
$MeuGrafico->SetDefaultTTFont('Arial.ttf'); 

// define se as barras serão em 3D, valor 0 Imagem chamada
$MeuGrafico->SetShading(1); 
$MeuGrafico->SetDataType('text-data');


//função para converter para real, pode haver outra maneira!
function converterParaReal($value)
{
$deg = $value;
$real = number_format($deg,2,',','.');

return "R$ {$real}";
}

// setar o valores no eixo Y no formato moeda
// este metodo aceita uma função quando o parametro custom é setado
$MeuGrafico->SetYLabelType('custom', 'converterParaReal');

// seta os dados para a plotagem do grafico
$MeuGrafico->SetDataValues($dados);

// definição do titulo do gráfico
// por questão da acentuação utilizar a função utf8_decode
$titulo = utf8_decode('DEMONSTRAÇÃO DO RESULTADO DE VENDAS BIMENTRAL');

// chamada do titulo definindo o tamanho da fonte
//foi definido null no segundo parametro pois o tipo de fonte foi setado anteriormente 
$MeuGrafico->SetFontTTF('title', null, 9); 

// chamada das lefendas do eixo Y definindo o tamanho da fonte
$MeuGrafico->SetFontTTF('y_label', null, 8);

// chamada das lefendas do eixo X definindo o tamanho da fonte 
$MeuGrafico->SetFontTTF('x_label', null, 8);

// Setar o titulo definido na varieavel $titulo anteriomente
$MeuGrafico->SetTitle($titulo);

// Gera uma legenda
$MeuGrafico->SetLegend(array('Pedro', 'Paulo'));

//Por padrão é setado "marcas" das escalas do eixo x, none retira estas marcas.
$MeuGrafico->SetXTickPos('none');

// gera o grafico
$MeuGrafico->DrawGraph();

?> 
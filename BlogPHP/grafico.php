<?php // content="text/plain; charset=utf-8"

require_once ('Controler/GraphControler.php');
require_once 'Model/Grafico.php';
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');


GraphControler::connectBD();
$arrGraficos = GraphControler::consultCantidad();
GraphControler::disconnectBD();

$datay=array();//VALORES
$nombres = array();

foreach ($arrGraficos as $grafico) {
	array_push($datay, $grafico->__get('_cantidad'));
	array_push($nombres, $grafico->__get('_name'));
}


// $datay=array(62,105,85,50);//VALORES
// Create the graph. These two calls are always required
$graph = new Graph(650,520,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,2,4,6,8,10), array(1,3,5,7,9));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($nombres);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Bar Gradient(Left reflection)");

// Display the graph
$graph->Stroke();
?>
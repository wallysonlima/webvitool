<?

include_once("../dao/PostoDAO.php");
include_once("../dao/PrecipitacaoDAO.php");

$pre1 = explode("/", $_POST["prefixo1"]);
$prefixo1 = substr($pre1[0], 0, -1);
$pre2 = explode("/", $_POST["prefixo2"]);
$prefixo2 = substr($pre2[0], 0, -1);
$pre3 = explode("/", $_POST["prefixo3"]);
$prefixo3 = substr($pre3[0], 0, -1);

$ano1 = $_POST["ano1"];
$ano2 = $_POST["ano2"];
$ano3 = $_POST["ano3"];

writeData($prefixo1, $prefixo2, $prefixo3, $ano1, $ano2, $ano3);

echo '
<!DOCTYPE html>
<html meta-charset="utf-8">
	<script src = "http://d3js.org/d3.v3.js"></script>
	<script src = "http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.js"></script>
	<link rel = "stylesheet" href = "http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.css">

<head>
	<title>Webvitool</title>
	<link rel="stylesheet" href="../view/css/estilo.css">
</head>
<body>';

require_once("../view/header.php");
require_once("../view/nav.php");

echo '
<section>
<div id = "chart1">
    <svg></svg>
</div>
</section>
';

require_once("../view/footer.php");

echo '
</body>

<script>
  //$(document).ready(function(){
    d3.csv("../view/data/timeline.csv",function(err,data){

      //get each key of the data that is not date
      //these will be our key in the key/value pair
      //the values x and y will be month and the value
      var dataToPlot = Object.keys(data[0]).filter(function(k){return k!="date"})
        .map(function(k){
          return {"key":k,"values":data.map(function(d){
           return {
             "x":d3.time.format("%Y-%b-%d").parse("2014-" + d.date + "-01"),
             "y":+d[k]
           }
          })}
        })

      nv.addGraph(function() {
        var width = 1000, height = 400;
        var chart = nv.models.multiBarChart().x(function(d) {
            return d.x;
        }).y(function(d) {
            return d.y;
        }).color([\'#aec7e8\', \'#7b94b5\', \'#486192\']).stacked(true)
        .width(width).height(height)
          .transitionDuration(350)
          .reduceXTicks(true)   //If \'false\', every single x-axis tick label will be rendered.
          .rotateLabels(0)      //Angle to rotate x-axis labels.
          .showControls(true)   //Allow user to switch between \'Grouped\' and \'Stacked\' mode.
          .groupSpacing(0.1)    //Distance between each group of bars.
        ;

        chart.xAxis
            .tickFormat(d3.time.format(\'%b\'));

        chart.yAxis
            .tickFormat(d3.format(\',.1f\'));

        d3.select(\'#chart1 svg\')
            .datum(dataToPlot)
            .call(chart)
            .style({ \'width\': width, \'height\': height });

        nv.utils.windowResize(chart.update);

        return chart;
      });

    })
  //})


</script>

</html>
';

function writeData($pre1, $pre2, $pre3, $ano1, $ano2, $ano3) {
	$postoDao = new PostoDAO();
	$preDao = new PrecipitacaoDAO();
	$arrayPre1 = $preDao->getMediaChuvaAno($pre1, $ano1);
	$arrayPre2 = $preDao->getMediaChuvaAno($pre2, $ano2);
	$arrayPre3 = $preDao->getMediaChuvaAno($pre3, $ano3);
	$arrayNome = $postoDao->getNome($pre1, $pre2, $pre3);
	$texto = "";
	$tam1 = sizeof($arrayPre1);
	$tam2 = sizeof($arrayPre2);
	$tam3 = sizeof($arrayPre3);
	$tamanho = 0;
	$file = fopen("../view/data/timeline.csv","w");

	 if ( $tam1 < $tam2 )
            if ( $tam1 < $tam3 )
                $tamanho = $tam1;
            else
                $tamanho = $tam3;
        else if ( $tam2 < $tam3 )
            $tamanho = $tam2;
        else
            $tamanho = $tam3;

    if ( sizeof($arrayNome) == 3)
        $texto = "date,Nome:".$arrayNome[0].",Nome:".$arrayNome[1].",Nome:".$arrayNome[2]."\n";
    else {
        echo  "<script> alert(\"Erro ! Selecione Arquivos Diferentes !\");</scritp>";
    }
	
	for($i = 0; $i < $tamanho; $i++ ) {
		switch ($arrayPre1[$i]->getMes() ) {
                case "01":
                    $texto .= "Jan,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "02":
                    $texto .= "Feb,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "03":
                	$texto .= "Mar,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "04":
                	$texto .= "Apr,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "05":
                	$texto .= "May,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "06":
                	$texto .= "Jun,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "07":
                	$texto .= "Jul,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "08":
                    $texto .= "Aug,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "09":
                    $texto .= "Sep,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "10":
                	$texto .= "Oct,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "11":
                	$texto .= "Nov,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
                case "12":
                	$texto .= "Dec,".$arrayPre1[$i]->getMedia().",".$arrayPre2[$i]->getMedia().",".
                            $arrayPre3[$i]->getMedia()."\n";
                    break;
            }
	}

	fwrite($file, $texto);

	fclose($file); 
}

?>
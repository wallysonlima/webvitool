<?php

echo '
	<!DOCTYPE html>
	<script src = "http://d3js.org/d3.v3.js"></script>
	<script src = "http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.js"></script>
	<link rel = "stylesheet" href = "http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.css">

	<meta charset="utf-8">
	<html>

	<head>
		<title>Webvitool</title>
		<link rel="stylesheet" href="css/estilo.css">
		<style type="text/css">
	      #container { position: relative; }
	      #imageView { border: 1px solid #000; }
	      #imageTemp { position: absolute; top: 1px; left: 1px; }
	    </style>
	</head>
	<body>	
';

require_once("header.php");
require_once("nav.php");

echo '
	<section>
		<div id = "chart1">
    		<svg></svg>
		</div>

		<script>
		  //$(document).ready(function(){
		    d3.csv("file:///data/data/wallyson.lima.mobivitool/files/timeline.csv",function(err,data){

		      //get each key of the data that is not date
		      //these will be our key in the key/value pair
		      //the values x and y will be month and the value
		      var dataToPlot = Object.keys(data[0]).filter(function(k){return k!="date"})
		        .map(function(k){
		          return {"key":k,"values":data.map(function(d){
		           return {
		             //lets make this a real date
		             "x":d3.time.format("%Y-%b-%d").parse("2014-" + d.date + "-01"),
		             "y":+d[k]
		           }
		          })}
		        })

		      nv.addGraph(function() {
		        var width = 600, height = 300;
		        var chart = nv.models.multiBarChart().x(function(d) {
		            return d.x;
		        }).y(function(d) {
		            return d.y;
		        }).color([\'#aec7e8\', \'#7b94b5\', \'#486192\']).stacked(true)
		        .width(width).height(height)
		          .transitionDuration(350)
		          .reduceXTicks(true)   //If, every single x-axis tick label will be rendered.
		          .rotateLabels(0)      //Angle to rotate x-axis labels.
		          .showControls(true)   //Allow user to switch between Grouped and Stacked mode.
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
	</section>
';


require_once("footer.php");

echo '
</body>
</html>
';
?>
<?php
echo '
<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Relatório total por classe"
	},
	axisY: {
		title: "Classe: "
	},
	legend: {
		cursor:"pointer",
		itemclick : toggleDataSeries
	},
	toolTip: {
		shared: true,
		content: toolTipFormatter
	},
	data: ['.
		foreach ($DIMENSAO as $d) {	
	.'{
		type: "bar",
		showInLegend: true,
		name: "Gold",
		color: "gold",
		dataPoints: [
			{ y: 243, label: "Italy" },
			{ y: 236, label: "China" },
			{ y: 243, label: "France" },
			{ y: 273, label: "Great Britain" },
			{ y: 269, label: "Germany" },
			{ y: 196, label: "Russia" },
			{ y: 1118, label: "USA" }
		]
	},'.}.'
	]
});
chart.render();

function toolTipFormatter(e) {
	var str = "";
	var total = 0 ;
	var str3;
	var str2 ;
	for (var i = 0; i < e.entries.length; i++){
			var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ;
		total = e.entries[i].dataPoint.y + total;
		str = str.concat(str1);
	}
	str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
	str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
	return (str2.concat(str)).concat(str3);
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>';
?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


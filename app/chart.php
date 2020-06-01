<!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>In this example is demonstrated how to populate the jqxChart with data from MySQL Database</title> 
    <link rel="stylesheet" href="styles/jqx.base.css" type="text/css" />
	<script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="scripts/jqxcore.js"></script>
	<script type="text/javascript" src="scripts/jqxchart.js"></script>	
	<script type="text/javascript" src="scripts/jqxdata.js"></script>	
	    <script type="text/javascript" src="scripts/jqxlistbox.js"></script>
    <script type="text/javascript" src="scripts/jqxcombobox.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.selection.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			// prepare the data
			var theme = 'classic';
	  
			var source =
			{
				datatype: "json",
				datafields: [
				{ name: 'months', type: 'date'},
				{ name: 'price'},
				{ name: 'fkProductID'},
				{ name: 'fkstore'}
				],
				url: 'chartdata.php'
				
			};		
			
			var dataAdapter = new $.jqx.dataAdapter(source,
			{
				autoBind: true,
				async: false,
				downloadComplete: function () { },
				loadComplete: function () { },
				loadError: function () { }
			});
			
		    // prepare jqxChart settings
			var settings = {
			    title: "Product Name",
			    showLegend: true,
			    padding: { left: 5, top: 5, right: 50, bottom: 5 },
			    titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
			    source: dataAdapter,
			    categoryAxis:
				{
				
				    text: 'Category Axis',
				    textRotationAngle: 0,
				    dataField: 'months',
				    flip: true,
				    showTickMarks: true,
				    tickMarksInterval: Math.round(dataAdapter.records.length / 6),
				    tickMarksColor: '#888888',
				    unitInterval: Math.round(dataAdapter.records.length / 6),
				    showGridLines: true,
				    gridLinesInterval: Math.round(dataAdapter.records.length / 6),
				    gridLinesColor: '#888888',
				    axisSize: 'auto'
				},
			    colorScheme: 'scheme03',
			    seriesGroups:
				[
					{
					    type: 'column',
					    showLabels: true,
					    valueAxis:
						{
					
						    displayValueAxis: true,
						    description: 'Price Diffrence',
						    axisSize: 'auto',
						    tickMarksColor: '#888888',
						    unitInterval: 500,
						    minValue: 50,
						    
						},
					    series: [
                            { dataField: 'price', displayText: 'Month', symbolType: 'square' }
					    ]
					}
				]
			};

			// setup the chart
			$('#jqxChart').jqxChart(settings);
		});
	</script>
</head>
<body class='default'>
<?php


?>
      <div style="width:690px; height:400px" id="jqxChart"></div>
</body>
</html>
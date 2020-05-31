<html>
 <head>
  <title>PHP Test</title>
  <script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="scripts/jqxcore.js"></script>
	<script type="text/javascript" src="scripts/jqxchart.js"></script>	
	<script type="text/javascript" src="scripts/jqxdata.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {

            // prepare chart data
            var sampleData = [
                { Country: 'China', Population: 1347350000, Percent: 19.18},
                { Country: 'India', Population: 1210193422, Percent: 17.22},
                { Country: 'USA', Population: 313912000, Percent: 4.47},
                { Country: 'Indonesia', Population: 237641326, Percent: 3.38},
                { Country: 'Brazil', Population: 192376496, Percent: 2.74}];

            // prepare jqxChart settings
            var settings = {
                title: "Top 5 most populated countries",
                description: "Statistics for 2011",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 20, top: 5, right: 20, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: sampleData,
                xAxis:
                    {
                        dataField: 'Country',
                        showGridLines: true,
                        flip: false
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            orientation: 'horizontal',
                            columnsGapPercent: 100,
                            toolTipFormatSettings: { thousandsSeparator: ',' },
                            valueAxis:
                            {
                                flip: true,
                                unitInterval: 100000000,
                                  minValue: 250,
                                maxValue: 1500000000,
                                displayValueAxis: true,
                                description: '',
                                formatFunction: function (value) {
                                    return parseInt(value / 1000000);
                                }
                            },
                            series: [
                                    { dataField: 'price', displayText: 'Population (millions)' }
                                ]
                        }
                    ]
            };

            // setup the chart
            $('#chartContainer').jqxChart(settings);
        });
    </script>
 </head>
 <body>
 <?php
	#Include the connect.php file
	include('connectnew.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
	
	$query = "SELECT * FROM  `view_product_low_each_month` where fkProductID =8  LIMIT 0 , 10";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$price[] = array(
			'mon' => $row['mon'],
			'price' => $row['price'],
			'fkProductID' => $row['fkProductID'],
			
			'StoreName' => $row['StoreName']
		  );
	}
  
	echo json_encode($price);
	
?>

<div id='chartContainer' style="width:850px; height:500px;">
    </div>
 </body>
</html>
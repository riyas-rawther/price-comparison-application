
<!DOCTYPE html>
<html>
<head>
    <title id="Description">Mobile Phone Prices comparison using jqWidgets and PHP</title>
	<meta name="description" content="This app could be useful for any organization who wanted to track daily price received for an item from multiple vendors and diffrent salesmans. This small application I built for my employees to enter their received mobile phone (item) prices through whatsapp/phone calls. Before they using this app, they were depending on papers and everday at 11am they ask each other what was the best price for each model.">
    <meta name="author" content="Riyas Rawther">
    <!-- Bootstrap core CSS -->
    <link href="contents/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="contents/bootstrap-3.3.6/css/bootstrap-theme.min.css" rel="stylesheet" />
    <!-- jQWidgets CSS -->
    <link href="app/styles/jqx.base.css" rel="stylesheet">
    <link href="app/styles/jqx.bootstrap.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <script type="text/javascript" src="app/scripts/jquery-1.11.1.min.js"></script>
    <script src="app/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="app/scripts/jqxcore.js"></script>
    <script type="text/javascript" src="app/scripts/jqxexpander.js"></script>
    <script type="text/javascript" src="app/scripts/jqxvalidator.js"></script>
    <script type="text/javascript" src="app/scripts/jqxbuttons.js"></script>
    <script type="text/javascript" src="app/scripts/jqxcheckbox.js"></script>
    <script type="text/javascript" src="app/scripts/globalize.js"></script>
    <script type="text/javascript" src="app/scripts/jqxcalendar.js"></script>
    <script type="text/javascript" src="app/scripts/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="app/scripts/jqxmaskedinput.js"></script>
    <script type="text/javascript" src="app/scripts/jqxlistbox.js"></script>
    <script type="text/javascript" src="app/scripts/jqxcombobox.js"></script>
    <script type="text/javascript" src="app/scripts/jqxinput.js"></script>
    <script type="text/javascript" src="app/scripts/jqxscrollbar.js"></script>
    <script type="text/javascript" src="app/scripts/jqxdata.js"></script>
    <script type="text/javascript" src="app/scripts/jqxchart.js"></script>
    <script type="text/javascript" src="app/scripts/jqxdatatable.js"></script>

	<script type="text/javascript" src="app/scripts/localization.js"></script>
	<script type="text/javascript" src="app/scripts/jqxgrid.js"></script>
    <script type="text/javascript" src="app/scripts/jqxgrid.selection.js"></script>	
	<script type="text/javascript" src="app/scripts/jqxgrid.filter.js"></script>	
	<script type="text/javascript" src="app/scripts/jqxgrid.sort.js"></script>	
	<script type="text/javascript" src="app/scripts/jqxgrid.pager.js"></script>	
	<script type="text/javascript" src="app/scripts/jqxgrid.columnsresize.js"></script>
	<script type="text/javascript" src="app/scripts/jqxgrid.selection.js"></script>
	<script type="text/javascript" src="app/scripts/jqxlistbox.js"></script> 
	<script type="text/javascript" src="app/scripts/jqxdropdownlist.js"></script>
	<script type="text/javascript" src="app/scripts/jqxmenu.js"></script>
	
    <script type="text/javascript" src="scripts/jqxcombobox.js"></script>
    <style type="text/css">
        body, html {
            height: 100%;
            padding: 0px;
            margin: 0px;
            width: 100%;
            border: none;
            overflow: hidden;
        }

        .required {
            vertical-align: baseline;
            color: red;
            font-size: 10px;
        }

        .control-label {
            white-space: nowrap;
        }
    </style>
</head>
<body>
   <script type="text/javascript">
	$(document).ready(function () {
	  // set jQWidgets Theme to "Bootstrap"
            $.jqx.theme = "bootstrap";
           



		var source =
		{
			datatype: "json",
			datafields: [
			{ name: 'ProImage', type: 'string'},
			{ name: 'ProductName', type: 'string'},
			{ name: 'CategoryName', type: 'string' },
			{ name: 'Price', type: 'number' },
			{ name: 'PriceDate', type: 'date' },
			{ name: 'PriceDate', type: 'date' },
			{ name: 'StoreName', type: 'string' },
			{ name: 'CountryName', type: 'string' },
			{ name: 'SpecName', type: 'string' },
			{ name: 'color', type: 'string' },
			{ name: 'network', type: 'string' },
			{ name: 'memory', type: 'string' },
			
				
			
		],

		
  	
		
		
		
		
		cache: false,
		url: 'data_grid.php',
		pagesize: 15,
		filter: function()
		{
			// update the grid and send a request to the server.
			$("#jqxgrid").jqxGrid('updatebounddata', 'filter');
		},
		sort: function()
		{
			// update the grid and send a request to the server.
			$("#jqxgrid").jqxGrid('updatebounddata', 'sort');
		},
		root: 'Rows',
		beforeprocessing: function(data)
		{		
			if (data != null)
			{
				source.totalrecords = data[0].TotalRows;					
			}
		}
		};
		
		
	 var imagerenderer = function (row, column, value) {
                return '<img style="margin-left: 5px;" height="30" width="30" src="' + value + '"/>';
            }
      
            	  
		
				
		var dataadapter = new $.jqx.dataAdapter(source, {
			loadError: function(xhr, status, error)
			{
				alert(error);
			}
		}
		);
	
		// initialize jqxGrid
		$("#jqxgrid").jqxGrid(
		{		
			 theme: 'darkblue',
			width: '100%',
			source: dataadapter,
			filterable: true,
			sortable: true,
			autoheight: true,
			
			 localization: getLocalization('en'),
	autorowheight: true,		 
	autoheight: true,
			
			pageable: true,
			virtualmode: true,
			columnsresize: false,
			 altrows: true,
			 	 
		ready: function()
    {
        $("#jqxgrid").jqxGrid('sortby', 'PriceDate', 'desc');     
    },	
			rendergridrows: function(obj)
			{
				return obj.data;    
			},
			columns: [
				
				
			
				{ text: 'Item Name', datafield: 'ProductName', width: 'auto'  },
				{ text: 'Brand', datafield: 'CategoryName',width: 'auto'},
				{ text: 'Price', datafield: 'Price',width: 'auto',cellsformat: 'c2'},
				{ text: 'Date', datafield: 'PriceDate', filtertype: 'date', width: 'auto', cellsformat: 'dd-M-yyyy'},
				{ text: 'Supplier', datafield: 'StoreName',width: 'auto'},
				{ text: 'From', datafield: 'CountryName',width: 'auto'},
				{ text: 'Spec', datafield: 'SpecName',width: 'auto'},
				{ text: 'Color', datafield: 'color',width: 'auto'}
				]		
			});
          
            $("#jqxlistbox").on('checkChange', function (event) {
                $("#jqxgrid").jqxGrid('beginupdate');
                if (event.args.checked) {
                    $("#jqxgrid").jqxGrid('showcolumn', event.args.value);
                }
                else {
                    $("#jqxgrid").jqxGrid('hidecolumn', event.args.value);
                }
                $("#jqxgrid").jqxGrid('endupdate');
            });    
   function getExportServer() {
                return 'http://www.jqwidgets.com/export_server/export.php';
            }
            // prepare the data
		var employeeSource =
		{
			datatype: "json",
			datafields: [
			{ name: 'idProducts', type: 'int'},
			{ name: 'ProductName', type: 'string'},

			{ name: 'Name', type: 'string'}
			],
			url: "data_products.php",
			async: false
		};

		var employeesDataAdapter = new $.jqx.dataAdapter(employeeSource);

		// create a comboBox. 
		// The displayMember specifies that the list item's text will be the Employee's Name. 
		// The valueMember specifies that the list item's value will be the Employee's ID.
		$("#jqxcombobox").jqxComboBox(
		{
			width: 250,
			height: 25,
			source: employeesDataAdapter,
			
			promptText: 'Select a Product',
			selectedIndex: -1,
			displayMember: 'ProductName',
			valueMember: 'idProducts'
		});

		$("#jqxcombobox").bind('select', function(event)
		{
			// get employee's ID.
			var employeeID = event.args.item.value;
			
		
    // select the chart element and change the title to 'New Title'
    $('#jqxChart').jqxChart({title: "Graphical representation of price diffrence" });
    
    // refresh the chart element
    $('#jqxChart').jqxChart('refresh');
			// prepare the data
			var ordersSource =
			{
				datatype: "json",
				datafields: [
				{ name: 'fkProductID', type: 'string'},
				{ name: 'ProductName', type: 'string'},
				{ name: 'StoreName', type: 'string'},
				{ name: 'fkStore', type: 'string'},
								{ name: 'price', type: 'string'},
				{ name: 'id', type: 'int'},				
				{ name: 'months', type: 'date'}
				],
				type: 'POST',
				data: {fkProductID:employeeID},
				
				url: "data_chart.php"
				
   
			};

			var dataAdapter = new $.jqx.dataAdapter(ordersSource);
			$("#grid").jqxGrid({ 
			source: dataAdapter,
			sortable: true,
			height: 150, 
		
			columns: 
			[
			{datafield: "id", text: "ID", width: '70'},
			{datafield: "months", text: "Month", width: '20%'},

				{datafield: "price", text: "Minimum Price", width: '30%'},
				
				{datafield: "StoreName", text: "Store Name", width: '25%'}
				
				
			]
			});
			
			
	//chart starts

var dataAdapterChart = new $.jqx.dataAdapter(ordersSource,
			{
				autoBind: true,
				async: false,
				downloadComplete: function () { },
				loadComplete: function () { },
				loadError: function () { }
			});
			
		    // prepare jqxChart settings
			var settings = {
			    
			    showLegend: true,
			    padding: { left: 5, top: 5, right: 50, bottom: 5 },
			    titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
			    source: dataAdapterChart,
			    enableAnimations:true,
			    categoryAxis:
				{
				
				    text: 'Category Axis',
				    textRotationAngle: 0,
				    dataField: 'months',
				  
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


            $("#pngButton").jqxButton({});

           
            $("#pngButton").click(function () {
                // call the export server to create a PNG image
                $('#jqxChart').jqxChart('saveAsPNG', 'myChart.png', getExportServer());
            });


			
		}); 

	              
		
	});
    </script>
   <div style="min-height: 40px; box-shadow: none; -webkit-box-shadow: none;" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <ul id="myTab" style="min-width: 480px; box-shadow: none; -webkit-box-shadow: none; border: none;" class="nav nav-tabs">
            <li style="margin-left: 20px;" class="active">
			
            <li><a data-tab="grid" href="#grid">Price Comparison Table</a></li>
            <li><a data-tab="charts" href="#charts">Price Comparison Chart</a></li>
        </ul>
    </div>
    <div style="padding-top: 40px; width: 100%; height: 100%;">
        
        
       
	<!-- Grid tab -->		
		
		<div id="grid" style="width: 100%; height: 100%;" class="pane">
           <h6>You can filter/sort each columns</h6>
			 <div style="margin-left: 10px; float: left;" id="jqxgrid"></div>
		</div>
	<!-- Chart tab -->	
		
		<div id="charts" style="width: 100%; height: 100%;" class="pane">
           <h6>Chart</h6>
			  <div id="jqxcombobox"></div>
			  <div style="width:690px; height:400px" id="jqxChart"></div>
			  <input id="pngButton" type="button" value="Save as an Image" />
		</div>
		
		
        </div>
    </div>
</html>

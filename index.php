<?php
#Include the connect.php file
include('login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
 	<title id='Description'>Regency Trading Platform</title>
 	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<!-- Bootstrap core CSS -->
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    
	<link rel="stylesheet" href="styles/jqx.base.css" type="text/css" />
	 <link rel="stylesheet" href="styles/jqx.darkblue.css" type="text/css" />
		<link rel="stylesheet" href="styles/orange.css" type="text/css" />
    <script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="scripts/jqxexpander.js"></script>
    <script type="text/javascript" src="scripts/jqxcore.js"></script>
    <script type="text/javascript" src="scripts/jqxnotification.js"></script>
    <script type="text/javascript" src="scripts/jqxbuttons.js"></script>
    <script type="text/javascript" src="scripts/jqxscrollbar.js"></script>
    <script type="text/javascript" src="scripts/jqxmenu.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.selection.js"></script>	
	<script type="text/javascript" src="scripts/jqxgrid.filter.js"></script>	
	<script type="text/javascript" src="scripts/jqxgrid.sort.js"></script>		
    <script type="text/javascript" src="scripts/jqxdata.js"></script>	
	<script type="text/javascript" src="scripts/jqxlistbox.js"></script>	
	<script type="text/javascript" src="scripts/jqxgrid.pager.js"></script>		
	<script type="text/javascript" src="scripts/jqxdropdownlist.js"></script>	
 	<script type="text/javascript" src="scripts/demos.js"></script>
 	<script type="text/javascript" src="scripts/jqxgrid.columnsresize.js"></script>
 	 <script type="text/javascript" src="scripts/localization.js"></script>
 	  <script type="text/javascript" src="scripts/jqxlistbox.js"></script> 
 	    <script type="text/javascript" src="scripts/jqxbuttons.js"></script>
    <script type="text/javascript" src="scripts/jqxscrollbar.js"></script>
    <script type="text/javascript" src="scripts/jqxlistbox.js"></script>
    <script type="text/javascript" src="scripts/jqxcombobox.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="scripts/jqxmenu.js"></script>


        <script type="text/javascript" src="scripts/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="scripts/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="scripts/jqxdraw.js"></script>
     <script type="text/javascript" src="scripts/jqxchart.js"></script>
         <script type="text/javascript" src="scripts/jqxwindow.js"></script>
    <script type="text/javascript" src="scripts/jqxdocking.js"></script>
 <style>
		
		body {
		  height: 100%;
		  /* The html and body elements cannot have any padding or margin. */
		}

		/* Wrapper for page content to push down footer */
		#wrap {
		  min-height: 100%;
		  height: auto;
		  /* Negative indent footer by its height */
		  margin: 0 auto -60px;
		  /* Pad bottom by footer height */
		  padding: 0 0 60px;
		}

		/* Set the fixed height of the footer here */
		#footer {
		  height: 60px;
		  background-color: #f5f5f5;
		}


		/* Custom page CSS
		-------------------------------------------------- */
		/* Not required for template or sticky footer method. */

		#wrap > .container {
		  padding: 60px 15px 0;
		}
		.container .text-muted {
		  margin: 20px 0;
		}

		#footer > .container {
		  padding-left: 15px;
		  padding-right: 15px;
		}
		#navBar
		{
			background: transparent !important;
			border: none;
			box-shadow: none;
			-webkit-box-shadow: none;
		}
		.navbar
		{
			min-height: 20px !important;
		}
		code {
		  font-size: 80%;
		}
	</style>	
 	
    <script type="text/javascript">
	$(document).ready(function () {
	
	  $("#navBar").jqxMenu({ autoSizeMainItems: true, theme: "bootstrap", showTopLevelArrows: true, width: '100%' });
            $("#navBar").css("visibility", "visible");
		// prepare the data
		
$('#docking').jqxDocking({ theme: 'darkblue', width:720 });
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
		url: 'new_serverfiltering_paging_and_sorting_data.php',
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
			width: 670,
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
				
				
			
				{ text: 'Item Name', datafield: 'ProductName',width: '150' },
				{ text: 'Brand', datafield: 'CategoryName',width: '58'},
				{ text: 'Price', datafield: 'Price',width: '90',cellsformat: 'c2'},
				{ text: 'Date', datafield: 'PriceDate', filtertype: 'date', width: '105', cellsformat: 'dd-M-yyyy'},
				{ text: 'Supplier', datafield: 'StoreName',width: '115'},
				{ text: 'From', datafield: 'CountryName',width: '50'},
				{ text: 'Spec', datafield: 'SpecName',width: '50'},
				{ text: 'Color', datafield: 'color',width: '50'}
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
			url: "combobox_and_grid_employees.php",
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
			
			promptText: 'Select an Item',
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
				
				url: "combobox_and_grid_orders.php"
				
   
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
</head>

<body class='default'>

     <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div style="visibility: hidden;" id="navBar" >
            <ul>
              <li><a href="http://regencyplus.ae/trading-platform">Home</a></li>
              <li><a href="update-price.php">Update Price</a></li>
              
              <li>
                <a href="#">Add</a>
                <ul style="width: 250px;">
                  <li><a href="new-supplier.php">New Supplier</a></li>
                  <li><a href="new-product.php">New Product</a></li>
                  
                
                </ul>
                <li><a href="http://regencyplus.ae/contact-us">Contact</a></li>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div><br /><br />





        
    </div>
 
 
 





<div id="docking">
        <div>
            <div id="window1" style="height: 500px; width: 720px;">
                <div>
                   Daily Price Table</div>
                <div>
                        <div  id="jqxlistbox"></div>
        <div style="margin-left: 10px; float: left;" id="jqxgrid"></div></div>
            </div>
            <div id="window2" style="height: auto; width: 100px;">
                <div>
                    Chart - Lowest price of an Item and the supplier each month...</div>
                <div>
                    Select a product to find the best price of a month and the supplier...
                    <div id="jqxcombobox"></div>
		<div id="grid"></div>
		<div style="width:690px; height:400px" id="jqxChart"></div>
<div >

                <input id="pngButton" type="button" value="Save as an Image" />
            </div>
		</div>
            </div>
        </div>
    </div>


</html>
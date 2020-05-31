<?php
include('login.php');
?>
﻿<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<style>
		html,
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
		 .demo-iframe {
            border: none;
            width: 600px;
            height: 400px;
            clear: both;
          
        }
        .register-table td, 
        .register-table tr
        {
            border-spacing: 0px;
            border-collapse: collapse;
            border-spacing:20em;
            font-family: Verdana;
            font-size: 12px;
        }
	</style>
    <title id="Description">Daily Price Update Page | Regency Trading Platform</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQWidgets CSS -->
    <link href="styles/jqx.base.css" rel="stylesheet">
    <link href="styles/jqx.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/jqx.darkblue.css" type="text/css" />
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <!-- jQWidgets JavaScript files -->
    <script src="scripts/jqxcore.js"></script>
    <script src="scripts/jqxmenu.js"></script>
    
    <script type="text/javascript" src="scripts/jqxvalidator.js"></script> 
    <script type="text/javascript" src="scripts/jqxbuttons.js"></script>
    <script type="text/javascript" src="scripts/jqxscrollbar.js"></script>
    <script type="text/javascript" src="scripts/jqxdata.js"></script>
    <script type="text/javascript" src="scripts/jqxlistbox.js"></script>
	<script type="text/javascript" src="scripts/jqxcombobox.js"></script>	


    <script type="text/javascript" src="scripts/globalization/globalize.js"></script> 
    <script type="text/javascript" src="scripts/jqxcalendar.js"></script> 
    <script type="text/javascript" src="scripts/jqxdatetimeinput.js"></script>  
    
    
    
    
    
    
    
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("#navBar").jqxMenu({ autoSizeMainItems: true, theme: "bootstrap", showTopLevelArrows: true, width: '100%' });
            $("#navBar").css("visibility", "visible");
            $.jqx.theme = 'darkblue';
         
            
        var source =
        {
			datatype: "json",
			datafields: [
			{ name: 'ProductName'},
			{ name: 'idProducts'},
			
			],
			url: 'comboboxdata.php',
			async: false
			
		};  
var searchMode = $('#combobox').jqxComboBox('searchMode');		
var autoComplete = $('#combobox').jqxComboBox('autoComplete');		 
var dataAdapter = new $.jqx.dataAdapter(source);
			
		$("#combobox").jqxComboBox(
		{
			source: dataAdapter,
			searchMode: 'containsignorecase',
			autoComplete: true,
			width: 250,
			height: 25,
searchMode: 'containsignorecase',
selectedIndex: -1,
			promptText: "Select a product...",
			displayMember: 'ProductName',
			valueMember: 'idProducts'
		});  
		// trigger the select event.
                $("#combobox").on('select', function (event) {
                var elem = document.getElementById("productvalue");

elem.value = event.args.item.value;
                   
                });
		
// prepare the data
		var source =
		{
			datatype: "json",
			datafields: [
			{ name: 'StoreName'},
			{ name: 'idStores'},
			
			],
			url: 'comboboxdata1.php',
			
		};
		var searchMode = $('#combobox1').jqxComboBox('searchMode');		
var autoComplete = $('#combobox1').jqxComboBox('autoComplete')		
var dataAdapter = new $.jqx.dataAdapter(source);
			
		$("#combobox1").jqxComboBox(
		{
			source: dataAdapter,
			searchMode: 'containsignorecase',
			autoComplete: true,
		
			width: 250,
			height: 25,
			
			promptText: "Select supplier...",
			displayMember: 'StoreName',
			valueMember: 'idStores'
		}); 
		// trigger the select event.
                $("#combobox1").on('select', function (event) {
                var elem = document.getElementById("suppliervalue");

elem.value = event.args.item.value;
                   
                });
 $('#clearForm').jqxButton({ width: 100});
 $('#clearForm').on('click', function () {
    $(".form")[0].reset();
});				
  $('#sendButton').jqxButton({ width: 70});
  $('#sendButton').on('click', function () {
    $(".form")[0].reset();
});
           $("#jqxdatetimeinput").jqxDateTimeInput({ width: '250px', height: '25px', formatString: 'yyyy-MM-dd' });
	
//prepare spec combo-box

 var source =
        {
			datatype: "json",
			datafields: [
			{ name: 'SpecName'},
			{ name: 'specID'},
			
			],
			url: 'load-specs.php',
			
		};  
var searchMode = $('#combobox-spec').jqxComboBox('searchMode');		
var autoComplete = $('#combobox-spec').jqxComboBox('autoComplete');		 
var dataAdapter = new $.jqx.dataAdapter(source);
			
		$("#combobox-spec").jqxComboBox(
		{
			source: dataAdapter,
			autoComplete: true,
			width: 250,
			height: 25,
searchMode: 'containsignorecase',
			promptText: "Select a spec...",
			displayMember: 'SpecName',
			valueMember: 'specID'
		});
		// trigger the select event.
                $("#combobox-spec").on('select', function (event) {
                var elem = document.getElementById("specvalue");

elem.value = event.args.item.value;
                   
                });

//color combobox
 var colors = [
                    { value: "N/A", label: "N/A" },
                    { value: "Gold", label: "Gold" },
                    { value: "White", label: "White" },
                    { value: "Black", label: "Black" },
                    { value: "Gray", label: "Gray" },
                    { value: "Silver", label: "Silver" }
                    
                ];

                // Create a jqxComboBox
                $("#comboBoxColor").jqxComboBox({  source: colors, promptText: "Select color...", width: 200, height: 25});
                // Focus jqxComboBox
               
//color combo ends
//network combobox
 var network = [
                    { value: "N/A", label: "N/A" },
                    { value: "2G", label: "2G" },
                    { value: "3G", label: "3G" },
                    { value: "4G", label: "4G" },
                    { value: "WiFi", label: "WiFi" }
                ];

                // Create a jqxComboBox
                $("#comboBoxnetwork").jqxComboBox({  source: network, promptText: "Select network...", width: 200, height: 25});
                // Focus jqxComboBox
               
//network combo ends		 	
//memorycombobox
 var memory = [
                    { value: "N/A", label: "N/A" },
                    { value: "4GB", label: "4GB" },
                    { value: "8GB", label: "8GB" },
                    { value: "16GB", label: "16GB" },
                    { value: "32GB", label: "32GB" },
                    { value: "64GB", label: "64GB" },
                    { value: "128GB", label: "128GB" }
                    
                ];

                // Create a jqxComboBox
                $("#comboBoxMemory").jqxComboBox({  source: memory, promptText: "memory...", width: 200, height: 25});
                // Focus jqxComboBox
               
//network combo ends		
	
	});
	        
            
      
            
            
     
	</script>
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div style="visibility: hidden;" id="navBar" >
            <ul>
              <li><a href="http://regencyplus.ae/trading-platform">Home</a></li>
              <li><a href="#">Update Price</a></li>
              
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
      </div>

      <!-- Begin page content -->
      <div class="container">
      <div style="font-size: 12px; font-family: Verdana;" id="selectionlog"></div> 
        <div class="page-header">
    <form class="form" id="form" target="form-iframe"  method="post" action="update-price-table.php" style="font-size: 13px; font-family: Verdana; width: 650px;">        
   <table class="register-table">       
  <tr>
                        <td>Product:</td>
                        <td><div name="list" id="combobox"></div> </td>
                    	</tr>
 <td>Supplier:</td>
<td><div name="list1" id="combobox1"></div> </td>
</tr>                       
        
    <td>Spec:</td>
<td><div name="Spec_ID_value" id="combobox-spec"></div> </td>
</tr>      
   <br /><td>Color:</td>
<td><div name="color_value" id="comboBoxColor"></div></td>
</tr>        
         <td>Network:</td>
<td><div name="network_value" id="comboBoxnetwork"></div></td>
</tr>  
    <td>Memory:</td>
<td><div name="memory_value" id="comboBoxMemory"></div></td>
</tr>  

 <td>Cost:</td>
<td>           <input style="width: 182px; margin-top: 5px;" placeHolder="Price..." id="price" name="price" class="text-input" type="text" maxlength="16" /> </td>
</tr>   
 <td>Date:</td>
<td>           <div id='jqxdatetimeinput' name="pdate"></div></td>
</tr>        
     </table>   
        
       
  
   	 
   
   <div>
   
    
                   
   </div>


<div>

      </div>
      <input name="productvalue" type="hidden" id="productvalue">
      <input name="suppliervalue" type="hidden" id="suppliervalue">
            <input name="specvalue" type="hidden" id="specvalue">
  <input style="margin-top: 10px;" type="submit" value="Submit" id="sendButton" /> 
  <input type="button" value="Clear Form" id='clearForm' />
  </form>
        </div>
        
      </div>
      
 
  
  <iframe id="form-iframe" name="form-iframe" class="demo-iframe" frameborder="0"></iframe>      
      
    
      
    </div>
 
    <div id="footer">
      <div class="container">
        <p class="text-muted">Copy Right Regency Plus all right Reserverd.</p>
      </div>
    </div>


  </body>
</html>
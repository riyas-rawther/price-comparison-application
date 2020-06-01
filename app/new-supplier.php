<?php
include('login.php');
?>﻿
<!DOCTYPE html>
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
	</style>
    <title id="Description">Daily Price Update Page</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQWidgets CSS -->
    <link href="styles/jqx.base.css" rel="stylesheet">
    <link href="styles/jqx.bootstrap.css" rel="stylesheet">
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
      </div>

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
           <form class="form" id="form" target="form-iframe"  method="post" action="addsupplier.php" style="font-size: 13px; font-family: Verdana; width: 650px;">
     
   	
           <input style="width: 182px; margin-top: 5px;" placeHolder="Supplier Name" id="suppliername" name="suppliername" class="text-input" type="text" maxlength="16" /> 
           
       <div name="code" id="combobox"></div>        

  <input style="margin-top: 10px;" type="submit" value="Submit" id="sendButton" /> 
  </form> 
        </div>
     
      </div>
      
 
  
  <iframe id="form-iframe" name="form-iframe" class="demo-iframe" frameborder="0"></iframe>      
      
      
      
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <!-- jQWidgets JavaScript files -->
    <script src="scripts/jqxcore.js"></script>
    <script src="scripts/jqxmenu.js"></script>
    

    <script type="text/javascript" src="scripts/jqxbuttons.js"></script>
    <script type="text/javascript" src="scripts/jqxscrollbar.js"></script>
    <script type="text/javascript" src="scripts/jqxdata.js"></script>
    <script type="text/javascript" src="scripts/jqxlistbox.js"></script>
	<script type="text/javascript" src="scripts/jqxcombobox.js"></script>	
    <script type="text/javascript" src="scripts/demos.js"></script> 

    <script type="text/javascript" src="scripts/globalization/globalize.js"></script> 
    <script type="text/javascript" src="scripts/jqxcalendar.js"></script> 
    <script type="text/javascript" src="scripts/jqxdatetimeinput.js"></script>  
    
    
    
    
    
    
    
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("#navBar").jqxMenu({ autoSizeMainItems: true, theme: "bootstrap", showTopLevelArrows: true, width: '100%' });
            $("#navBar").css("visibility", "visible");
            var source =
        {
			datatype: "json",
			datafields: [
			{ name: 'name'},
			{ name: 'code'},
			
			],
			url: 'comboboxdatacountries.php',
			
		};  
var searchMode = $('#combobox').jqxComboBox('searchMode');		
var autoComplete = $('#combobox').jqxComboBox('autoComplete');		 
var dataAdapter = new $.jqx.dataAdapter(source);
			
		$("#combobox").jqxComboBox(
		{
			source: dataAdapter,
			autoComplete: true,
			width: 250,
			height: 25,
searchMode: 'containsignorecase',
			selectedIndex: 1,
			displayMember: 'name',
			valueMember: 'code'
		});  
        
		
  $('#sendButton').jqxButton({ width: 70});

	});
	        
            
            
            
            
     
	</script>
  </body>
</html>
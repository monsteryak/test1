<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* {box-sizing: border-box}

		/* Set height of body and the document to 100% */
		body, html {
  					height: 100%;
  					margin: 0;
  					font-family: Arial;
				}

				/* Style tab links */
		.tablink {
  				background-color: #555;
  				color: white;
  				float: left;
  				border: none;
  				outline: none;
  				cursor: pointer;
  				padding: 14px 16px;
  				font-size: 17px;
  				width: 25%;
			}

		.tablink:hover {
  				background-color: #777;
			}

		/* Style the tab content (and add height:100% for full page content) */
		.tabcontent {
  				color: white;
  				display: none;
  				padding: 100px 20px;
  				height: 100%;
			}

		#Home {background-color: #c89666;}
		#EnterData {background-color: lightgreen;}
		#RetrieveData {background-color: #1c77ac;}
		#About {background-color: #9e363a;}
	</style>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<title>Home Page</title>

</head>


<body>
	<header>
		<div class="container-fluid hcolor" style="background-color: lightblue; 
		text-align: center;">
			<div ><h1> Welcome to MonsterYak!!</h1></div>
		</div>
	</header>

	<button class="tablink" onclick="openPage('Home', this, '#c89666')" id="defaultOpen">Home</button>
	<button class="tablink" onclick="openPage('EnterData', this, 'lightgreen')">Secure Data</button>
	<button class="tablink" onclick="openPage('RetrieveData', this, '#1c77ac')">Retrieve Data</button>
	<button class="tablink" onclick="openPage('About', this, '#9e363a')">About</button>

	<div id="Home" class="tabcontent">

		<div>
			<button type="button" class="btn btn-danger" style="float: right;">
				<a href="logout.php">Log out</a>
			</button>	
        </div>
        <?php include('Home.php') ?>
  		
	</div>

	<div id="EnterData" class="tabcontent">
		<?php include('dataentrypt.php') ?>
  		
	</div>

	<div id="RetrieveData" class="tabcontent">
  		<?php include('datadecrypt.php') ?>
	</div>

	<div id="About" class="tabcontent">
  		<?php include('about.php') ?>
	</div>

	<script>
	function openPage(pageName,elmnt,color) {
  		var i, tabcontent, tablinks;
  		tabcontent = document.getElementsByClassName("tabcontent");

  		for (i = 0; i < tabcontent.length; i++) {
    		tabcontent[i].style.display = "none";
  			}

  		tablinks = document.getElementsByClassName("tablink");
  		for (i = 0; i < tablinks.length; i++) {
    		tablinks[i].style.backgroundColor = "";
  			}
  		document.getElementById(pageName).style.display = "block";
  			elmnt.style.backgroundColor = color;
		}

	// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>

</body>
</html>
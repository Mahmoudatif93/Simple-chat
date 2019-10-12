<?php
	session_start();


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="home.css">
 	<title>welcomr to my chat</title>
 	<script type="text/javascript">

 					 function ajax() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				document.getElementById("ChatMessages").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "DisplayMessages.php", true);
			xhttp.send();
        }
	    
		setInterval(function(){ajax()} , 1000);
		
 	</script>
 </head>
 <body onload="ajax()">

 	<center><h2 style="color: orange;font-family: tahoma;font-size: 30px"> Weclome <span><?php echo $_SESSION['userName']; ?></span></h2></center>
 	<br><br>
 	<div id="ChatBig">
 		<div id="ChatMessages" class="scrollbar"></div>
 	</div>

	<form method="POST" >
 		<textarea id="ChatText"name="ChatText" placeholder="Type Message..."></textarea>
 		<input type="submit" value="Send" class="btn">
 	</form>
 </body>
 </html>



 <?php
 
	include "classes.php";
	include "conn.php";
 	if ($_SERVER['REQUEST_METHOD']=='POST') {
	 		if (isset($_POST['ChatText'])&&!empty($_POST['ChatText'])) {


			 	$req=$con->prepare("INSERT INTO chats(chatuserid,chatText) VALUES(:chatuserid,:chatText) ");
			 	$req->execute(array(
			 			'chatuserid'=> $_SESSION['userName'],
			 			'chatText'=>$_POST['ChatText']

			 	));
	 		
	 	}
 }


?>
















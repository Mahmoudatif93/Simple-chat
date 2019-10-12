<?php
session_start();

	include "conn.php";

			 	$req=$con->prepare("SELECT * FROM chats  ");
			 	$req->execute();
				$rows=$req->fetchall();
				$count=$req->rowCount(); 
				if ($count>0) {
					foreach ($rows as $row) {
					?>
				<div>
					<span style="font-style: italic;color:#5199FF"><?php echo $row['chatuserid'].' said..' ;?></span>&nbsp&nbsp&nbsp&nbsp
					<span style="color: white"  ><?php echo $row['chatText'].'<br>'?></span>

				</div>
					<?php


				}
			}	
 



 ?>
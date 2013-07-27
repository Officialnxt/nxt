---
published: false
---

<?php
	$database="sphider_db";

	$mysql_user = "root";

	$mysql_password = "password"; 

	$mysql_host = "localhost";
	



	$link = mysql_connect($mysql_host,$mysql_user,$mysql_password);

	

	mysql_query("SET character_set_results=utf8", $link);



    if ($link) {

        mysql_selectdb($database,$link);

	 }



?>
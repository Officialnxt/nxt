<?php
	if($_POST['submit']){
	require("connect.php");
	$url = mysql_real_escape_string(stripslashes(strip_tags($_POST['url'])));
	$name = mysql_real_escape_string(stripslashes(strip_tags($_POST['name'])));


		$uniqid = uniqid();

		$id_start = rand(1,9);

		$id = substr($uniqid,$id_start,5);

		$sql = mysql_query("SELECT * FROM Links WHERE url='$url'");
		$numrows = mysql_num_rows($sql);
		if($numrows == 0){

		$date = date("M d, Y");
		$str = file_get_contents($url);
		preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
		$title = stripslashes(strip_tags($title[1]));
		if($title){
		$name = mysql_real_escape_string(stripslashes(strip_tags($title)));
		}
		else 
			$name = $name;

		mysql_query("INSERT INTO Links VALUES('$id', '$name', '$url', '$date')");

			$sql = mysql_query("SELECT * FROM Links WHERE url='$url' AND Name='$name'");
			$numrows = mysql_num_rows($sql);
			if($numrows == 1){

			
				header("Location: http://localhost/");
			}
			else
				echo "<center><div class='alert alert-error'>
				An error occurred
				Your url was not
				submitted sadly
				</div></center>";

		}
		else
			echo "<center><div class='alert alert-error'>
			This url has been<br />
			Submitted already<br />
			Try another one
			</div></center>";


	
	}
	
	?>
		<form action='' method='post'>
	<input type='text' name='name' placeholder='Name...' maxlength='300' required><br />
	<input type='text' name='url' placeholder='Url...' required><br />
	<input id='submit' type='submit' name='submit' value='submit' class='successbtn'>
	</form>

	<a href='http://localhost/article.php'>Submit an Article</a><br />

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
		function file_get_contents_curl($url)
		{
		    $ch = curl_init();

		    curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		    $data = curl_exec($ch);
		    curl_close($ch);

		    return $data;
		}

		$html = file_get_contents_curl($url);

		//parsing begins here:
		$doc = new DOMDocument();
		@$doc->loadHTML($html);
		$nodes = $doc->getElementsByTagName('title');

		//get and display what you need:
		$title = $nodes->item(0)->nodeValue;

		$metas = $doc->getElementsByTagName('meta');

		for ($i = 0; $i < $metas->length; $i++)
		{
		    $meta = $metas->item($i);
		    if($meta->getAttribute('name') == 'description')
			$description = $meta->getAttribute('content');
		    if($meta->getAttribute('name') == 'keywords')
			$keywords = $meta->getAttribute('content');
		}

		if($title){
		$name = mysql_real_escape_string(stripslashes(strip_tags($title)));
		}
		else
		$name = $name;
		if (filter_var($url, FILTER_VALIDATE_URL) !== false){

		mysql_query("INSERT INTO Links VALUES('$id', '$name', '$url', '$date')");

			$sql = mysql_query("SELECT * FROM Links WHERE url='$url' AND name='$name'")or die(mysql_error());
			$numrows = mysql_num_rows($sql);
			if($numrows == 1){

			echo "<div class='alert alert-success'><center>Your url has been submitted!</center></div>";			


			}
			else
				echo "<center><div class='alert alert-error'>
				An error occurred
				Your url was not
				submitted sadly
				</div></center>";

			}
			else
				echo "<center><div class='alert alert-error'>The url you submitted was not valid!</div></center>";

		}
		else
			echo "<center><div class='alert alert-error'>
			This url has been<br />
			Submitted already<br />
			Try another one
			</div></center>";


	
	}
	
	?>

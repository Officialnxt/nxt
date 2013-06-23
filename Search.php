		<?php
	require("connect.php");
	$search = strip_tags(stripslashes($_GET['search']));
	if($search){
		if(preg_match("/[A-Za-z-0-9]+/", $_GET['search'])){
			$hash = sha1(rand().microtime());
			$date = date("F d, Y");
			mysql_query("INSERT INTO History VALUES('', '$hash', '$search', '$date')");

			echo "<h2>Results For $search</h2>"; 

			$api = 'EEPV7E-AGQVW8UJRL'; // Wolfram Api ID
			$url = "http://api.wolframalpha.com/v2/query?podindex=2&format=plaintext&appid=" . $api . "&input=" . urlencode($search); // The Url To Fetch the Result
			$do = file_get_contents($url); // Result Stored in $do
			$answer = preg_match('/<plaintext>(.*)<\/plaintext>/i', $do, $out); // Take out Result 
			if ($answer){
			    echo "<blockquote>
			<p><h2>";
			echo $out[1];
			echo "</h2></p>
			<small>Wolfram Alpha</small>
			</blockquote><br />";
			}
			
			$sql= mysql_query("SELECT * FROM Graphs
    WHERE MATCH (name) AGAINST ('$search') LIMIT 2");
			$numrows = mysql_num_rows($sql);
			if($numrows >= 1){
			while($row = mysql_fetch_assoc($sql)){

				$id = $row['id'];
				$name = $row['name'];
				$html = $row['html'];
				$source = $row['source'];
				$date = $row['date'];
				echo "<a target='_blank' href='$source'>$name</a><br />";
				echo "$html <hr />";
			
				}
			
			}	



			$sql= mysql_query("SELECT * FROM Links
    WHERE MATCH (name) AGAINST ('$search') LIMIT 12")or die(mysql_error());
			$numrows = mysql_num_rows($sql);
			if($numrows >= 1){
			while($row = mysql_fetch_assoc($sql)){
					
				$id = $row['id'];
				$name = $row['name'];
				$url = $row['url'];
				$date = $row['date'];
				
				echo "<img src='https://plus.google.com/_/favicon?domain=$url' class='img-polaroid'> <a target='_blank' href='$url'>$name</a> | <a href='http://localhost/spam.php?id=$id'>Spam</a><br/>";

				$charset = 'UTF-8';
				$length = 45;
				if(mb_strlen($url, $charset) > $length) {
				$url = mb_substr($url, 0, $length, $charset) . '...';
				}   
				
				echo "<p class='muted'>$url</p><hr />";
			
			
				}
			
			}

							
		}
		else
		echo "<center><div class='alert alert-error'>
		Improper Input<br />
		Letters and numbers only<br />
		Do not use symbols
		</div></center>";
	}
	else
		header("Location: http://nxt.comxa.com/");

      ?>

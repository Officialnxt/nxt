	<?php
	require("connect.php");
	$search = stripslashes(strip_tags($_GET['search']));
	if($search){
		if(preg_match("/[A-Za-z-0-9]+/", $_GET['search'])){
			$hash = sha1(rand().microtime());
			$date = date("F d, Y");
			mysql_query("INSERT INTO History VALUES('', '$hash', '$search', '$date')");

			 

			echo "<h2>Results For $search</h2>"; 

			$search = mysql_real_escape_string($search);

			$sql= mysql_query("SELECT *,
       MATCH (name) AGAINST ('$search') AS relevance,
       MATCH (name) AGAINST ('$search') AS title_relevance
FROM Feeds
WHERE MATCH (name) AGAINST ('$search')
ORDER BY title_relevance DESC, relevance DESC LIMIT 1")or die(mysql_error());
			$numrows = mysql_num_rows($sql);
			if($numrows >= 1){
			while($row = mysql_fetch_assoc($sql)){
			$id = $row['id'];
			$name = $row['name'];
			$url = $row['url'];
			$date = $row['date'];
			
			$html = "";
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($curl);
			$xml = simplexml_load_string($data);
			for($i = 0; $i < 1; $i++){
	
			$title = html_entity_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = html_entity_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html = "<blockquote>
  <p>
<h3>$name</h3>
<h3><a target='_blank' href='$link'>$title</a></h3>
$description
</p>
  <small>$name <cite title='$title'>$title</cite> $pubDate</small>
</blockquote><br />";
			} 
			echo $html;

		
			}

			}


			
			$sql= mysql_query("SELECT *,
       MATCH (name) AGAINST ('$search') AS relevance,
       MATCH (name) AGAINST ('$search') AS title_relevance
FROM Links
WHERE MATCH (name) AGAINST ('$search')
ORDER BY title_relevance DESC, relevance DESC LIMIT 12");
			$numrows = mysql_num_rows($sql);
			if($numrows >= 1){
			while($row = mysql_fetch_assoc($sql)){
					
				$id = $row['id'];
				$name = html_entity_decode($row['name']);
				$url = html_entity_decode($row['url']);
				$date = $row['date'];

				echo "<img src='https://plus.google.com/_/favicon?domain=$url' class='img-polaroid'> <a target='_blank' href='$url'>$name</a> | <a href='spam?id=$id'>Spam</a><br/>";

				$charset = 'UTF-8';
				$length = 45;
				if(mb_strlen($url, $charset) > $length) {
				$url = mb_substr($url, 0, $length, $charset) . '...';
				}   
				
				$url = parse_url($url, PHP_URL_SCHEME).'://'.parse_url($url, PHP_URL_HOST);

				echo "<a target='_blank' href='$url'><p class='muted'>$url</p></a><hr />";
				}

				echo "<div class='muted'><a href='rss?search=$search'>RSS</a></div><hr />";
			}


			// Insert this block of code at the very top of your page: 

			$time = microtime(); 
			$time = explode(" ", $time); 
			$time = $time[1] + $time[0]; 
			$start = $time; 

			// Place this part at the very end of your page 

			$time = microtime(); 
			$time = explode(" ", $time); 
			$time = $time[1] + $time[0]; 
			$finish = $time; 
			$totaltime = ($finish - $start); 
			printf ("<p class='muted'>Loaded page in %f seconds", $totaltime, "</p>");

							
		}
		else
		echo "<center><div class='alert alert-error'>
		Improper Input<br />
		Letters and numbers only<br />
		Do not use symbols
		</div></center>";
	}
	else
		echo "<div class='alert alert-success'><center>Give us a query & we will give you the world!</center></div>";

      ?>

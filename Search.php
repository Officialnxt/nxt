	<?php
	require("connect.php");
	$search = mysql_real_escape_string(strip_tags(stripslashes($_GET['search'])));
	if($search){
		if(preg_match("/[A-Za-z-0-9]+/", $_GET['search'])){
			$hash = sha1(rand().microtime());
			$date = date("F d, Y");
			mysql_query("INSERT INTO History VALUES('', '$hash', '$search', '$date')");

			echo "<h2>Results $search</h2>"; 
			$sql= mysql_query("SELECT * FROM Def WHERE Word LIKE '%" . $search . "%' OR Def LIKE '%" . $search  ."%'");
			$numrows = mysql_num_rows($sql);
			if($numrows >= 1){
			while($row = mysql_fetch_assoc($sql)){

				$id = $row['id'];
				$word = $row['Word'];
				$def = $row['Def'];
				$date = $row['Date'];	
				echo "<b>$word</b><br />";
				echo "$def<hr />";
			
				}
			
			}
			
			$sql= mysql_query("SELECT * FROM Graphs WHERE name LIKE '%" . $search . "%' OR source LIKE '%" . $search  ."%'");
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
			
			$url="http://search.twitter.com/search.rss?q=$search&rpp=2&show_user=true&include_entities=true&lang=en";
			$twitter_xml = simplexml_load_file($url); 

			foreach ($twitter_xml->channel->item as $key) {
			    $author = $key->{"author"};
			    $date = $key->{"pubDate"};
			    $link = $key->{"link"};
			    $title = $key->{"title"};
			    $g = $key->children("http://base.google.com/ns/1.0"); 
			    $profimg = $g->{"image_link"};
				echo"<a target='_blank' href=$link><img width=48 height=48 src=\"$profimg\"></a>
				$title<br />
				$date<hr />";
			    $xml = $twitter_xml;
			}


			$sql= mysql_query("SELECT * FROM Links WHERE url LIKE '%" . $search . "%' OR Name LIKE '%" . $search  ."%' OR Name='$search' OR url='$search' LIMIT 12");
			$numrows = mysql_num_rows($sql);
			if($numrows >= 1){
			while($row = mysql_fetch_assoc($sql)){
					
				$id = $row['id'];
				$name = $row['Name'];
				$url = $row['url'];
				$date = $row['date'];
				//$tags = get_meta_tags("$url");
				$description = $tags["description"];
				$author = $tags['author'];
				$keywords = $tags['keywords'];
				
				$str = file_get_contents($url);
				preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
				$Title = stripslashes(strip_tags($title[1]));
				if($Title){
				echo "<a target='_blank' title='$name' href='http://nxt.comxa.com/$id'>$Title</a> | <a href='http://nxt.comxa.com/spam?id=$id'>Spam</a><br />";
				}
				else 
				echo "<a target='_blank' href='http://nxt.comxa.com/$id'>$name</a> | <a href='http://nxt.comxa.com/spam?id=$id'>Spam</a><br/>";
				    
				
				echo "$url<hr />";
				//echo "$description<br />";
			
			
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

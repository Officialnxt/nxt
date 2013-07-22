<!DOCTYPE HTML>
<html>
  <head>
    <title>NXT</title>
  </head>
<body>
		<a id='link1' href='#'><h2>World News</h2></a>
		<div id='world'>

		<a id='link1' title='hide/show' href='#'><h2>World News</h2></a>
		<div id='world'>
		<?php

		$html = "";
		$url = "http://feeds.bbci.co.uk/news/rss.xml";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
		
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank' href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		
		<a id='link2' title='hide/show' href='#'><h2>Sports</h2></a>
		<div id='sport'>
		<?php
		$html = "";
	$url = "http://sports.espn.go.com/espn/rss/news";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		<a id='link3' title='hide/show' href='#'><h2>Tech</h2></a>
		<div id='tech'>
		<?php
		$html = "";
		$url = "http://feeds.arstechnica.com/arstechnica/technology-lab";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		<a id='link4' title='hide/show' href='#'><h2>Other</h2></a>
		<div id='other'>
		<?php
		$html = "";
		$url = "http://digg.com/rss/top.rss";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>
		</div>

		<a id='link5' title='hide/show' href='#'><h2>Satire</h2></a>
		<div id='satire'>
		<?php
		$html = "";
		$url = "http://feeds.feedburner.com/theonion/RWNp";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
		$title = utf8_decode($xml->channel->item[$i]->title);
		$link = $xml->channel->item[$i]->link;
		$description = utf8_decode($xml->channel->item[$i]->description);
		$pubDate = $xml->channel->item[$i]->pubDate;
	
		$html .= "<a target='_blank'  href='$link'>$title</a><br />";
		$html .= "$description";
		$html .= "<br />$pubDate<hr />";
		} 
		echo $html;
		?>
		</div>
      		</td>
		<td>

		<?php

		$html = "";
		$url = "http://news.yahoo.com/rss/";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;

		?>

		<b>Stocks</b><hr />

		<?php

		$html = "";
		$url = "http://rss.cnn.com/rss/money_markets.rss";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;

		?>

		<b>Culture</b><hr />

		<?php

		$html = "";
		$url = "http://www.bbc.com/culture/feed.rss";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;

		?>

		<b>Gamming</b><hr />

		<?php

		$html = "";
		$url = "http://n4g.com/rss/news?channel=&sort=latest";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;

		?>

		<b>Music</b><hr />

		<?php
		$html = "";
		$url = "http://www.rollingstone.com/siteServices/rss/musicNewsAndFeature";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$xml = simplexml_load_string($data);
		for($i = 0; $i < 1; $i++){
	
			$title = utf8_decode($xml->channel->item[$i]->title);
			$link = $xml->channel->item[$i]->link;
			$description = utf8_decode($xml->channel->item[$i]->description);
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		} 
		echo $html;
		?>

      	</td>


</body>
</html>

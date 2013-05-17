<!DOCTYPE HTML>
<html>
  <head>
    <title>NXT</title>
  </head>
<body>
		<a id='link1' href='#'><h2>World News</h2></a>
		<div id='world'>
				<a href='http://nxt.comxa.com/discover'><h1>Discover</h1></a><hr />

		<a id='link1' title='hide/show' href='#'><h2>World News</h2></a>
		<div id='world'>
		<?php
		$html = "";
		$url = "http://feeds.bbci.co.uk/news/rss.xml";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank' href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		
		<a id='link2' title='hide/show' href='#'><h2>Sports</h2></a>
		<div id='sports'>
		<?php
		$html = "";
		$url = "http://news.yahoo.com/rss/sports";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
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
		$url = "http://feeds.feedburner.com/TechCrunch/";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		<a id='link4' title='hide/show' href='#'><h2>Gamming</h2></a>
		<div id='gamming'>
		<?php
		$html = "";
		$url = "http://news.yahoo.com/rss/gaming";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		} 
		echo $html;
		?>		
		</div>

		<a id='link5' title='hide/show' href='#'><h2>Other</h2></a>
		<div id='other'>
		<?php
		$html = "";
		$url = "http://digg.com/rss/top.rss";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
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
		$url = "http://rss.cnn.com/rss/money_markets.rss";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;

		?>

		<b>Bitcoin Exchange Rates</b><hr />

		<?php

		$url = 'https://blockchain.info/ticker';
		$content = file_get_contents($url);
		$json = json_decode($content, true);

		$usd = $json['USD']['last'];
		$cny = $json['CNY']['last'];
		$jpy = $json['JPY']['last'];
		$sgd = $json['SGD']['last'];
		$hkd = $json['HKD']['last'];
		$cad = $json['CAD']['last'];
		$aud = $json['AUD']['last'];
		$nzd = $json['NXD']['last'];
		$eur = $json['EUR']['last'];
		$rub = $json['RUB']['last'];

		echo "<b>USD:</b> $usd<br />";
		echo "<b>CNY:</b> $cny<br />";
		echo "<b>JPY:</b> $jpy<br />";
		echo "<b>SGD:</b> $sgd<br />";
		echo "<b>HKD:</b> $hkd<br />";
		echo "<b>CAD:</b> $cad<br />";
		echo "<b>AUD:</b> $aud<br />";
		echo "<b>NZD:</b> $nzd<br />";
		echo "<b>EUR:</b> $eur<br />";
		echo "<b>RUB:</b> $rub<hr />";						

		?>
	
		</div>
      	</td>


</body>
</html>

<?php  
	require("connect.php");
	$sql = mysql_query("SELECT * FROM Links ORDER BY RAND() LIMIT 1");
	$row = mysql_fetch_assoc($sql);
	$randid = $row['id'];
	$id = $_GET['id'];
	if($id){
	echo "<a href='http://nxt.comxa.com/discover?id=$randid' class='btn btn-success'>Discover</a> ";
	$sql = mysql_query("SELECT * FROM Links WHERE id='$id'");
	$numrows = mysql_num_rows($sql);
	if($numrows == 1){
	$row = mysql_fetch_assoc($sql);
	$id = $row['id'];
	$name = $row['Name'];
	$url = $row['url'];
	$date = $row['date'];


	echo "<h3><a href='http://nxt.comxa.com/$id'>$name</a></h3>";
	
	echo "<iframe width='100%' height='500px' src='$url'></iframe>";

	echo "<div id='fb-root'></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/en_US/all.js#xfbml=1&appId=379018618880699';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
	echo "<div class='fb-like' data-href='$url' data-send='true' data-width='450' data-show-faces='true'></div>";

	echo "<a href='https://twitter.com/share' class='twitter-share-button' data-url='$url' data-via='AskNxt'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> ";	

	}
	else
	echo "<div class='alert alert-error'>An error occured.</div>";

	}
	else{

	

	echo "<center><h2><b>Discover</b> Somehthing New...</h2></center><br />";

	echo "<center><img src='http://i.imgur.com/PF9gYyA.png' class='img-polaroid'></center><br />";	

	$sql = mysql_query("SELECT * FROM Links ORDER BY RAND()");
	$row = mysql_fetch_assoc($sql);
	$id = $row['id'];


	echo "<a href='http://nxt.comxa.com/discover?id=$id' class='btn btn-large btn-block btn-success' type='button'>Discover</a>";


	}

	?>

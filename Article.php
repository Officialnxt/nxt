<!DOCTYPE HTML>
<html>
  <head>
  </head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="shortcut icon" href="/icologo.ico" type="image/png">
<link rel="shortcut icon" type="image/ico" href="http://www.example.com/favicon.png" />
<script type="text/javascript">
var timeOut;
function scrollToTop() {
  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
    window.scrollBy(0,-50);
    timeOut=setTimeout('scrollToTop()',10);
  }
  else clearTimeout(timeOut);
}
</script>
<body>
<style>
::-webkit-scrollbar {
    width: 8px;
}
 
::-webkit-scrollbar-track {
    background-color: #E0E0E0;
}
 
::-webkit-scrollbar-thumb { 
    background-color: #C0C0C0;
}

.successbtn{
height: 37px;
width: 152px;
background-color: #2ECC71;
border: 2px solid #2ECC71;
color: #FFFFFF;
}

.successbtn:hover{
background-color: #27AE60;
border: 2px solid #27AE60;
}

a,
.btn,
.navbar-inner,
.btn-navbar,
.progress,
.progress .bar {
  background-image: none!important;
}

* {
  -webkit-box-shadow: none!important;
     -moz-box-shadow: none!important;
          box-shadow: none!important;

    text-shadow: none!important;

  -webkit-border-radius: 0!important;
     -moz-border-radius: 0!important;
          border-radius: 0!important;
}
::-moz-selection { 
background-color: #2ECC71; 
color: #ffffff;
}

::selection {
background-color: #2ECC71;
color: #ffffff;
}
</style>
<?php
error_reporting(0);
session_start();

$searchsess = $_SESSION['search'];
?>
<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
      <li class="active"><a href="http://www.swiftbitcoins.com/"><img src="/images/glyphicons_020_home.png"> Home</a></li>
      <li><a href="submit"><img src="/images/glyphicons_150_edit.png"> Sumbit</a></li>
    </ul>
    <form class="navbar-search pull-right" method='get' action='search.php'>
  <input type="text" name='search' id='search' class="search-query" value='<?php echo "$searchsess"; ?>' placeholder="Search..." x-webkit-speech>
</form>
  </div>
</div>


<div class="page-header">
  <h1>NXT<small> The world's information.</small></h1>
</div>
<table class="table table-bordered" cellspacing="10px">
  <caption></caption>
  <thead>
    <tr class="success">
      <th><img src="/images/glyphicons_150_edit.png"></img> Articles</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
	<?php
	if($_GET['id']){
	require("connect.php");
	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM Articles WHERE id='$id'");
	$numrows = mysql_num_rows($sql);
	if($numrows == 1){
	$row = mysql_fetch_assoc($sql);
	$id = $row['id'];
	$title = $row['title'];
	$text = nl2br($row['text']);
	$sources = nl2br($row['sources']);
	$date = $row['date'];

	echo "<h1>$title</h1><br />";

	echo "<blockquote>
	<p>$text</p>
	<small>$date <cite title='Source Title'>$title</cite></small>
	</blockquote><br />";

	
	echo "<p class='muted'>
	$sources
	</p>";

	}
	else
		header("Location: http://nxt.comxa.com/");
	}
	else{
	?>
	<?php
	require("connect.php");
	$allow = '<img><a><b><i><u><iframe><h1><h2><h3><h4><h5><p><div><li><ul><table><tr><td><code></code><pre></pre></td></tr></table></ul></li></div></p></h5></h4></h3></h2></h1></iframe></a></b></i></u>';

	$title = mysql_real_escape_string(stripslashes(strip_tags($_POST['title'])));
	$text = nl2br(mysql_real_escape_string(stripslashes(strip_tags($_POST['text'], $allow))));
	$sources = mysql_real_escape_string(stripslashes(strip_tags(nl2br($_POST['sources']))));
	if($_POST['submit']){
	if($title){

		if($text & $sources){
		
			$sql = mysql_query("SELECT * FROM Articles WHERE title='$title' AND text='$text' AND sources='$sources'");
			$numrows = mysql_num_rows($sql);
			if($numrows == 0){

			$date = date("M d, Y");

			$uniqid = uniqid();
			$id_start = rand(1,9);
			$id = substr($uniqid,$id_start,5);
			mysql_query("INSERT INTO Articles VALUES('$id', '$title', '$text', '$sources', '$date')");				
			
			$sql = mysql_query("SELECT * FROM Articles WHERE title='$title' AND text='$text' AND sources='$sources'");
			$numrows = mysql_num_rows($sql);
			if($numrows == 1){

			$url = "article.php?id=$id";
			mysql_query("INSERT INTO Links VALUES('$id', '$title', '$url', '$date')")or die(mysql_error());

				echo "<div class='alert alert-success'>Your article has been submitted!</div>";
			
			}
			else
				echo "<center><div class='alert alert-error'>
				An error occurred
				Your article was not
				submitted sadly
				</div></center>";

			}
			else
				echo "<center><div class='alert alert-error'>
				This article has<br />
				Been sumbitted already<br />
				Please don't plagiarise
				</div></center>";

		}
		else
			echo "<center><div class='alert alert-error'>
			You must submit some<br />
			Text for your article<br />
			Please try adding some
			</div></center>";

	}
	else
		echo "<center><div class='alert alert-error'>
		You must submit a<br />
		Name for your article<br />
		Please try adding one
		</div></center>";
	}
	?>
	<form method='post'>
	<input type='text' name='title' placeholder='Title...' required><br />
	<textarea name='text' rows='7' placeholder='Text...' required></textarea><br />
	<textarea name='sources' rows='5' placeholder='Sources EX: Cain, Kevin. "The Negative Effects of Facebook on Communication." Social Media Today RSS N.p., 29 June 2012...' required></textarea><br />
	<input type='submit' name='submit' class='successbtn'>
      </form>

	<a href='faq'>Check out the FAQ for more info on sources/citing</a>
	<?php
	}
	?>
     </td>
    </tr>
  </tbody>
</table>
NXT 2013 - Mundi informationes<br />
<a target='_blank' href='http://thenxt.tumblr.com/'>Blog</a> | <a target='_blank' href='http://twitter.com/asknxt'>@AskNXT</a> | <a href='http://officialnxt.github.io/nxt' target='_blank'>Github</a> | <a href='http://nxt.comxa.com/donate'>Donate!</a> | <a href='http://nxt.comxa.com/faq'>FAQ</a> | <a href="#" onclick="scrollToTop();return false">Top</a>
</body>
</html>

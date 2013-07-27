<?php
//start session
session_start();

//include functions
  include_once ("sphider/include/commonfuncs.php");
  
  require_once('sphider/settings/db_search.php'); 
  require_once('sphider/settings/conf.php');
  require_once("sphider/include/searchfuncs.php");
  include_once ("sphider/settings/en-language.php");

$search =1;

//extract(getHttpVars());

if (isset($_GET['query']))
	$query = $_GET['query'];
if (isset($_GET['search']))
	$search = $_GET['search'];
if (isset($_GET['domain'])) 
	$domain = $_GET['domain'];
if (isset($_GET['results'])) 
	$results = $_GET['results'];
if (isset($_GET['start'])) 
	$start = $_GET['start'];
if (isset($_GET['category'])) 
	$category = $_GET['category'];
if (isset($_GET['type'])) 
	$type = $_GET['type'];	

$str = substr($query, 0, 5);
$site = substr($query, 5);
$qsite = substr($query, 9);
$pos = strstr($qsite, '.');
$name = rtrim($qsite, $pos);
if ($str == 'site:') {	
header("Location: results.php?query=$name&search=1&results=10&domain=$site");
}	


if (preg_match("/[^a-z0-9-.]+/", $domain)) {
	$domain="";
}


if ($results != "") {
	$results_per_page = $results;
}

if (get_magic_quotes_gpc()==1) {
	$query = stripslashes($query);
} 

   if ($query !='') {
   include_once ("include/websfunctions.php");
   }
   
   mysql_close($link);
?>

<?php
//include($_SERVER['DOCUMENT_ROOT'].'/crownfire/members/includes/init.php');
include($_SERVER['DOCUMENT_ROOT'].'/members/includes/init.php');
if (empty($_SESSION['user_id'])) {
	header("Location: /login.php");
	exit();
}
?>
<!DOCTYPE html>
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="description" content=" ">
<meta name="keywords" content=" ">

	<title>Crownfire</title>
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="js/jquery_002.js"></script>
	<!--<script type="text/javascript" src="js/crownfire2010.js"></script>-->
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <script type="text/javascript" src="../crownfireadmin/js/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
	<link rel="stylesheet" href="css/crownfire2010.css" media="screen" type="text/css" />
	<!--<link rel="stylesheet" href="css/uniform.css" media="screen" type="text/css" />-->
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10355921-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style>
    #blank_report legend{
        font-style: italic;
    }
    #blank_report h3{
        font-weight: bold;
    }
    #blank_report table{
        margin: 20px 0px;
    }
    
    input, select, textarea {
    background: white;
    border: 1px solid #BED1DF;
    padding: 3px;
    width: 300px;
    -moz-border-radius: 3px;
    }
</style>
</head>
<body>
	<div id="header" style="padding-left: 0px;">
            <div class="tupperware">
                    <h1 class="tupperwareheader"><a href="/" title="Crownfire Equipment LTD">Crownfire Equipment LTD</a></h1>
                    <div id="headerText">
                            <div  style="width: 180px; float: left;">
                                    <h4>Contact Us</h4>
                                    <ul class="telephone_list">
                                            <li><strong>Toll-free</strong> (877) 243-9664</li>
                                            <li><strong>Ajax</strong> (905) 427-8441</li>
                                            <li><strong>Brantford</strong> (519) 756-8962</li>
                                            <li><strong>Toronto</strong> (905) 851-9119</li>
                                    </ul>
                            </div>
                            <div  style="width: 300px; float: left;">
                                    <ul class="telephone_list">
                                            <h4>&nbsp; </h4>
                                            <li><strong>Mississauga</strong> (905) 670-5122</li>
                                            <li><strong>Newmarket</strong> (905) 868-8599</li>
                                            <li><strong>Hamilton, Burlington, Dundas</strong> (905) 521-0333</li>
                                    </ul>
                            </div>
                    </div>
            </div>
        </div>
	<div id="nav">
		<ul class="tupperware">
			<?php
			include($_SERVER['DOCUMENT_ROOT'].'/includes/nav.php');
			?>
		</ul>
	</div>

	<div id="content_area" class="right_column">
		<div class="tupperware" style="background: none; background-color: white;">
			<div id="blank_report" style="width:920px; padding:20px;">
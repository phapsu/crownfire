<script type="text/javascript" src="http://theahl.com/js/n_jquery.min.js"></script>
<script src="http://theahl.com/js/jsr_class.js" type="text/javascript"></script>
<script src="http://theahl.com/js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
<script src="http://theahl.com/js/date.format.js" type="text/javascript"></script><script src="scores_sort.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="n_main.css"/>
<link rel="stylesheet" type="text/css" href="http://theahl.com/css/fontface.css"/>


<div id="scoreBoard">
<a id="sb_next" class="left_btn"><i></i></a>
<a id="sb_prev" class="right_btn"><i></i></a>
<h6>Loading Scores...</h6>
<fieldset id="tray" class="tray">
<legend></legend>
</fieldset >
<div class="scoreBox" id="sbClone" onclick=''>
<h2><a href="###">Boxscore</a></h2>
<h3></h3>
<dl>
<dt></dt>
<dd></dd>
</dl>
<dl>
<dt></dt>
<dd></dd>
</dl>
<!--<div class="score_social"><a href="#" class="s1"><img alt="" src="/files/s1.png"></a><a href="#" class="s2"><img alt="" src="/files/s2.png"></a><a href="#" class="s3"><img alt="" src="/files/s3.png"></a></div>-->
<span class="gameStatus"></span></div></div>

<script type="text/javascript">
scoreBit = true;
var client_code = 'ahl';
var league_code = 'ahl';
var lang_code	= 'en';
var type  = 'scorebar';
var now  = new Date();

var date  = String(now.getFullYear()+"-"+(Number(now.getMonth())+1)+"-"+now.getDate());
/* USE 2010-10-08 for data */
var forcedate ="<?php echo $_REQUEST['forcedate']; ?>";
var now  = new Date();
$(function(){
	if(scoreBit==true){
		addScript();
	}
});

$("#sb_next").click(function(){
  var next = parseInt($("#tray1").css('left'));
  next = next + 95;
  var max = $("#tray1").width() + 960;
  console.log(next, max);
  if(next > 20) {
  	return;
  }

  $("#tray1").animate({"left": "+=95px"}, "slow");
});

$("#sb_prev").click(function(){
  var next = parseInt($("#tray1").css('left'));
  console.log(next);
  next = next - 95;
  var max = $("#tray1").width() - 960;
  if(max+next < 0) {
  	return;
  }
  $("#tray1").animate({"left": "-=95px"}, "slow");
});


</script>

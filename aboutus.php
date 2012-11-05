<?php
include('templates/header.template.php');
?>
<script>
$(function() {
    $('#gallery a').lightBox();
});
</script>
<h1>About us</h1>
<title>Crownfire | Best Fire Protection & Life Safety Services</title>
<div id="gallery">
<table width="100%">
 <tr>
  <td>
	<ul><li><a href="img/mission.png"><img src="img/missionSmall.png" /></a></li></ul>
  </td>
  <td>
    <ul><li><a href="img/value.png"><img src="img/valueSmall.png" /></a></li></ul>
  </td>
 </tr>
 <tr>
  <td><ul><li><a href="img/accessment.png"><img src="img/accessmentSmall.png" /></a></li></ul></td>
  <td><ul><li><a href="img/vision.png"><img src="img/visionSmall.png" /></a></li></ul></td>
 </tr>
</table>
</div>
<?php
include('templates/footer.template.php');
?>

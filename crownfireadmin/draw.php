<!DOCTYPE html>
<html>
  <head>
    <title>Draw </title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
    <!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
    <script type="text/javascript" src="js/html5-canvas-drawing-app.js"></script>
    <script>
        function saveIt() {
           var canvasData = document.getElementById("canvas").toDataURL('image/png') + '||' + '<?=$_GET['document_id']?>';
           var ajax = new XMLHttpRequest();
           ajax.open("POST",'draw_do.php',false);
           ajax.setRequestHeader('Content-Type', 'application/upload');
           ajax.send(canvasData);
           var testDiv = window.opener.jQuery("#hydrantImage");
           testDiv.html('<img src="'+ajax.responseText+'" />');
           $('.image').hide();
           $('#success').show();
        }
    </script>

	<style>
	#canvasSimpleDiv {
		border: 1px solid #333333;
		cursor: pointer;
		height: 220px;
		width: 490px;
	}
	</style>
  </head>
  <body>
    
	<div class="image">
		<p class="demoToolList">Clear the canvas: <button id="clearCanvas" type="button">Clear</button></p>
		<div id="canvasSimpleDiv"></div>
		<br />
		<input type="button" id="save" value="Save Drawing" onClick="saveIt();">
	</div>
	
	<div id="success" style="display: none;">
		Success.  Your image has been saved.
		<br /><br />
		<a href="#" onClick="window.close();">Close Window</a>
	</div>
	
    <script type="text/javascript">
    	$(document).ready(function() {
	    	 prepareCanvas();
			 $('#clearCanvas').click(function(e) {
				clickX = new Array();
				clickY = new Array();
				clickDrag = new Array();
				clearCanvas(); 
			});
		});
	</script> 
  </body>
</html>
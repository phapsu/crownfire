			</div>
		</div>
	</div>
<script>
$('#hideWindow').click(function() {
  $('#userWindow').hide('slow', function() {
    // Animation complete.
  });
  $('#minUserWindow').show('slow', function() {
	    // Animation complete.
  });

  $.get("set_option.php", { option_key: "show_user_window", option_value: "0", user_id: "<?=$_SESSION['user_id']?>" } );
});

$('#minUserWindow').click(function() {
	  $('#minUserWindow').hide('slow', function() {
	    // Animation complete.
	  });
	  $('#userWindow').show('slow', function() {
		    // Animation complete.
	  });

	  $.get("set_option.php", { option_key: "show_user_window", option_value: "1", user_id: "<?=$_SESSION['user_id']?>" } );
});
</script>
<?php
$string = $_SERVER['PHP_SELF'];
?>
<a href="<?=$cfg['site_url']?>/crownfireadmin/bug.php?page=<?=urlencode($string)?>&vars=<?=urlencode($_SERVER['QUERY_STRING'])?>"><img border="0" src="images/bug.png" align="right" /></a>
</body>
</html>
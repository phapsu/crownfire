<?php

echo 'sssss'
$link = mysql_connect('localhost', 'opdi_demo', 'after2011');
if (!$link) {
  print_r('Not connected : ' . mysql_error());
}

// make opdi_demo the current db
$db_selected = mysql_select_db('opdi_demo', $link);
if (!$db_selected) {
  print_r ('Cannot use opdi_demo : ' . mysql_error());
}
?>
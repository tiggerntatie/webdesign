<?php
$link = mysql_connect('localhost', 'webdesign99', 'frakshus');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

// make webdesign the current db
$db_selected = mysql_select_db('webdesign', $link);
if (!$db_selected) {
    die ('Can\'t use webdesign : ' . mysql_error());
}

mysql_close($link);

/* $source = highlight_file("dbconnect.php");
echo $source;
*/
?>
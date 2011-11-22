<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Post Echo</title>
</head>
<body>
<dl>
<?php 

foreach ($_POST as $key=>$value) {
  echo "<dt>$key</dt><dd>$value</dd>\n";
}

?>

</dl>
</body>
</html>
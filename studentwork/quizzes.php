<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="http://www.netdenizen.com/webdesign/screen.css" type="text/css" media="screen" />
	<title>HHS Web Design Student Quizzes</title>
</head>
<body>
<h1>Web Design - Fall 2011 - Student Quizzes</h1>

<h2>Important Links</h2>
<ul class='navigation'>
  <li><a href="./index.html">Web Design Home</a></li>
  <li><a href="./calendar.html">Assignment Calendar</a></li>
</ul>

<?php
require('accounts.php');
require('quizassignment.php');

foreach($challenges as $challenge) {
  echo("<h2>$challenge->name</h2>\n");
  echo("<ul>\n");
  foreach($accounts as $account) {
    echo("  <li><a href='http://www.netdenizen.org/u/$account/$challenge->id.html'>$account</a></li>\n");
  }
  echo("</ul>\n\n");
}

?>
  <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
  </p>

</body>
</html>
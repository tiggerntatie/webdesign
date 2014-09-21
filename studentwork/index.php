<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="http://www.netdenizen.com/webdesign/screen.css" type="text/css" media="screen" />
	<title>HHS Web Design Student Work</title>
</head>
<body>
<h1>Web Design - Fall 2011 - Student Work</h1>

<ul class='h-navigation'>
  <li><a href="../index.html">Web Design Home</a></li>
  <li><a href="../calendar.html">Assignment Calendar</a></li>
  <li><a href="../studentwork">Student Work</a></li>
</ul>

<p>
  This is a summary of student work for the semester. Green blocks indicate that a
  web page was found for this assignment. If a block is white, no page was found (this does
  not necessarily mean that an assignment was not completed). Assignments that were complete when due,
  but subsequently erased, will appear as a white block. Even assignments with a green block may
  not appear as they originally did. Files are often modified after submission. A common CSS file
  that is changed frequently is another common reason for altered pages.
</p>

<?php
require('accounts.php');
require('assignment.php');

$studentlinks = array();
createstudentlinks($accounts, $assignments, $studentlinks, $rootpath);

echo ("<div class='clear'></div>\n");
echo ("<table class='studentwork'>\n");
echo ("  <caption>Student Work</caption>\n");
echo ("  <tr>\n");
echo ("    <th></th>\n");
foreach ($assignments as $assignment) {
  $duedate = date("m/d",$assignment->datedue);
  echo("    <th class='column'><a href='$assignment->assignurl'>$assignment->name<br /><span class='duedate'>$duedate</span></a></th>\n");
}
echo ("  </tr>\n");
foreach($accounts as $account) {
  echo("  <tr>\n    <th class='rox'>$account</th>\n");
  $numassignments = count($assignments);
  for ($i = 0; $i < $numassignments; $i++) {
    $assignment = $assignments[$i];
    $link = $studentlinks[$account][$i];
    $missingclass = "";
    $linktext = "&#10003;";
    $linkurl = "$rooturl/$link";
    if (!strlen($link)) {
      $missingclass = "class='missing'";
      $linktext = "?";
      $idealid = $assignment->getIdealid($account);
      $linkurl = "$rooturl/$idealid";
    }
    echo("    <td $missingclass><a class='work' href='$linkurl'>$linktext</a></td>\n");    
  }
  echo("  </tr>\n");
}

echo("</table>\n");
echo ("<div class='clear'></div>\n");

?>
  <p class='clear'>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
  </p>
  <p>
    Examine the <a href="view-source:./index.php">source HTML</a> used 
    by this web page (Firefox or Chrome).
  </p>
  <p>
    Examine the <a href="../screen.css">CSS </a> used by this web page.
  </p>

</body>
</html>

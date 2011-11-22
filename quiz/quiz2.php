<?php
require('quizengine.php');


$livedate = mktime(12,0,0,10,3,2011);  // 4 hour difference - 8 am oct 3, EDT
$enddate = mktime(13,0,0,10,3,2011);   // 9 am oct 3, EDT
$title = "Web Design Quiz 2";
$intro = "The second quiz in Web Design is intended to evaluate your ability to create a styled 
  web page on the netdenizen.org server. You can use any of your existing work, information from
  the Internet, or the Web Design resources I have already provided as a reference while you 
  complete this quiz. <strong>Please do not consult your neighbor, however.</strong> Please let
  me know when you are finished; you may begin working on the next challange when you are done.";
$tasklist = array(
  "Create a new file in your server quiz folder named <code>quiz2.html</code>. <em>The name is important</em>.",
  "Create a new file in your server quiz folder named <code>quiz2.css</code>.",
  "Edit the html file in TextWrangler to create an 'empty' html document. Make sure it validates.",
  "The title of this page should be 'Web Design Quiz 2'.",
  "Put a visible title on the page (big, bold letters) that also says, 'Web Design Quiz 2'.",
  "Add a paragraph that describes the difference between a CSS file and an HTML file.",
  "Add a rule in the CSS file that makes the background of your page light blue.",
  "Add a rule in the CSS file that makes the page title font 'helvetica'.",
  "Add a rule in the CSS file that makes the paragraph text dark red and twice as large as normal.",
  "Add an icon at the end of the page (inside another paragraph) that links to the web page validator. Your page should validate!");


$quiz = new Quiz($livedate, $enddate, $title, $intro, $tasklist);

$quiz->emithtml();

?>
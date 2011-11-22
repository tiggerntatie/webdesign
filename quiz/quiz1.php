<?php
require('quizengine.php');


$livedate = mktime(15,0,0,9,20,2011);  // 4 hour difference - 8 am sept 19, EDT
$enddate = mktime(17,0,0,9,20,2011);   // 9 am sept 19, EDT
$title = "Web Design Quiz 1";
$intro = "This first quiz in Web Design is intended to evaluate your ability to create a simple 
  web page on the netdenizen.org server. You can use any of your existing work, information from
  the Internet, or the Web Design resources I have already provided as a reference while you 
  complete this quiz. <strong>Please do not consult your neighbor, however.</strong> Please let
  me know when you are finished; you may begin working on the next challange when you are done.";
$tasklist = array(
  "Create a new folder in your netdenizen.org account, called <code>quiz</code>. 
    I can help you with this step if necessary.",
  "Create a new file in that quiz folder named <code>quiz1.html</code>. <em>The name is important</em>.",
  "Edit this file in TextWrangler to create an 'empty' html document. Make sure it validates.",
  "The title of this page should be 'Web Design Quiz 1'.",
  "Put a visible title on the page (big, bold letters) that also says, 'Web Design Quiz 1'.",
  "Add a paragraph that describes something you have learned in the course so far.",
  "Add an unordered list that lists as many HTML tags as you can remember (e.g. p, h1, etc. 
    You should be able to list at least two).");


$quiz = new Quiz($livedate, $enddate, $title, $intro, $tasklist);

$quiz->emithtml();

?>
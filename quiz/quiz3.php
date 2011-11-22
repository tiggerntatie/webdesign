<?php
require('quizengine.php');


$livedate = strtotime("7:55AM 10/28/2011 EDT");  
$enddate = strtotime("9:00AM 10/28/2011 EDT");   
$title = "Web Design Quiz 3";
$intro = "The third quiz in Web Design is intended to evaluate your ability to create a styled 
  web page on the netdenizen.org server using float and/or clear. You can use any of your 
  existing work, information from the Internet, or the Web Design resources I have already provided 
  as a reference while you complete this quiz. <strong>Please do not consult your neighbor, 
  however.</strong> Please let me know when you are finished; you may begin working on the next 
  challange when you are done.";
$tasklist = array(
  "Create a new file in your server quiz folder named <code>quiz3.html</code>. <em>The name is important</em>.",
  "Create a new file in your server quiz folder named <code>quiz3.css</code>.",
  "Edit the html file in TextWrangler to create an 'empty' html document. Make sure it validates.",
  "The <strong>title</strong> of this page should be 'Web Design Quiz 3'.",
  "Put a visible title on the page (big, bold letters) that also says, 'Web Design Quiz 3'.",
  "Add a paragraph that reads: 'This is some text on the left.' Using CSS put a border 
   around this paragraph, make it 10% of the browser window width and make it sit on the left hand
   side of the screen.",
  "Add a paragraph that reads: 'This is some text on the right.' Using CSS put a border
   around this paragraph, make it 10% of the browser window width and make it sit on the right hand
   side of the screen.",
  "Your page may look like this: <div><img src='quiz3.png' alt='Screen shot showing the desired outcome
  of quiz 3: a block sitting on the left hand side of the screen and another on the right' /></div>",
  "Add an icon at the end of the page (inside another paragraph) that links to the web page validator. Your page should validate!");


$quiz = new Quiz($livedate, $enddate, $title, $intro, $tasklist);

$quiz->emithtml();

?>
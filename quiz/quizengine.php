<?php

class Quiz {


  function __construct($start, $end, $title, $intro, $tasklist)
  {
    $this->start = $start;
    $this->end = $end;
    $this->title = $title;
    $this->intro = $intro;
    $this->tasklist = $tasklist;
  }

  function emitpreamble()
  {
    echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>$this->title</title>
</head>
<body>
<h1>$this->title</h1>
<p>$this->intro</p>";
  }
  
  function emitlist()
  {
    echo '<ol>';
    foreach ($this->tasklist as $task) {
      echo "<li>$task</li>";
    }
    echo '</ol>';
  }
  
  function emithtml()
  {
    $now = mktime();
    $this->emitpreamble();
    if ($now < $this->end && $now > $this->start)
    {
      $this->emitlist();
    }
    else
    {
      echo "<p>Sorry.. this quiz is not currently active.</p>";
    }
    echo '</body></html>';
  }
  
  
  
}
?>
<?php
// List of student accounts

$now = mktime();

class Challenge {

  function __construct(
    $num=1, 
    $id='challenge01', 
    $name='Challenge 1', 
    $dateassign=0, 
    $datedue=0) {
    
    $this->num=$num;
    $this->id=$id;
    $this->name=$name;
    $this->dateassign=$dateassign;
    $this->datedue=$datedue;
  }
}

$challenges = array(
  new Challenge(1, 'quiz/quiz1', 'Quiz 1', $now, $now),
  new Challenge(2, 'quiz/quiz2', 'Quiz 2', $now, $now),
  new Challenge(3, 'quiz/quiz3', 'Quiz 3', $now, $now),
  )
  



?>
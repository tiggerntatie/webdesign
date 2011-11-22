<?php

$webdesignurl = "http://www.netdenizen.org/webdesign";

require_once('accounts.php');
require_once('assignmentclass.php');
require_once('projectdefinitionclass.php');

$projects = array(
  new ProjectDefinition("fbhb", $curtism, array($curtism,$eliasc)),
  new ProjectDefinition("hanoveroutingclub", $erind, array($erind)),
  new ProjectDefinition("pjparty", $alexisw, array($alexisw, $monikad)),
  new ProjectDefinition("visithanover", $sophial, array($sophial)),
  new ProjectDefinition("encore", $hatties, array($hatties, $emmap)),
  new ProjectDefinition("iridescent", $clancyn, array($clancyn)),
  new ProjectDefinition("churchgroup", $asetf, array($asetf,$carlk)),
  new ProjectDefinition("vocalattack", $ethand, array($ethand)),
  new ProjectDefinition("magnolia", $maxc, array($maxc))
  );

$assignments = array(
  new Challenge($webdesignurl, 2,  "", '9/9/2011'),
  new Challenge($webdesignurl, 3,  "", '9/16/2011'),
  new Journal($webdesignurl, 1,  "", '9/22/2011'),
  new Index($webdesignurl, 4,  "", '9/23/2011'),
  new Journal($webdesignurl, 2, "", '9/29/2011'),
  new Challenge($webdesignurl, 5, "", '9/30/2011'),
  new Journal($webdesignurl, 3, "", '10/6/2011'),
  new Challenge($webdesignurl, 6, "", '10/7/2011'),
  new Journal($webdesignurl, 4, "", '10/13/2011'),
  new Challenge($webdesignurl, 7, "10/12/2011", "10/17/2011"),
  new Challenge($webdesignurl, 8, "10/17/2011", "10/21/2011"),
  new Journal($webdesignurl, 5, "10/21/2011", "10/27/2011"),
  new Journal($webdesignurl, 6, "10/28/2011", "11/3/2011"),
  new Challenge($webdesignurl, 9, "10/24/2011", "11/4/2011"),
  new Journal($webdesignurl, 7, "11/4/2011", "11/10/2011"),
  new Project($webdesignurl, $projects, "11/7/2011", "11/8/2011"),
  new WeeklyPlan($webdesignurl, $projects, 1, "11/8/2011", "11/10/2011"),
  new WeeklyPlan($webdesignurl, $projects, 2, "11/10/2011", "11/18/2011")
  );



$rooturl = "http://www.netdenizen.org/u";
$rootpath = "/home/users/";




?>
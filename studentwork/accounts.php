<?php

require_once('assignmentclass.php');
require_once('projectdefinitionclass.php');


$eliasc = 'eliasc';
$maxc = 'maxc';
$ethand = 'ethand';
$monikad = 'monikad';
$erind = 'erind';
$asetf = 'asetf';
$carlk = 'carlk';
$sophial = 'sophial';
$curtism = 'curtism';
$clancyn = 'clancyn';
$emmap = 'emmap';
$hatties = 'hatties';
$alexisw = 'alexisw';



$accounts = array(
  $eliasc,
  $maxc,
  $ethand,
  $monikad,
  $erind,
  $asetf,
  $carlk,
  $sophial,
  $curtism,
  $clancyn,
  $emmap,
  $hatties,
  $alexisw
  );  

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



?>
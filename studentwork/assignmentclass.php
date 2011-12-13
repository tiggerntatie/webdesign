<?php


class Assignment {

  function Assignment(
    $webdesignurl,
    $id=1, 
    $dateassign="", 
    $datedue="") {
    $this->id = $id;
    $this->webdesignurl = $webdesignurl;
    $this->dateassign=strtotime($dateassign);
    $this->datedue=strtotime($datedue);
    $this->idealid="index.html";
  }
  
  public function getIdealid($account) {
    $idealid = $this->idealid;
    return "$account/$idealid";
  }
  
  public function getActualid($account, $rootpath) {
    $id = $this->id;
    $fnames = glob("$rootpath$account/public/$id");
    if (count($fnames) > 0) {
      $fname = $fnames[0];
    } else {
      $fname = "";
    }
    return $fname;
  }
  
  public function getActualpath($account, $rootpath) {
    $returnval = "";
    $getsystempath = $this->getActualid($account, $rootpath);
    $barename = basename($getsystempath);
    if (strlen($barename)) {
      $returnval = "$account/$barename";
    }
    return $returnval;
  }
  
}

class Journal extends Assignment {
  
  function Journal(
    $webdesignurl,
    $id=1, 
    $dateassign="", 
    $datedue="") {
    
    $this->Assignment($webdesignurl, $id, $dateassign, $datedue);
    $this->assignurl = "$this->webdesignurl/reflection{$id}.html";
    $this->id = $this->matchstr($id);
    $this->idealid = $id < 10 ? "reflection0{$id}.html" : "reflection{$id}.html";
    $this->name="R{$id}";
  }    
  
  function matchstr ($number) {
    if ($number > 9) {
      $searchstr = "*[Rr][Ee][Ff][Ll][Ee][Cc][Tt][Ii][Oo][Nn]*{$number}.html";
    } else {
      $searchstr = "*[Rr][Ee][Ff][Ll][Ee][Cc][Tt][Ii][Oo][Nn][^1-9]*{$number}.html";
    }
    return $searchstr; 
  }
  
}  /* Journal */

class Challenge extends Assignment {
  
  function Challenge(
    $webdesignurl,
    $id=1, 
    $dateassign="", 
    $datedue="") {
    
    $this->Assignment($webdesignurl, $id, $dateassign, $datedue);
    $this->assignurl = "$this->webdesignurl/challenge{$id}.html";
    $this->id = $this->matchstr($id);
    $this->idealid = $id < 10 ? "challenge0{$id}.html" : "challenge{$id}.html";
    $this->name="C{$id}";
  }    
  
  function matchstr ($number) {
    if ($number > 9) {
      $searchstr = "*[Cc][Hh][Aa][Ll]*[Ll][Ee][Nn][Gg][Ee]*{$number}.html";
    } else {
      $searchstr = "*[Cc][Hh][Aa][Ll]*[Ll][Ee][Nn][Gg][Ee][^1-9]*{$number}.html";
    }
    return $searchstr; 
  }
  
}  /* Challenge */

class Index extends Assignment {
  
  function Index(
    $webdesignurl,
    $id=1, 
    $dateassign="", 
    $datedue="") {
    
    $this->Assignment($webdesignurl, $id, $dateassign, $datedue);
    $this->assignurl = "$this->webdesignurl/challenge{$id}.html";
    $this->id = "index.html";
    $this->idealid = "index.html";
    $this->name="C{$id}";
  }      
}  /* Index */

class ProjectBase extends Assignment {
  
  function ProjectBase(
    $webdesignurl,
    $projectslist=array(), /* list of individual projects */
    $dateassign="", 
    $datedue="") {

    $this->Assignment($webdesignurl, 0, $dateassign, $datedue);
    $this->assignurl = "$this->webdesignurl/assignproject.html";
    $this->name="";
    $this->idealid = "plan/index.html";
    $this->id = "blah";
    
    $this->accounts = array();
    /* get stuff for each account */
    foreach ($projectslist as $project) {
      foreach ($project->contributors as $contributor) {
        $this->accounts[$contributor] = $project;
      }
    }
  }

  public function getIdealid($account) {
    if (isset($this->accounts[$account])) {
      $proj = $this->accounts[$account];
      $idealid = $proj->ownername . "/" . $proj->projectname . "/" . $this->idealid;
    } else {
      $idealid = $account . "/<projectname>/" . $this->idealid;
    }
    return $idealid;
  }
  
  public function getActualid($account, $rootpath) {
    $id = $this->id;
    $fname = "";
    if (isset($this->accounts[$account])) {
      $proj = $this->accounts[$account];    
      $fnames = glob("$rootpath" . $proj->ownername . "/public/" . $proj->projectname . "/plan/$id");
      if (count($fnames) > 0) {
        $fname = $fnames[0];
      }
    }
    return $fname;
  }

  public function getActualpath($account, $rootpath) {
    $returnval = "";
    if (isset($this->accounts[$account])) {
      $proj = $this->accounts[$account];    
      $getsystempath = $this->getActualid($account, $rootpath);
      $barename = basename($getsystempath);
      if (strlen($barename)) {
        $returnval = "{$proj->ownername}/{$proj->projectname}/plan/$barename";
      }
    }
    return $returnval;
  }

} /* ProjectBase */
  
  
  
class Project extends ProjectBase  {

  function Project(
    $webdesignurl,
    $projectslist=array(), /* list of individual projects */
    $dateassign="", 
    $datedue="") {
    $this->ProjectBase($webdesignurl, $projectslist, $dateassign, $datedue);
    $this->name = "PR";
    $this->id = "index.html";
  }
}  /* Project */

class WeeklyPlan extends ProjectBase  {

  function WeeklyPlan(
    $webdesignurl,
    $projectslist=array(), /* list of individual projects */
    $id = 1,
    $dateassign="", 
    $datedue="") {
    $this->ProjectBase($webdesignurl, $projectslist, $dateassign, $datedue);
    $this->name = "W$id";
    $this->idealid = $id < 10 ? "plan/weekly0{$id}.html" : "plan/weekly{$id}.html";
    $this->id = $this->matchstr($id);
    $this->assignurl = "$this->webdesignurl/assignweekly.html";

  }

  function matchstr ($number) {
    if ($number > 9) {
      $searchstr = "*[Ww][Ee][Ee][Kk][Ll][Yy]*{$number}.html";
    } else {
      $searchstr = "*[Ww][Ee][Ee][Kk][Ll][Yy][^1-9]*{$number}.html";
    }
    return $searchstr; 
  }

}  /* WeeklyPlan */

class SelfEvaluation extends ProjectBase  {

  function SelfEvaluation(
    $webdesignurl,
    $projectslist=array(), /* list of individual projects */
    $id = 1,
    $dateassign="",
    $datedue="") {
    $this->ProjectBase($webdesignurl, $projectslist, $dateassign, $datedue);
    $this->name = "S$id";
    $this->idealid = $id < 10 ? "plan/selfevaluation0{$id}.html" : "plan/selfevaluation{$id}.html";
    $this->id = $this->matchstr($id);
    $this->assignurl = "$this->webdesignurl/selfevaluation.html";

  }

  function matchstr ($number) {
    if ($number > 9) {
      $searchstr = "*[Ss]elf[Ee]valuation*{$number}.html";
    } else {
      $searchstr = "*[Ss]elf[Ee]valuation[^1-9]*{$number}.html";
    }
    return $searchstr;
  }

}  /* SelfEvaluation */


  
/* set up student links */

/* $studentlinks = array(); */

function createstudentlinks($accounts, $assignments, &$studentlinks, $rootpath)
{
  foreach ($accounts as $account)
  {
    $studentlinks[$account] = array();
    foreach ($assignments as $assignment)
    {
      $fname = $assignment->getActualid($account, $rootpath);
      $studentlinks[$account][] = $assignment->getActualpath($account, $rootpath);
/*      $studentlinks[$account][] = basename($fname); */
    }
  }
}
?>
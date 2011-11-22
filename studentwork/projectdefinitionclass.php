<?php


class ProjectDefinition {

  function ProjectDefinition(
    $projectname="",    /* flyingpigs */
    $ownername="",      /* eliasc .. the person who owns the files */
    $contributors=array() ){ /* list of people participating, including the owner */

    $this->projectname = $projectname;
    $this->ownername = $ownername;
    $this->contributors = $contributors;
  }

} /* ProjectDefinition */
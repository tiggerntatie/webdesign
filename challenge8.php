<?php
/**********************************************/
/* !!! THIS BEGINS THE SERVER-SIDE SCRIPT !!! */
/**********************************************/

/**********************************************/
/* 1: CONNECT TO THE DATABASE                 */
/*                                            */
/* Log in to mySql server at localhost, using */
/* username webdesign99 and password frakshus */
/* Use username/password that is appropriate! */
/*                                            */
/* Next, select the webdesign database. Use   */
/* the database name that is appropriate for  */
/* you!                                       */
/**********************************************/
die('mysql_connect is deprecated');
$link = mysql_connect('localhost', 'webdesign99', 'frakshus');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$db_selected = mysql_select_db('webdesign', $link);
if (!$db_selected) {
    die ('Can\'t use webdesign : ' . mysql_error());
}

/**********************************************/
/* 2: MAKE SURE A TABLE EXISTS                */
/*                                            */
/* This table is named "visitors" and it is   */
/* defined with several fields. VARCHAR fields*/
/* are for storing text, FLOAT is for floating*/
/* point decimal numbers. The () is for       */
/* saying the maximum number of characters the*/
/* field will EVER need to hold.              */
/**********************************************/
/* Create a table for holding responses, if it doesn't already exist */
$query = "CREATE TABLE IF NOT EXISTS visitors (
  name      VARCHAR(40),
  birthplace  VARCHAR(40),
  number1     FLOAT,
  number2     FLOAT,
  birthmonth  VARCHAR(10),
  birthdecade VARCHAR(10),
  comments    VARCHAR(2000)
)";
$result = mysql_query($query);
if (!$result) {
  die('Can\'t insert table visitors : ' . mysql_error());
}

/**********************************************/
/* 3: CHECK TO SEE THE FORM WAS SUBMITTED     */
/*                                            */
/* IF IT WAS then grab each field, make it    */
/* safe for the database and store them in    */
/* variables that we can use later.           */
/*                                            */
/* Next, insert the data into the database    */
/* table as a new row.                        */
/**********************************************/
if (isset($_POST['submit'])) {
  /* Include some script code for setting variables equal to the form contents */
  $name = mysql_real_escape_string($_POST['first-name']);
  $birthplace = mysql_real_escape_string($_POST['birthplace']);
  $firstnumber = (float) $_POST['number1'];
  $secondnumber = (float) $_POST['number2'];
  $birthmonth = $_POST['birth-month'];
  $birthdecade = $_POST['birth-decade'];
  $comments = mysql_real_escape_string($_POST['comments']);
  
  /* insert the data into the table as a new row */
  $query = "INSERT INTO visitors (name, birthplace, number1, number2, birthmonth, birthdecade, comments)
  VALUES ('$name', '$birthplace', '$firstnumber', '$secondnumber', '$birthmonth', '$birthdecade', '$comments')";
  $result = mysql_query($query);
  if (!$result) {
    die('Can\'t insert row into visitors : ' . mysql_error());
  }
}

/**********************************************/
/* 4: CHECK TO SEE IF THE CLEAR WAS SUBMITTED */
/*                                            */
/* IF IT WAS then delete all rows in the table*/
/**********************************************/
if (isset($_POST['clear'])) {
  $query = "TRUNCATE TABLE visitors";
  $result = mysql_query($query);
  if (!$result) {
    die('Can\'t delete visitors : ' . mysql_error());
  }
}

/**********************************************/
/* 5: QUERY THE DATABASE TABLE AND GET IT ALL */
/*                                            */
/* This will get all of the table rows and put*/
/* them in a variable that we can use later.  */
/**********************************************/
$query = "SELECT name, birthplace, number1, number2, birthmonth, birthdecade, comments FROM visitors";
$visitors = mysql_query($query);

/**********************************************/
/* 6: SAY GOODBYE TO THE DATABASE             */
/**********************************************/
/* Finally - CLOSE the database link */
mysql_close($link);

/**********************************************/
/* !!! THIS ENDS THE SERVER-SIDE SCRIPT !!!   */
/*                                            */
/* (mostly) ordinary HTML will follow now.    */
/**********************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="challenge8.css" type="text/css" media="screen" />
  <title>Challenge 8: Form Results</title>
</head>
<body>
<h1>Challenge 8: Form Results</h1>
<div class="body">

<ul class='h-navigation'>
  <li><a href="./index.html">Web Design Home</a></li>
  <li><a href="./calendar.html">Assignment Calendar</a></li>
  <li><a href="./studentwork">Student Work</a></li>
  <li><a href="./challenge8.html">Challenge 8</a></li>
</ul>

<h2>Form Results!</h2>

<p>
<?php
/**********************************************/
/* PHP SCRIPT HERE                            */
/*                                            */
/* IF this form was just submitted, do some   */
/* clever mathematics using the two numbers   */
/* that were provided by the user.            */
/**********************************************/
  if (isset($_POST['submit'])) {
    $product = $firstnumber * $secondnumber;
    print("The product of your numbers is $product.");
  }
?>
</p>

<table class='visitors'>
  <tr>
    <th class='who'>Who</th>
    <th class='comments'>Comments</th>
  </tr>
  
<?php
/**********************************************/
/* PHP SCRIPT HERE                            */
/*                                            */
/* Grab all of the table rows that we queried */
/* about much earlier (top of the file). For  */
/* each one, print the data into cells of an  */
/* HTML table row.                            */
/**********************************************/
  while ($row = mysql_fetch_assoc($visitors)) {
    $name = $row['name'];
    $birthplace = $row['birthplace'];
    $birthmonth = $row['birthmonth'];
    $birthdecade = $row['birthdecade'];
    $comments = $row['comments'];
    print("  <tr>\n    <td class='who'>$name, born in $birthplace in $birthmonth during\n");
    print("      the $birthdecade.</td>\n");
    print("    <td class='comments'>$comments</td>\n  </tr>\n");
  } 
?>
</table>

<form id="clear-info-form" action="./challenge8.php" method="post">
  <fieldset>
        <input type='submit' value='Clear List' class="input" name='clear' />
  </fieldset>
</form>

</div>

<div class="footer">
  <h3>About this page...</h3>
  <p>
    Examine the <a href="./challenge8source.php">source HTML/PHP</a> used 
    by this web page (all browsers).
  </p>
  <p>
    Examine the <a href="challenge8.css">CSS </a> used by this web page.
  </p>
  <p>
    Note: by default the CSS validator will FAIL on this CSS file. You have to manually validate 
    the CSS and select "more options", then select the "CSS level 3" option. This page uses advanced
    CSS version 3 features that the default CSS validation does not recognize!
  </p>
  <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
  </p>
</div>

</body>
</html>

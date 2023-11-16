<!DOCTYPE html>
<?php
  include_once 'includes/dbh.inc.php';
 ?>


<html lang="en" dir
<head>
      <meta charset="utf-8">
      <!--important references-->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="Styles/Style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <title>FINE SYSTEM</title>
     <!--important references-->

</head>

<body>
  <div class="logo"><a href="Welcome.html" class="menu">e-Summons</a></strong></div>

  <div class="nav">
  <nav id="navigation">
    <ul class="parent">
      <li><a href="Summons.php" class="menu">Summons</a></li>
      <li><a href="Student.php" class="menu">Student</a></li>
      <li><a href="Police.php" class="menu">Police</a></li>
      <!-- <li><a href="About Us.html" class="menu">About Us</a></li> -->
    </ul>
  </nav>
  </div>
   <!--end of menu bar-->
   <br>
   <center>
     <br>
     <br>
     <br>
     <br>
   <h1>Pay Summons</h1> <br><br>

   <?php $case_no = $_GET['case_no']; ?>

   <h2> Summon number <?php echo $case_no ?>  has been paid successfully!</h2><br><br>
   <a href="Summons.php" class="normal_button">Return to summons page</a>

  <?php

    //  $user_input = $_REQUEST['submit'];
    $query1 = "DELETE FROM summons WHERE case_no = '$case_no';";
  // $query = "SELECT SUM(fine) AS SUM FROM summons natural join student natural join penalty  WHERE case_no = 3001 GROUP BY student_id, student_name;";
  $result1 = $conn->query($query1);



      $conn->close();
   ?>






</body>
</html>

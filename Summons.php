<?php
  include_once 'includes/dbh.inc.php';
 ?>

 <!DOCTYPE html>

 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="Styles/Style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <title>SUMMONS</title>


   </head>
   <body>

     <!--menu bar-->
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

    <br><br>
     <br><br><h1>Summons</h1><br>

    <?php

      $sql = "SELECT case_no, student_id, police_id, code_id, dateissued, duedate FROM summons";
      $result = $conn->query($sql); ?>

      <table>
        <tr>
              <th>Case Number</th>
              <th>Student ID</th>
              <th>Police ID</th>
              <th>Code ID</th>
              <th>Date Issued</th>
              <th>Due Date</th>
              <th>Action</th>
          </tr>

  <?php while($row = $result->fetch_assoc()) {?>

    <tr>
        <td><?php echo $row["case_no"] ?></td>
        <td><?php echo $row["student_id"]?></td>
        <td> <?php echo $row["police_id"]?></td>
        <td><?php echo $row["code_id"] ?></td>
        <td><?php echo$row["dateissued"]?></td>
        <td><?php echo$row["duedate"]?></td>
        <td><a href = 'StudentDetails.php?id=<?php echo $row['student_id'] ?>' class = 'table_button'>View Student</a></td>
    </tr>

    <?php  }
      ?>

   </body>
 </html>

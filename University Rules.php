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
     <title>UNIVERSITY RULES</title>


   </head>
   <body>

     <!--menu bar-->
     <div class="logo"><a href="Welcome.html" class="menu">e-Summons</a></div>

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
     <br><br><h1>University Rules</h1><br>

    <?php

      $sql = "SELECT code_id, category, code_desc, fine FROM Penalty";
      $result = $conn->query($sql); ?>

      <table>
        <tr>
              <th>Penal Code</th>
              <th>Category</th>
              <th>Description</th>
              <th>Fine (RM)</th>
          </tr>

  <?php while($row = $result->fetch_assoc()) {?>

    <tr>
        <td><?php echo $row["code_id"] ?></td>
        <td><?php echo $row["category"]?></td>
        <td> <?php echo $row["code_desc"]?></td>
        <td><?php echo$row["fine"]?></td>
    </tr>

    <?php  }
      ?>

   </body>
 </html>

<?php
  include_once 'includes/dbh.inc.php';
 ?>

 <!DOCTYPE html>

 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--important references-->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="Styles/Style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <title>POLICE LIST</title>
     <!--important references-->

   </head>

       <style>
     html
     {
       font-family :arial;
     }
     table, th, td
     {
       border: 1px solid transparent;
       background-color: #006666;

     }
     table
     {
       margin-left: auto;
       margin-right: auto;
     }
     td
     {
       padding: 15px;
       background-color:white;
      text-align: center;
     }
     th
     {
       padding: 15px;
       background-color:#009999;
       color:white;
     }
      table.center
     {
      margin-left: auto;
      margin-right: auto;
      empty-cells:hide;
     }
       </style>


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


<?php

  $sql = "SELECT police_id, police_name, rank FROM police";
  $result = $conn->query($sql);
  ?>

  <br><br><br><br>
  <h1>Police</h1><br><br>

  <table class="table">
   <tr>
         <th>ID</th>
     <th>Name</th>
     <th>Rank</th>
 </tr>

<?php while($row = $result->fetch_assoc()) { ?>
   <tr>
     <td><?php echo $row['police_id'] ?></td>
     <td><?php echo $row['police_name']?></td>
     <td><?php echo $row['rank']?></td>
 </tr>

<?php }?>
</table>

<?php
$conn->close();
?>

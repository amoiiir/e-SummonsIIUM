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
     <title>STUDENT LIST</title>
     <!--important references-->

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

    <br> <br><br><br> <h1>Students</h1><br>
    <?php

      $sql = "SELECT student_id, student_name, kuliyyah, year FROM student";
	  $result = $conn->query($sql);
    ?>

     <table class="table">
	    <tr>
            <th>ID</th>
		    <th>Name</th>
		    <th>Kuliyyah</th>
		    <th>Year</th>
		    <th>Action</th>
		</tr>

        <?php while($row = $result->fetch_assoc()) { ?>
           <tr>
	           <td><?php echo $row['student_id'] ?></td>
	           <td><?php echo $row['student_name']?></td>
	           <td><?php echo $row['kuliyyah']?></td>
	           <td><?php echo $row['year']?></td>
	           <td><a class="table_button" href="StudentDetails.php?id=<?php echo $row['student_id'] ?>" class="btn btn.primary">View Details</a></td>
	       </tr>
		<?php }?>
    </table>
<?php
$conn->close();
?>


   </body>
 </html>

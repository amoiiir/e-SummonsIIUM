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
     <title>STUDENT DETAILS</title>


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
     <br><br><h1>Student Details</h1><br>

    <?php
      $id = $_GET['id'];
      $sql = "SELECT student_name, student_id, kuliyyah, year, case_no, category, code_desc,fine, duedate
              FROM student natural join summons natural join penalty
              where student_id = '$id';";
      $result = $conn->query($sql);
      ?>

      <?php
        $id = $_GET['id'];
        $sum = "SELECT student_name, student_id, kuliyyah, year, count(case_no), sum(fine)
                FROM student natural join summons natural join penalty
                where student_id = '$id' group by student_id;";
        $result_sum = $conn->query($sum);
        ?>

      <?php $display = $result_sum->fetch_assoc() ?>

      <?php
        $id = $_GET['id'];
        $details = "SELECT student_name, student_id, kuliyyah, year
                FROM student
                where student_id = '$id'";
        $result_details = $conn->query($details);
        ?>

      <?php $display_details = $result_details->fetch_assoc() ?>

      <?php  if ($result_sum->num_rows < 1){
        $display["count(case_no)"] = 0;
        $display["sum(fine)"] = 0;
      } ?>

      <div class="container">
      <div class="details_left">
        <h3>Name : <?php echo $display_details["student_name"] ?></h3>
        <h3>Student Number : <?php echo $display_details["student_id"] ?> </h3>
        <h3>Kuliyyah : <?php echo $display_details["kuliyyah"] ?> </h3>
        <h3>Year : <?php echo $display_details["year"] ?> </h3>
      </div>

       <?php  if ($result_sum->num_rows < 1){
         $display["count(case_no)"] = 0;
         $display["sum(fine)"] = 0;
       } ?>

        <div class='details_right'>
          <h3>Total cases : <?php echo $display["count(case_no)"]?></h3>
          <h3>Outstanding amount : RM<?php echo $display["sum(fine)"]?></h3>
        </div>

      <br><br>
      <table>
        <tr>
              <th>Case Number</th>
              <th>Category</th>
              <th>Desciption</th>
              <th>Fine (RM)</th>
              <th>Pay By</th>
              <th>Action</th>

          </tr>

  <?php while($row = $result->fetch_assoc()) {?>

    <tr>
        <td><?php echo $row["case_no"] ?></td>
        <td><?php echo $row["category"]?></td>
        <td> <?php echo $row["code_desc"]?></td>
        <td><?php echo$row["fine"]?></td>
        <td><?php echo$row["duedate"]?></td>
        <td><a href = 'Pay Summons 1.php?case_no=<?php echo $row['case_no'] ?>' class = 'table_button'>Pay Fine</a></td>
    </tr>

    <?php  }
      ?>


   </body>
 </html>

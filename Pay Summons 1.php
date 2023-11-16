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

<?php
    $case_no = $_GET['case_no'];
    $sql = "SELECT case_no, student_id, student_name, COUNT(code_id), SUM(fine) FROM summons natural join student natural join penalty  WHERE case_no = '$case_no' GROUP BY student_id, student_name;";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
echo "<table><tr><th>Case No</th><th>Student ID</th><th>Student name</th><th>Code ID</th><th>TOTAL FINE</th></tr>"; //Interface dekat website

while($row = $result->fetch_assoc()) {
  echo "<tr><td>".$row["case_no"]."</td><td>".$row["student_id"]."</td><td>".$row["student_name"]."</td><td>".$row["COUNT(code_id)"]."</td><td>".$row["SUM(fine)"]."</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}


 ?>

 <form>
   <br>
   <br>
      <label for="fine">How Much You Want To Pay?</label><br><br>

 <input type="number" id="fine" placeholder="Insert Value Here" required><br><br>
  <!-- <button type="number" name="submit" value="submit"> <a class="table_button" onclick="validation()"> Pay Fine (this is a button) </a></button> -->

  <br>
 <a class='normal_button' onclick="validation()">Pay Fine</a>
 </form>

<?php


//$case_no = $_GET['case_no'];
$test = "SELECT case_no, fine from summons natural join penalty where case_no = '$case_no';";
$result_test = $conn->query($test);
$display = $result_test->fetch_assoc();
//echo $display['fine'];
?>

<script>
function validation(){

  var php_var = "<?php echo $display['fine']; ?>";
  fine = document.getElementById('fine').value;


  if (fine === php_var) {
    window.location.href = "Pay Summons.php?case_no=<?php echo $case_no?>";//tukar "delete" kepada nama page yang auto delete
    alert ("PAYMENT SUCCESSFUL");
  }
  else {
    alert ("PAYMENT FAILED!");
  }
      //window.location.href = "welcomepage.html";
  }
</script>

<?php
$conn->close();
?>
</body>
</html>

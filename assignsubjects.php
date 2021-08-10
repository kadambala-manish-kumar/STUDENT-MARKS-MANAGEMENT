<?php

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Miniproject";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 900px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Miniproject";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
$sub1="";
$sub2="";
         $class=$_POST['class'];
         
         $sub    =$_POST['sub'];
         $faculty =$_POST['faculty'];
        

         

         $query="update Subjects set Class='$class',FID='$faculty' where Sub='$sub'";
         if($ret= mysqli_query($connection,$query)==TRUE)
		 {
			 $query1 = "CREATE TABLE '$sub' (RollNo varchar(255) NOT NULL,
									Mid1 INT(2) NOT NULL,
									Mid2 INT(2) NOT NULL,
									Assignment1 INT(2) NOT NULL,
									Assignment2 INT(2) NOT NULL)";
									$ret=mysqli_query($connection,$query1);
									$query2="insert into '$sub'(RollNo) select RollNo from '$class'";
									$ret=mysqli_query($connection,$query2);
									
									$query="select * from Faculty where FID='$faculty'";
									$Complete=mysqli_query($connection,$query) or die("unable to connect");
									$Rows=mysqli_fetch_array($Complete);
									$Rows['Sub1']=$sub1;
									$Rows['Sub2']=$sub2;
									
									if(empty($sub1))
									{
										$query3="update Faculty set Sub1='$sub' where FID='$faculty'";
										$ret=mysqli_query($connection,$query3);
									}
									elseif($sub2){
										$query4="update Faculty set Sub2='$sub' where FID='$faculty'";
										$ret=mysqli_query($connection,$query4);
									}
									else{
										echo '<script language="javascript">';
										echo 'alert("Error in adding Suject to Faculty TABLE")';
										echo '</script>';}
		 }
		 else{
			 echo"failure";
		 }
      
        echo '<script language="javascript">';
        echo 'alert("Assigned successfully")';
        echo '</script>';
     
      }

?>
<header class="container-fluid">
  <img src="img/logo.png">
</header>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
	 <h4>ADMIN</h4>
	<div class="">
  <button class="btn btn-primary" type="button" >Classes
  <span class="caret"></span></button>
  <ul class="classes">
    <li><a href="addclasses.php">Add Class</a></li>
    <li><a href="manageclasses.php">Manage Class</a></li>
   </ul>
</div>
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Students
  <span class="caret"></span></button>
  <ul class="students">
    <li><a href="addstudents.php">Add Students</a></li>
    <li><a href="deletestudents.php">Delete Students</a></li>
   </ul>
</div>
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Marks
  <span class="caret"></span></button>
  <ul class="Marks">
    <li><a href="addmarks.php">Add Marks</a></li>
    <li><a href="editmarks.php">Edit Marks</a></li>
   </ul>
</div>
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Faculty
  <span class="caret"></span></button>
  <ul class="Faculty">
    <li><a href="addfaculty.php">Add Faculty</a></li>
    <li><a href="deletefaculty.php">Delete Faculty</a></li>
   </ul>
</div>
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Subjects
  <span class="caret"></span></button>
  <ul class="subjects">
    <li><a href="addsubjects.php">Add Subjects</a></li>
    <li><a href="assignsubjects.php">Assign Subjects</a></li>
	<li><a href="deletesubjects.php">Delete Subjects</a></li>
   </ul>
</div>
</div>     
 <div class="col-sm-10">
  <form method="POST" enctype="multipart/form-data" action="#" role="form" name="CandidateForm" ">
  <select name="class" id="selectclass" onchange="fetch_select(this.value);">
 <option hidden>Select Class</option>
  <?php
    

  $select=mysqli_query($connection,"select ClassTitle from classes group by ClassTitle");

  while($row=mysqli_fetch_array($select))
  {
   echo "<option>".$row['ClassTitle']."</option>";
  }
  
 ?>
 </select>
 <select name="sub" id="selectsub" onchange="fetch_select(this.value);">
 <option hidden>Select Subjects</option>
  <?php
    

  $select=mysqli_query($connection,"select Sub from subjects group by Sub");

  while($row=mysqli_fetch_array($select))
  {
   echo "<option>".$row['Sub']."</option>";
  }
  
 ?>
 </select>
 <select name="faculty" id="selectfaculty" onchange="fetch_select(this.value);">
 <option hidden>Select Faculty</option>
  <?php
    

  $select=mysqli_query($connection,"select FID from Faculty group by FID");

  while($row=mysqli_fetch_array($select))
  {
   echo "<option>".$row['FID']."</option>";
  }
  
 ?>
 </select>
 <div class="form-group">
              <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Assign Subject</button>
   
   </div>
   </form>
   </div>
</div>
</div>

<footer><h1>CBIT-MCA</h1></footer>

</body>
</html>

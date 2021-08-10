<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="CSS/updateclass.css"> 
  
  <style type="text/css">
    
body {
  
font-family: Agency FB;
}

  
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
    $uName= $_SESSION['uName'];
     $Pass= $_SESSION['Pass'];

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Miniproject";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     
     
    
       $query="select * from admin where AdminUserName='$uName' and Password='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    /*$Rows=mysqli_fetch_array($Complete);

    $name=$Rows['VoterName'];
    $email=$Rows['Email'];
    $phone=$Rows['Mobile'];
    $address=$Rows['Address'];;*/

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $uName= $_SESSION['uName'];
    

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Miniproject";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     
     $Class=$_POST['ClassName'];
     $year=$_POST['year'];
     $BatchNo=$_POST['BatchNo'];
     
    
       $query="update classes set ClassTitle='$Class',year='$year',BatchNo='$BatchNo' where ClassTitle='$Class'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
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
  <ul class="students">
    <li><a href="addmarks.php">Add Marks</a></li>
    <li><a href="edimarks.php">Edit Marks</a></li>
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
 
 <div class="container">
    <div class="row">
        <div class="update">
  <div class="updateclass"></div>
  
  <h2 class="updateheader">Update Profile</h2>
  <form class="update-container" method="post" action="" name="ContactForm" onsubmit="return ValidateContactForm();">

     <p><input type="text" name="ClassName" placeholder="Class Name"></p>
    <p><input type="text" name="year" placeholder="Class Year" ></p>
    <p><input type="text" name="BatchNo" placeholder="Class Batch Number"></p>
    

    <p><input type="submit" value="Update Now"></p>
  </form>
</div>>
    </div>
</div>
   </div>
</div>
</div>

<footer><h1>CBIT-MCA</h1></footer>

</body>
</html>

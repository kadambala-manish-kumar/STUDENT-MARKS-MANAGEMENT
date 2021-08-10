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
	#selectclass
{
 width:400px;
 background-color:#6A5ACD;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
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

         $ClassName=$_POST['ClassTitle'];
         
         $RollNo    =$_POST['Username'];
         $Password   =$_POST['password'];
        

         

         $query="insert into '$ClassName'(RollNo,Password) values('$RollNo','$Password')";
         if($ret= mysqli_query($connection,$query)==TRUE){
			 
        echo '<script language="javascript">';
        echo 'alert("Added successfully")';
        echo '</script>';
     
      }
	  else{
		   echo '<script language="javascript">';
        echo 'alert("Failure in  adding student")';
        echo '</script>';
	  }
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
 <div class="col-sm-10">
 <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST" enctype="multipart/form-data" action="#" role="form" name="CandidateForm" onsubmit="return ValidateCandidateForm();">
            <div class="form-group">
              <h2>Add New student</h2>
            </div>
            <select name="ClassTitle" id="selectclass" onchange="fetch_select(this.value);">
 <option hidden>Select Class</option>
  <?php
    

  $select=mysqli_query($connection,"select ClassTitle from classes group by ClassTitle");

  while($row=mysqli_fetch_array($select))
  {
   echo "<option>".$row['ClassTitle']."</option>";
  }
  
 ?>
 </select><br>
          
            <div class="form-group">
              <label class="control-label" for="Username">RollNo</label>
              <input  type="text" name="Username" maxlength="50" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">password</label>
              <input  type="password" name="password" maxlength="50" class="form-control" required>
            </div>
        
            

            <div class="form-group">
              <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Add Student</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

   </div>
</div>
</div>

<footer><h1>CBIT-MCA</h1></footer>

</body>
</html>

<?php
session_start()
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
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Miniproject";
	 
	 $subject1="";
	 $subject2="";
	 
	 $subject=$_SESSION["subject"];
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
	$query="select * from '$subject'";
									$Complete=mysqli_query($connection,$query) or die("unable to connect");
									$Rows=mysqli_fetch_array($Complete);
									//$sub1=$Rows['Sub1'];
									//$sub2=$Rows['Sub2'];
?>
<header class="container-fluid">
  <img src="img/logo.png">
</header>
<div class="container-fluid">
  <div class="row content">
<center>
 <div class="col-sm-10">
  <form method="POST" enctype="multipart/form-data" action="#" role="form" name="FacultysubForm" >
  
 
 <div class="form-group">
 <?php
            while ($row = mysqli_fetch_array($Complete))
       {

          
          echo '<tr>
			<td>'.$row['RollNo'].'</td>
            <td>'.$row['Mid1'].'</td>
            <td>'.$row['Mid2'].'</td>
          
            <td>'.
              $row['Assignment1'].'
            </td>
          
          
            <td>
              '.$row['Assignment2'].'
            </td>
         
         
            <td>
              '.$row['EndDate'].'
            </td>
        </tr>';
    echo "<br>";
       }
	   ?>
   </div>			
   </form>
   </div>
   </div>
   </div>

<div>
<footer><h1>CBIT-MCA</h1></footer>
</div>
</body>
</html>

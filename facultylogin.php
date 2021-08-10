<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Please Sign in</title>
    <link rel="stylesheet" href="css/flaty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="css/theme.css">
	
	<?php 

$uName="";
$Pass="";



$uNameERR="";
$UsereXIST="";
$PassERR1="";
$PassERR2="";



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    function Valid($Information)
	{
		$Information=trim($Information);
		$Information=stripcslashes($Information);
		$Information=htmlspecialchars($Information);
		return $Information;
	}
	
     

	$error=0;
	if(empty($_POST['uName']))
	{
		$error++;
		$uNameERR="Required";
	}
	else
	{
		$uName=Valid($_POST['uName']);
	}
	
	
	if(empty($_POST['Pass']))
	{
		$error++;
		$PassERR1="Required, ";
	}
	else
	{
		$Pass=Valid($_POST['Pass']);
	}
	

	
	
	if($error==0)
	{
	
   
        

	     $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "Miniproject";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);
		 
		 
		
	     $query="select * from Faculty where FID='$uName' and Password='$Pass'";
		
		
		 
	    $Complete=mysqli_query($connection,$query) or die("unable to connect");
			   
		
		$Rows=mysqli_fetch_array($Complete);
		 
		
		if($Rows['FID']==$uName &&$Rows['Password']==$Pass)
		{
				
		          $_SESSION["uName"]=$uName;
				  $_SESSION["Pass"]=$Pass ;
			   header("Location:facultywork.php");
		     
		 
		}
		else
		{
			
			echo "<script>alert('Wrong User Name Or Password Try Again');</script>";
		}
		
			mysqli_close($connection);  			 			 		   
	 }
   
}
	

?>
</head>
<body style="background:url('img/backgrounds/bg-2.jpeg') no-repeat 0px -150px;background-size:cover" class="signin">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand" href="/">
                <img src="/img/logo1.png" width="60" height="50" class="d-inline-block align-top" alt="">&nbsp;&nbsp;
                <span style="color:#7CBB00;">Student</span> Management System
            </a>
    
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
    
                </ul>
    
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-success" href="admindashboard.php">Sign in</a>
                    </li>
                    <li class="nav-item ml-1">
                        <a class="btn btn-outline-secondary" href="/users/signup">Create an account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    <div class="overlay-effect">
        <div class="container-fluid">
         
        
            <!--
            -->
        </div>
        
        <script>
            (function () {
                setTimeout(function () {
                    $(".alert").alert('close');
                }, 5000);
            })();
        </script>        <form action="" method="POST" class="form-signin">

<fieldset>
    <div class="media">
        <img class="mr-4" src="img/logos/icons/padlock.png" width="60" alt="Generic placeholder image" style="margin-top:-7px;">
        <div class="media-body">
            <h5 class="mt-0">Sign in to the Dashboard</h5>
            <h6>Please enter your credentials</h6>
        </div>
    </div>

    <hr style="margin-top:25px;margin-bottom:25px;">

    <div class="form-group">
        <label for="formGroupExampleInput">User Name</label>
        <input type="text" class="form-control" name="uName" placeholder="Enter USER NAME" autocomplete="off" autofocus value=""><?php if(isset($_POST['uName'])) echo $_POST['uName']; ?><?php echo $uNameERR;?>
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Password</label>
        <input type="password" class="form-control" name="Pass" placeholder="Enter password" autocomplete="off" value=""><?php echo $PassERR1;?>
    </div>

    <button type="submit" class="btn btn-default btn-block btn-lg mt-4" href="admindashboard.php">Sign in</button>
    <p class="text-center mt-4">Don't have an account? Create one <a href="/users/signup">here</a></p>
    <p class="text-center" style="margin-top:-20px;">
        <a href="#">Forgot Password?</a>
    </p>
</fieldset>
</form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

    <script src="/js/custom.js"></script>

</body>

</html>
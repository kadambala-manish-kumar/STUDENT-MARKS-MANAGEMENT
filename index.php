
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/flaty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="css/theme.css">
</head>

<body style="background:url('img/backgrounds/desk.jpeg') no-repeat 0px -150px;background-size:cover">
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
					<li class="dropdown"><a class="btn btn-success" data-toggle="dropdown" href="#">Sign in<span class="caret"></span></a>
														<ul class="dropdown-menu">
														<li><a href="adminlogin.php">ADMIN</a></li>
														<li><a href="facultylogin.php">FACULTY</a></li>
														<li><a href="studentlogin.php">STUDENT</a></li>
														</ul>
					</li>
                        
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
        </script>        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <main role="main" class="inner cover">
        <img src="/img/logo.png" width="300" height="130" alt=""><br><br>
        <h1 class="cover-heading">Welcome to Student Management System.</h1>
        <p class="lead">Student management system is designed for managing the information of students in a organized way.

            kindly login with your respective credintials fo further views
                            or
            request a login and wait for ADMIN approval
        </p>
        <p class="lead">
					<li class="dropdown"><a class="btn btn-lg btn-success" data-toggle="dropdown" href="#">Sign in<span class="caret"></span></a>
														<ul class="dropdown-menu">
														<li><a href="adminlogin.php">ADMIN</a></li>
														<li><a href="facultylogin.php">FACULTY</a></li>
														<li><a href="studentlogin.php">STUDENT</a></li>
														</ul>
					</li>
            
        </p>
    </main>

</div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

    <script src="/js/custom.js"></script>

</body>

</html>
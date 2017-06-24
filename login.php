<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
$_SESSION['currentPage'] = "login";
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role'] == "admin"){
                                echo "<script>
                                window.location.href='http://localhost/techstore/gentelella-master/production/adminDashboard.php';
                                </script>";
                                }
                                elseif ($_SESSION['role'] == "moderator") {
                                   echo "<script>
                                window.location.href='http://localhost/techstore/gentelella-master/production/moderatorDashboard.php';
                                </script>"; 
                                }
                                elseif (($_SESSION['role'] == "reviewer")||($_SESSION['role'] == "Expert Reviewer")) {
                                echo "<script>
                                window.location.href='http://localhost/techstore/gentelella-master/production/reviewerDashboard.php';
                                </script>"; 
                                }
                            }
                    else if((isset($_SESSION['valid'])) && ($_SESSION['valid'] == false))
                    {  
                        echo "<script>
                        alert('Password Invalid, Try again!');
                        </script>"; 
                    }
                   
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Techstore</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/login.js"></script>

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form name="login_form" action="login.php" method="post">
                        <h1>Sign in to Techstore</h1>
                        <div>
                            <input type="text" class="form-control" name="username"  placeholder="Username"  required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="passWord"  placeholder="Password" required/>
                        </div>
                        <div>
                            <button class="btn btn-default login" onclick="login_validation()">Log in</button><br/><br/>
                            <p> Problems signing in? Write to us - admin@techstore.in</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="glyphicon glyphicon-tag" style="font-size: 26px;"></i>Techstore</h1>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>
</body>

</html>
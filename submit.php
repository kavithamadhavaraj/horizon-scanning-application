<!DOCTYPE html>
<html lang="en">
<?php 
require_once('config.php');
session_start();
if((isset($_SESSION['role'])) && (isset($_SESSION['currentQuestionnaire']))) {
}
else{
    echo "<script>
    window.location.href='".SERVER_URL."page_404.php';
    </script>";    
}
$_SESSION['currentPage'] = "submit";
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Caan Associates</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">

    <!-- editor -->
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">
    <script src="js/config.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/notify.min.js"></script>
    <script>
        $(document).ready(function () {
         window.setTimeout(function () {
         location.href = SERVER_URL+"login.php";
    }, 5000);
});
    </script>

</head>


<body class="nav-md">

    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><span><img height="100%" width= "95%" src="./images/caan_logo.png"></span> </a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="images/user.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $_SESSION['username']; ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3><?php echo $_SESSION['role']; ?></h3>
                            <ul class="nav side-menu">
                               
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/user.png" alt=""><?php echo $_SESSION['username']; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>                      
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->
			<!-- page content -->
            <div class="right_col" role="main">
			<div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3> Questionnaire Submission Response </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:600px;">
                                <div class="x_title">
                                    <h2> Your response has been recorded successfully</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <br />
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                        <div class="form-group" style="align:center;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="align:center;">  </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12" style="align:center;">
                                            <p> <h1 style="position: absolute; left: -80px; top: 50px;"> You will be redirected to home page shortly ! </h1> </p> <br/> <br/>
                                            <h2 style="position: relative; top: 60px;">You can edit your response at any time until 
                                            <?php
                                             $dateTime = new DateTime('@'.(new MongoDB\BSON\ObjectID($_SESSION['currentQuestionnaire']))->getTimestamp());
                                             $dateTime->add(new DateInterval('P30D'));
                                             echo $dateTime->format('d/m/Y');
                                            ?> </h2> <br/> <br/>
											</div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <!-- /page content -->
        </div>
    </div>
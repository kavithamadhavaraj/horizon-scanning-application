<?php 
session_start();
require('helper.php');
// echo $_SESSION['username'];
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role'] == "admin"){
                        }
                        elseif ($_SESSION['role'] == "moderator") {
                        }
                        elseif (($_SESSION['role'] == "reviewer")||($_SESSION['role'] == "Expert Reviewer")) {
                        echo "<script>
                        window.location.href='http://localhost/techstore/gentelella-master/production/logout.php';
                        </script>"; 
                        }
                    }
                    else{
                        echo "<script>
                        window.location.href='http://localhost/techstore/gentelella-master/production/logout.php';
                        </script>"; 
                    }

$_SESSION['currentPage'] = "assign";
find_next_record("name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Techstore</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">

    <!-- editor -->
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">
    <style>
    #tags_value_addTag{
        display: none;
    }
    </style>
    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">
   <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="glyphicon glyphicon-tag"></i> <span>Techstore</span></a>
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
                                 <?php  if($_SESSION['role'] == "admin"){
                                echo '<li><a href="adminDashboard.php"><i class="fa fa-home"></i> Dashboard </span></a>
                                </li> '; }
                                else if($_SESSION['role'] == "moderator") {
                                     echo '<li><a href="moderatorDashboard.php"><i class="fa fa-home"></i> Dashboard </span></a>
                                </li> '; 
                                    } ?>
                                <li><a href="postFB.php"><i class="fa fa-edit"></i> Moderate news </span></a>
                                </li>
                                <?php  if($_SESSION['role'] == "admin"){
                                echo '<li><a href="credentials_generate.php"><i class="fa fa-cog"></i> Generate Credentials </span></a>
                                </li> ';} ?>
                                 <li><a href="createQuestionnaire.php"><i class="fa fa-check-square"></i> Create Questionnaire</span></a>
                                </li>
                                <li><a href="assign.php"><i class="fa fa-tasks"></i> Assignment of reviewers</span></a>
                                </li>
                                <li><a href="form_questionnaire.php"><i class="fa fa-eye"></i> View Questionnaire</span></a>
                                </li>
                                <li><a href="response_overall.php"><i class="fa fa-group"></i> Questionnaire Response </span></a>
                                </li>
                                <li><a href="report.php"><i class="fa fa-bar-chart-o"></i> Report Generation </span></a>
                                </li>
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
                            <h3>Assignment of Reviewers</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:600px;">
                                <div class="x_title">
                                    <h2>Select questionnaire set and assign users</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <br />
                                    <form id="form1" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Questionnaire Set 
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name= "selection" class="select2_single form-control" tabindex="-1">
                                                    <?php
                                                    $collection = $db->questionnaire;
                                                    $cursor = $collection->find(array('name' =>  array('$exists' => true)));
                                                    foreach ($cursor as $document) {
                                                    echo "<option value='".$document['name']."'>".$document['name']."</option>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User list
                                            </label>
                                           	 <?php 
                 							   $collection = $db->auth_user;
                                                $cursor = $collection->find(array('role' =>  array('$nin' => array("admin","moderator"))));
                                                $data= array();
                                                foreach ($cursor as $document) {
                                                    array_push($data, $document['E-mail']);
                                                }
                                                $result = implode(",",$data);
                    						?>
                                            <div  class="col-md-9 col-sm-9 col-xs-12">
                                            <input  id="tags_value" name="userlist" type="text" class="tags form-control" value='<?php echo $result; ?>'> </input>
                                           
                                            </div>

                                       
                                        </div>
                                        
                                       
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                  <button type="reset" name= "discard" class="btn btn-danger">Reset</button>
                                                  <button type="submit" name= "assign" class="btn btn-success">Assign</button>                                                
                                            </div>
                                        </div>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Techstore - a Horizon scanning application for Technology Information Assessment and Forecasting  |
                        <span class="lead"> <i class="glyphicon glyphicon-tag"></i>Techstore</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>



    <script src="js/bootstrap.min.js"></script>

    

    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
     <!-- tags -->
    <script src="js/tags/jquery.tagsinput.min.js"></script>
    <script src="js/custom.js"></script>
            <!-- input tags -->
        <script>
            $(function () {
                $('#tags_value').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->

</body>

</html>

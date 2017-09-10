<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
require_once('config.php');
$_SESSION['currentPage'] = "credentials_generate";
if(isset($_SESSION['role'])){
    if (($_SESSION['role'] == "reviewer")||($_SESSION['role'] == "Expert Reviewer")||($_SESSION['role'] == "moderator")){
        echo "<script>
    window.location.href='".SERVER_URL."logout.php';
    </script>"; 
    }
}
else{
    echo "<script>
window.location.href='".SERVER_URL."logout.php';
</script>";    
}
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
  
    <!-- switchery -->
    <link rel="stylesheet" href="css/switchery/switchery.min.css" />
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<style>
		tr.spaceUnder > td
		{
			padding-bottom: 1em;
		}
		td {
			padding: 10px 0;
		}
		</style>

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><span><img height="100%" width= "95%" src="./images/caan_logo.png"></span></a>
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
                                <li><a href="adminDashboard.php"><i class="fa fa-home"></i> Dashboard </span></a>
                                </li>
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
                            <h3>Generate Credentials</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:500px;">
                                <div class="x_title">
                                    <h2>Generate User credentials for questionnaire</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <br />
								<div id="togenerate_cred">
								<section class="generate_cred">
								<form name="cred_generate_form">
								<div>
								<input type="text" id="email" class="form-control" name="EMail" placeholder="E-mail Id"  required="required" style="width:400px; margin:auto; position: relative; top: 40px;"/>
								</div> <br/>
								<div style="text-align: center; position: relative; top: 50px;">
								<button class="btn btn-success" type="button" onclick="form_validate()"> Generate </button>
								</div>
								<div class="clearfix"></div>
                                </form> 
								</section> </div>
								<div id="generated_cred" style="display: none;" >
								<form>
								<div>
								<table align="center" cellspacing="100"> <tbody>
								<tr class="spaceUnder"> 
								<td> <strong> E-mail Id : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></td> <td> </td>
								<td> <input type="text" class="form-control" id="e-mail" style="width:400px"> </td>
								</tr> <br/> <tr> <br/> </tr>
								<tr class="spaceUnder">
								<td> <strong> Username : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></td> <td> </td>
								<td> <input type="text" class="form-control" id="username"  style="width:400px">
								</td> </tr> <br/>
								<tr class="spaceUnder">
								<td> <strong> Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></td> <td> </td>
								<td> <input type="text" class="form-control"  id="password" style="width:400px" >
								</td> </tr>
                                <tr class="spaceUnder">
                                <td> <strong> Type of reviewer : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></td> <td> </td>
                                <td><input type="checkbox" name="expert" id="expert" value="expert" class="flat" /> Expert
                                            <br />
                                </td> </tr>
								<tr> <td> </td> <td> </td> 
								<td>
								<div style="text-align: center; position: relative; top: 50px;">
								<button class="btn btn-success" type="button" onclick="addCredentials()"> Add Credential </button>
								</div> </td> </tr>
								</tbody> </table>
                                </form> 
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>

    </div>

    <script src="js/config.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/notify.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/cred_generate.js"></script>
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/custom.js"></script>  
</body>

</html>
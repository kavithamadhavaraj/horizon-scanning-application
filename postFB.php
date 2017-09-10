<?php 
session_start();
require_once('config.php');
$_SESSION['currentPage'] = "postFB";
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == "admin"){
    }
    elseif ($_SESSION['role'] == "moderator") {
    }
    elseif (($_SESSION['role'] == "reviewer")||($_SESSION['role'] == "Expert Reviewer")) {
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

require('helper.php');
find_next_record("isPosted");
?>
<!DOCTYPE html>
<html lang="en">
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
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">
    <script src="js/config.js"></script>


    <script src="js/jquery.min.js"></script>     <script src="js/notify.min.js"></script>

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
                            <h3>Moderate News </h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:500px;">
                                <div class="x_title">
                                    <h2>Post the scan hits to Facebook</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <br />
                                    <form id="form1" method="POST" action="<?php echo "postFB.php?id=".$GLOBALS['result']['_id']."&url=".$GLOBALS['result']['url']."&title=".$GLOBALS['result']['title']; ?>" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url_name">URL 
                                            </label>
                                            <a class="col-md-9 col-sm-9 col-xs-12" id="url_value" name="url_value" href=<?php echo $GLOBALS['result']['url'];?>><?php echo $GLOBALS['result']['url'];?> 
                                            </a>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label  col-md-3 col-sm-3 col-xs-12" for="date_name">Date 
                                            </label>
                                            <p style="text-align:left; position: relative; top: 8px;" class="control-label-left col-md-9 col-sm-9 col-xs-12" for="date_value"><?php echo $GLOBALS['result']['date'];?> 
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_name">Title 
                                            </label>
                                            <p style="text-align:left;" id="title_value" name="title_value" class="control-label col-md-9 col-sm-9 col-xs-12 "><?php echo $GLOBALS['result']['title'];?>   
                                            </p>
                                        </div>
                                     
                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_name">Author 
                                            </label>
                                            <p style="text-align:left;" class="control-label col-md-9 col-sm-9 col-xs-12 " for="author_value"><?php
                                             if(array_key_exists('author', $GLOBALS['result'])){echo $GLOBALS['result']['author'];} 
                                             ?>    
                                            </p>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keywords_name">Keywords / Tags
                                            </label>
                                           	 <?php 
                 							   $data="";
                 							  	if(array_key_exists('keywords', $GLOBALS['result'])){
                    								for ($i = 0; $i < sizeof($GLOBALS['result']['keywords']); $i++) {
                    									$data = $data.$GLOBALS['result']['keywords'][$i].", ";
													}
												}
                    						?>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input id="tags_value" name="tags_value" type="text" class="tags form-control" value='<?php echo $data; ?>'> </input>
                                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                            </div>
                                       
                                        </div>
                                  
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Summary                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea class="textarea form-control" disabled = "disabled" style="width: 100%; resize: none;" data-autosize-on="true">    <?php echo htmlentities($GLOBALS['result']['summary']);?> </textarea>
											</div>
                                            
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                  <button type="submit" name= "discard" class="btn btn-warning">Save</button>
                                                <?php                                             
                                                if(EMPTY($_SESSION['page_id'])) 
                                                
                                                {   
                                                    $helper = $GLOBALS['facebook']->getRedirectLoginHelper();
                                                    $permissions = ["publish_pages","publish_actions","manage_pages"]; // optional
                                                    $loginUrl = $helper->getLoginUrl(SERVER_URL."post.php", $permissions);
                                                    echo "<a class= 'btn btn-warning' href='".$loginUrl."'>Login with Facebook</a>";
                                                }
                                                if(isset($_SESSION['page_id'])) {
                                                    echo '<button type="submit" name= "post" class="btn btn-success">Post to Facebook</button>';
                                                }
                                                 ?>
                                                
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



    <script src="js/bootstrap.min.js"></script>

    
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
     <!-- tags -->
    <script src="js/tags/jquery.tagsinput.min.js"></script>
    <script src="js/custom.js"></script>
            <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_value').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->

</body>

</html>
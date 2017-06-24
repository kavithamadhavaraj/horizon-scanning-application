<?php 
session_start(); 
require("dashboarddata.php");
$_SESSION['currentPage'] = "response_overall";
                  if(isset($_SESSION['role'])){
                        if(($_SESSION['role'] == "moderator")|| ($_SESSION['role'] == "admin")){
                        
                        }
                        elseif (($_SESSION['role'] == "reviewer")||($_SESSION['role'] == "Expert Reviewer")){
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
   

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script>
        NProgress.start();


    </script>
    <style type="text/css">
        footer {
    position: relative;
    top: 80px;

    </style>
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
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="dashboard_graph x_panel">
                                <div class="row x_title">
                                    <div class="col-md-6">
                                        <h3>Score Overview <small></small></h3>
                                    </div>
                                    
                                </div>
                                <div class="x_content">
                                    <div class="demo-container" style="height:250px">
                                        <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <br />

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2>STEEP Rating</h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <h4>Rating across technologies</h4>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Social</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (sizeof($social)/$total)*100;?>%;">
                                                <span class="sr-only"><?php echo sizeof($social)/$total;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo sizeof($social)?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Technology</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (sizeof($technology)/$total)*100;?>%;">
                                                <span class="sr-only"><?php echo sizeof($technology)/$total;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo sizeof($technology);?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Economic</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (sizeof($economical)/$total)*100;?>%;">
                                                <span class="sr-only"><?php echo sizeof($economical)/$total;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo sizeof($economical);?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Environment</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (sizeof($environmental)/$total)*100;?>%;">
                                                <span class="sr-only"><?php echo sizeof($environmental)/$total;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo sizeof($environmental);?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Politics</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (sizeof($political)/$total)*100;?>%;">
                                                <span class="sr-only"><?php echo sizeof($political)/$total;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo sizeof($political);?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>Top Technology</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table class="" style="width:100%">
                                    <tr>
                                        <th style="width:37%;">
                                            <p>STEEP Score</p>
                                        </th>
                                        <th>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                <p class="">    Category </p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                <p class=""> Score</p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                        </td>
                                        <td>
                                            <table class="tile_info">
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square blue"></i>Social</p>
                                                    </td>
                                                    <td><?php echo round($total_s); ?>%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square green"></i>Technology</p>
                                                    </td>
                                                    <td><?php echo round($total_t); ?>%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square purple"></i>Economic</p>
                                                    </td>
                                                    <td><?php echo round($total_ec); ?>%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square aero"></i>Environment</p>
                                                    </td>
                                                    <td><?php echo round($total_e); ?>%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square red"></i>Politics</p>
                                                    </td>
                                                    <td><?php echo round($total_p); ?>%</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2>Score Status</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="dashboard-widget-content">
                                    <h4>Scored vs approved technologies</h4>
                                        <canvas width="150" height="80" id="foo" class="" style="width: 260px; height: 150px;"></canvas>
                                        <div class="goal-wrapper">
                                            <span class="gauge-value pull-left"></span>
                                            <span id="gauge-text" class="gauge-value pull-left"><?php echo $scoredtechnologies ?></span>
                                            <span id="goal-text" class="goal-value pull-right"><?php echo $totalusefultechnologies;?></span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


               
                 <!-- footer content -->
                <footer>
                        <p class="pull-right">Techstore - a Horizon scanning application for Technology Information Assessment and Forecasting  |
                        <span class="lead"> <i class="glyphicon glyphicon-tag"></i>Techstore</span>
           
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>



    <script src="js/bootstrap.min.js"></script>

    <!-- gauge js -->
    <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

    <script src="js/custom.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="js/flot/date.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
    <script>
       var data = <?php echo json_encode($score);?>;
		console.log(data);
		var count = new Array(31+1).join('0').split('').map(parseFloat);
		for(var i = 0 ;i< data.length; i++){
			for(var j=0; j<=28 ; j++){
				if(data[i] === j){
					count[j] = count[j] + 1;
				}
			}
		}
		console.log(count);
		var d1 =[];
		for(var j=0; j<=30 ; j++){
				var temp=[];
				temp.push(j);
				temp.push(count[j]);
				d1.push(temp);
		}
		console.log(d1);
        
        //flot options
        var options = {
            series: {
                curvedLines: {
                    apply: true,
                    active: true,
                    monotonicFit: true
                }
            },
            colors: ["#26B99A"],
            grid: {
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 1,
                    left: 1
                },
                borderColor: {
                    bottom: "#7F8790",
                    left: "#7F8790"
                }
            }
        };
        var plot = $.plot($("#placeholder3xx3"), [{
            label: "Score",
            data: d1,
            lines: {
                fillColor: "rgba(150, 202, 89, 0.12)"
            }, //#96CA59 rgba(150, 202, 89, 0.42)
            points: {
                fillColor: "#fff"
            }
                }], options);
    </script>
    <!-- /flot -->
   
	<script>
        var doughnutData = [
            {
                value: 30,
                color: "#455C73"
            },
            {
                value: 30,
                color: "#9B59B6"
            },
            {
                value: 60,
                color: "#BDC3C7"
            },
            {
                value: 100,
                color: "#26B99A"
            },
            {
                value: 120,
                color: "#3498DB"
            }
    ];
var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);

var target = document.getElementById('foo'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue =parseInt('<?php echo $totalusefultechnologies;?>');
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(parseInt('<?php echo $scoredtechnologies;?>')); // set actual value
gauge.setTextField(document.getElementById("gauge-text"));
   
</script>

</body>

</html>
`
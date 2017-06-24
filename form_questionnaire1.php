<?php 
session_start();
                     $m = new MongoClient();
                     $db = $m->techstore;
                     $collection_ques = $db->questionnaire;
                     $questionnaireName = array();
                     if(isset($_SESSION['role'])){
                        if(($_SESSION['role'] == "admin")||($_SESSION['role'] == "moderator")){
                            $cursor_ques = $collection_ques->find();
                            foreach($cursor_ques as $document){
                             $questionnaireName[]= $document['name'];
                            }
                        }
                        elseif(($_SESSION['role'] == "reviewer")||($_SESSION['role'] == "Expert Reviewer")){
                             echo "<script>
                             window.location.href='http://localhost/techstore/gentelella-master/production/logout.php';
                             </script>";
                        } 
                    }
                     else{
                         echo "<script>
                        window.location.href='http://localhost/techstore/gentelella-master/production/logout.php';
					    </script>"; }
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
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>	
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
                            <h2>user3</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>Reviewer</h3>
                            <ul class="nav side-menu">
								<li><a href="form_questionnaire.html"><i class="fa fa-edit"></i> Questionnaire </span></a>
                                </li>
                                <li><a href="reviewerDashboard.html"><i class="fa fa-bar-chart-o"></i> Overall Responce </span></a>
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
                                    <img src="images/img.jpg" alt="">user3
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                            <h3>Assessing Technologies on the Horizon</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Questionnaire: <small>Carefully assess and answer your views on any/all of the news items </small></h2>
									<div style="position:relative; right:-300px;"> Questionnaire <select class="questionselect" id="ques_select" style="width:100px; height:25px;"></select>
                                    </div>
									<div class="clearfix"></div>
                                </div>
                                <div class="x_content">
			

                                    <!-- Smart Wizard -->
                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps" id="wizard_list">
                                        </ul> <br/>
                                        <div id="step-1" style="display: none;">
										<h2 class="StepTitle"> <strong id="tech-1"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-1-desc"> &nbsp; &nbsp;  </p>
											<br/>
											<p id="tech-1-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check11" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check11" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check11" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check11" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check11" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check12" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check12" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check12" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check12" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check12" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<div>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check131" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check131" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check131" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check131" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check131" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr> 
												<tr> <div class="radio">
													 <td> <h5> Technological </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check132" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check132" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check132" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check132" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check132" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Environmental </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check133" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check133" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check133" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check133" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check133" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                            </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Economic </h5> </td>
                                                   <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check134" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check134" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check134" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check134" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check134" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5>  Political </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check135" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check135" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check135" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check135" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check135" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div></tr> </tbody> </table> </div>
												<div style="position:relative; top:-2000;">
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
												</div>
											</form>
                                        </div>
                                        <div id="step-2" style="display: none;">
                                           <h2 class="StepTitle"> <strong id="tech-2"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-2-desc"> &nbsp; &nbsp;  </p>
											<br/>
											<p id="tech-2-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check21" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check21" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check21" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check21" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check21" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check22" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check22" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check22" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check22" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check22" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													 <td> <h5> Social  </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check231" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check231" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check231" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check231" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check231" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr>
												<tr> <div class="radio">
													 <td> <h5> Technological </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check232" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check232" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check232" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check232" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check232" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Environmental </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check233" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check233" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check233" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check233" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check233" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                            </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Economic </h5> </td>
                                                   <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check234" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check234" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check234" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check234" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check234" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5>  Political </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check235" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check235" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check235" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check135" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check235" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
                                        <div id="step-3" style="display: none;">
                                            <h2 class="StepTitle"> <strong id="tech-3"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-3-desc"> &nbsp; &nbsp;  </p>
											<br/>
											<p id="tech-3-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check331" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check331" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check331" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check331" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check331" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div></tr>
												<tr> <div class="radio">
													<td> <h5> Technological </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check332" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check332" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check332" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check332" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check332" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5> Environmental </h5></td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check333" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check333" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check333" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check333" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check333" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                            </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Economic </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check334" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check334" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check334" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check334" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check334" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5>  Political </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check335" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check335" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check335" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check335" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check335" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div></tr> </tbody> </table> 
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
                                        <div id="step-4" style="display: none;">
                                            <h2 class="StepTitle"> <strong id="tech-4"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-4-desc"> &nbsp; &nbsp;  </p>
											<br/>
											<p id="tech-4-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check41" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check41" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check41" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check41" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check42" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check42" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check42" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check42" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check42" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check431" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check431" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check431" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check431" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check431" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													 <td> <h5> Technological </h5> </td>
                                                   <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check432" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check432" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check432" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check432" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check432" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5> Environmental </h5></td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check433" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check433" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check433" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check433" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check433" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                            </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Economic </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check434" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check434" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check434" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check434" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check434" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5>  Political </h5> </td>
                                                   <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check435" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check435" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check435" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check435" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check435" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
										<div id="step-5" style="display: none;">
										<h2 class="StepTitle"> <strong id="tech-5"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-5-desc"> &nbsp; &nbsp;  </p>
											<br/>
											<p id="tech-5-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check51" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check51" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check51" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check51" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check51" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check52" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check52" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check52" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check52" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check52" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check531" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check531" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check531" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check531" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check531" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Technological </h5> </td>
                                                   <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check532" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check532" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check532" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check532" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check532" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5> Environmental </h5></td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check533" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check533" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check533" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check533" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check533" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                            </div> </tr>
												<tr> <div class="radio">
													<td><h5> Economic </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check534" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check534" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check534" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check534" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check534" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5>  Political </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check535" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check535" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check535" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check535" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check535" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
										<div id="step-6" style="display: none;">
										<h2 class="StepTitle"> <strong id="tech-6"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-6-desc"> &nbsp; &nbsp;  </p>
											<br/>
											<p id="tech-6-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check61" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check61" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check61" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check61" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check61" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check62" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check62" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check62" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check62" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check62" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check631" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check631" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check631" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check631" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check631" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div></tr>
												<tr> <div class="radio">
													 <td><h5> Technological </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check632" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check632" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check632" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check632" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check632" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5> Environmental </h5></td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check633" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check633" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check633" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check633" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check633" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                            </div> </tr>
												<tr> <div class="radio">
													<td><h5> Economic </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check634" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check634" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check634" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check634" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check634" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5>  Political </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check635" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check635" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check635" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check635" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check635" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
										<div id="step-7" style="display: none;">
										<h2 class="StepTitle"> <strong id="tech-7"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-7-desc">  </p>
											<br/>
											<p id="tech-7-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check71" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check71" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check71" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check71" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check71" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check72" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check72" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check72" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check72" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check72" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check731" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check731" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check731" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check731" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check731" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Technological </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check732" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check732" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check732" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check732" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check732" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5> Environmental </h5></td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check733" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check733" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check733" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check733" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check733" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td>
                                            </div> </tr>
												<tr> <div class="radio">
													<td><h5> Economic </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check734" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check734" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check734" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check734" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check734" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr>
												<tr> <div class="radio">
													<td><h5>  Political </h5> </td>
                                                    <td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check735" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check735" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check735" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check735" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td>
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check735" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td>
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
										<div id="step-8" style="display: none;">
										<h2 class="StepTitle"> <strong id="tech-8"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-8-desc">  </p>
											<br/>
											<p id="tech-8-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check81" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check81" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check81" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check81" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check81" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check82" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check82" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check82" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check82" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check82" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check831" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check831" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check831" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check831" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check831" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div></tr>
												<tr> <div class="radio">
													<td>  <h5> Technological </h5> </td> 
                                                   <td>  <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check832" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check832" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check832" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check832" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td><label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check832" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Environmental </h5></td> 
                                                   <td>  <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check833" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check833" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check833" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check833" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check833" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                            </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Economic </h5> </td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check834" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check834" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check834" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check834" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check834" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5>  Political </h5> </td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check835" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check835" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check835" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check835" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check835" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
										<div id="step-9" style="display: none;">
										<h2 class="StepTitle"> <strong id="tech-9"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-9-desc">  </p>
											<br/>
											<p id="tech-9-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check91" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check91" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check91" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="Check91" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check91" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check92" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="Check92" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="Check92" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="Check92" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="Check92" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check931" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check931" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="Check931" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check931" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check931" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr>
												<tr> <div class="radio">
													<td>  <h5> Technological </h5> </td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check932" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check932" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check932" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check932" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check932" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr>
												<tr> <div class="radio">
													<td>  <h5> Environmental </h5> </td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check933" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check933" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check933" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check933" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check933" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                            </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Economic </h5> </td> 
                                                   <td>  <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="Check934" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="Check934" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label> </td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check934" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check934" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="Check934" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> </td> 
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5>  Political </h5> </td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="Check935" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="Check935" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="Check935" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="Check935" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="Check935" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
										<div id="step-10"style="display: none;">
										<h2 class="StepTitle"> <strong id="tech-10"> </strong> </h2>
                                            <form class="form-horizontal form-label-left">
											<p id="tech-10-desc">  </p>
											<br/>
											<p id="tech-10-url" style="text-decoration: underline;"> </p> <br/>
											<p> <strong> <h2> [A] How relevant is this technology to India? <h2> </strong> </p>
												<div class="radio">
													<small> Not relevant at all </small> 
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="CheckA1" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="CheckA1" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="CheckA1" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="3" name="CheckA1" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label>
													<label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="CheckA1" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label> 
													<small> &nbsp; Absolutely relevant </small>
                                                </div> <br/>
												<p> <strong> <h2> B] If adopted, to how much of our population can it impact? </h2> </strong> </p> 
												<h5> <p> We are asking in terms of percentage of India population, which can be taken as 130 Crore / 1.3 billion, projected in 2020 for this exercise. </p> </h5>
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="CheckA2" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp; Less than 0.01% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="1" name="CheckA2" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;	 0.01 to 0.1% 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="2" name="CheckA2" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> &nbsp;  0.1 to 1% 
												</div>	
												<div class="radio">
                                                    <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="3" name="CheckA2" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; 1 to 10 % 
												</div>	
												<div class="radio">
                                                     <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="4" name="CheckA2" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label>	&nbsp; More than 10 % 
												</div> <br/>
												<p> <strong> <h2> [C] If adopted, what could be the level of its impact on following five landscapes? </h2> </strong> </p>
												<p> (a) Social (covers impact that could be demographic, cultural, societal, on families or their structures, lifestyles, human interactions, etc.) </p>
												<p> (b) Technological (including spin-offs, spawning/triggering new technologies, affecting other technology domains etc.)</p>
												<p> (c) Environmental (living and built environment, climate, weather, natural resources, flora and fauna etc.) </p> 
												<p> (d) Economic (wealth generation, asset creation, manufacturing, services, flow of funds, investments, spending etc.) </p>
												<p> (e) Political (government, governance, public policy, etc.) Disruptive technologies are the ones which may displace existing technology or introduce an entirely novel concept to society. </p>
												<table class="table table-responsive" style="position: relative; top:-110px;">
												<thead>
													<tr>
														<th></th> <th>No impact</th> <th>Low impact</th> <th>Moderate impact</th> <th>High impact</th> <th>Disruptive</th>
													</tr>
												</thead>
												<tbody>
												<tr> <div class="radio">
													<td> <h5> Social  </h5> </td>
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="CheckA31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label> </td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="CheckA31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="2" name="CheckA31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="CheckA31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="CheckA31" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div></tr>
												<tr> <div class="radio">
													 <td> <h5> Technological </h5> </td> 
                                                   <td>  <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="CheckA32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="CheckA32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="CheckA32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="CheckA32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="CheckA32" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Environmental </h5></td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="CheckA33" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="CheckA33" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="CheckA33" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="CheckA33" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="CheckA33" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                            </div> </tr>
												<tr> <div class="radio">
													<td> <h5> Economic </h5> </td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat" value ="0" name="CheckA34" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="1" name="CheckA34" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="CheckA34" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="CheckA34" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="4" name="CheckA34" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr>
												<div class="radio">
													<td> <h5>  Political </h5> </td> 
                                                    <td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;" >
														<input type="radio" class="flat"  value ="0" name="CheckA35" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="1" name="CheckA35" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="2" name="CheckA35" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat" value ="3" name="CheckA35" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
                                                    </label></td> 
													<td> <label class="">
                                                        <div class="iradio_flat-green" style="position: relative;">
														<input type="radio" class="flat"  value ="4" name="CheckA35" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
													</label></td> 
                                                </div> </tr> </tbody> </table>
												<p> <strong> <h2> [D] Indicate any positive or negative impact(s) that you foresee (Optional)  <h2> </strong> </p>
												<div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <textarea rows="4" cols="50" id="comment" class="form-control col-md-7 col-xs-12" style="border-style: solid; border-color:#808080" > </textarea>
												</div>
											</form>
                                        </div>
                                    </div>
                                    <!-- End SmartWizard Content -->
                                </div>
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
                

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>
	
    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>

    <script src="js/custom.js"></script>
    <!-- form wizard -->
    <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
	<script src="js/questionnaire.js"></script>
	<script src="js/response.js"></script>
	
	  <script type="text/javascript">
   
    $("#ques_select").change(function() {

        $("#selected").remove();        

        var req = new XMLHttpRequest();
        $.ajax({
                type: 'GET',
                url: 'http://localhost/techstore/gentelella-master/production/techdataselect.php',
                dataType: "json",
                data: {currentQues:$(this).val() },
                async: true,
                success: function(output){
                    console.log(output);
                    loadData();
                }
               
            });
    });
           $(document).ready(function () {

            // Smart Wizard     
            $('#wizard').smartWizard();

        });

        
    </script>

</body>

</html>
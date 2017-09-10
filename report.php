<?php 
require_once('config.php');
  session_start(); 
  if(!isset($_SESSION['role'])){
    echo "<script>
      window.location.href='".SERVER_URL."logout.php';
      </script>";
}
$_SESSION['currentPage'] = "report";
require('helper.php');
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
    <link href="css/datatables.min.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <!-- editor -->
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">
   
     <style type="text/css">
    .dataTables_filter {
    display: none; 
    }
    table.dataTable thead .sorting_asc:after {
        content: "" !important; 
    }
    table.dataTable thead .sorting_desc:after {
        content: "" !important; 
    }
     table.dataTable thead .sorting:after {
        content: "" !important; 
    }


    </style>
    
    <script src="js/config.js"></script>

    <script src="js/jquery.min.js"></script>     
    <script src="js/notify.min.js"></script>
     <!-- Datatables -->

        <script src="js/datatables.min.js"/>
        <script src="js/datatables/tools/js/dataTables.tableTools.js"></script>
            <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min2.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <script src="js/ion_range/ion.rangeSlider.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
 
       
        <script>
          var min1 = 0;
         var max1 = 5000;
        var min2 = -1;
         var max2 = 28;
        minDateFilter = "";
        maxDateFilter = "";
        $(document).ready(function () {

            var table = $('#example').DataTable({
              select :true,
              processing: true,  
              order: [[ 5, "desc" ],[ 4, "desc" ]],
              iDisplayLength: 10,
              sPaginationType: "full_numbers",
              initComplete: function(){
                 var api = this.api();
                 new $.fn.dataTable.Buttons(api, {
                  buttons: [
                  { extend: 'pdf',
                          text: 'Export to PDF',
                           orientation: 'landscape'},  
                  { extend: 'csv',
                          text: 'Export to CSV'}
                 ]
                });
                api.buttons().container().appendTo( '#pdf' );  
              }
           });    
            
             $('#tocal').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function (start, end, label) {
                var end1 = new Date(end);
                maxDateFilter= end1.getDate() + '/' + (end1.getMonth() + 1) + '/' +  end1.getFullYear();
                table.draw();
            }).keyup(function() {
                var end1 = new Date(end);
                maxDateFilter= end1.getDate() + '/' + (end1.getMonth() + 1) + '/' +  end1.getFullYear();
                table.draw();
            });


             $('#fromcal').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"                
            }, function (start, end, label) {
                var start1 = new Date(start);     
                minDateFilter = start1.getDate() + '/' + (start1.getMonth() + 1) + '/' +  start1.getFullYear();
                table.draw();
            }).keyup(function() {
                var start1 = new Date(start);     
                minDateFilter = start1.getDate() + '/' + (start1.getMonth() + 1) + '/' +  start1.getFullYear();
                table.draw();
            });


         $("#impressionValue").ionRangeSlider({
                type: "double",
                min: 0,
                max: 5000,
                force_edges: true,
                onChange : function(obj){
                   min1 = obj.from;
                   max1 = obj.to;
                   table.draw();
                }
        });

         $("#scoreValue").ionRangeSlider({
                type: "double",
                min: -1,
                max: 28,
                grid: true,
                force_edges: true,
                 onChange : function(obj){
                   min2 = obj.from;
                   max2 = obj.to;
                   table.draw();
                }
            });

        $("#search").on("change paste keyup", function() {
                 table.search($(this).val()).draw() ;
               });
        });    


        $.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {

        var x = minDateFilter.split("/");
        var y = maxDateFilter.split("/");
        var z = aData[6].split("/");
        var iMin = new Date(x[2], x[1] - 1, x[0]).getTime();
        var iMax = new Date(y[2], y[1] - 1, y[0]).getTime();
        var iDate = new Date(z[2], z[1] - 1, z[0]).getTime();
        console.log("rowdata"+iDate);
        console.log("min"+iMin);
        if ( isNaN(iMin) && isNaN(iMax) )
        {
            console.log("1"+true);
            return true;
        }
        else if ( iMin == "" && iMax == "" )
        {
            console.log("2"+true);
            return true;
        }
        else if ( isNaN(iMax) && iDate > iMin )
        {
            console.log("iDate 1 = "+iDate);
            return true;
        }
        else if ( isNaN(iMin) && iDate < iMax )
        {
            console.log("iDate 1 = "+iDate);
            return true;
        }
        else if ( iMax == ""  && iDate > iMin )
        {
            console.log("iDate 1 = "+iDate);
            return true;
        }
        else if ( iMin == ""  && iDate < iMax )
        {
            console.log("iDate 1 = "+iDate);
            return true;
        }
        else if ( iMin < iDate && "" == iMax )
        {
            console.log("iDate 2 = "+iDate);
            return true;
        }
        else if ( iMin < iDate && iDate < iMax )
        {
            console.log("iDate = 3 "+iDate);
            return true;
        }
        else if(iMin == iDate || iDate == iMax){
            console.log("iDate = 4 "+iDate);
            return true;
        }
        console.log("f"+false);
        return false;
    }
);

      $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
        var impression = parseFloat( data[4] ) || 0; // use data for the age column
 
        if ( ( isNaN( min1 ) && isNaN( max1 ) ) ||
             ( isNaN( min1 ) && impression <= max1 ) ||
             ( min1 <= impression   && isNaN( max1 ) ) ||
             ( min1 <= impression   && impression <= max1 ) )
        {
            return true;
        }
        return false;
    }
);

      $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
        var score = parseFloat( data[5] ) || 0; // use data for the age column
 
        if ( ( isNaN( min2 ) && isNaN( max2 ) ) ||
             ( isNaN( min2 ) && score <= max2 ) ||
             ( min2 <= score   && isNaN( max2 ) ) ||
             ( min2 <= score   && score <= max2 ) )
        {
            return true;
        }
        return false;
    }
);
              
        </script>

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
                            <h3>Report</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" >
                                <div class="x_title">
                                    <h2>Apply filters for more specific results</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <br />
                                    <form id="form1" data-parsley-validate class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" > Search for word / sentence: 
                                            </label>
                                            <input id="search" style="text-align:left; position: relative; top: 8px;" class="control-input col-md-6  col-sm-6 col-xs-12 "></input>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style=" position: relative; top: 10px;" > Filter by Impression value: 
                                            </label>
                                               <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="impressionValue" value="" name="rangeImpression" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" > Filter by Score value: 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="scoreValue" value="" name="rangeScore" />
                                            </div>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" > From: 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="fromcal" placeholder="Pick a date" aria-describedby="inputSuccess2Status4"/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                                                                    
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" > To: 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="tocal" placeholder="Pick a date" aria-describedby="inputSuccess2Status4"/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                                                                    
                                        </div>
                                           <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                                                  <div id= "pdf"></div>                                     
                                            </div>
                                        </div>
                                      
                                      
                                        <div class="form-group">
                                            <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Title</th>
                                                <th>URL</th>
                                                <th>Summary</th>
                                                <th>Keywords</th>
                                                <th>Impression</th>
                                                <th>Score</th>
                                                <th>Date</th>
                                                
                                            </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $cursor = $GLOBALS['collection']->find(array('impression' =>  array('$exists' => true)));
                                        $check = 2 ;
                                        foreach ($cursor as $document) {
                                        //    if(array_key_exists("impression",$document)){
                                                if($check%2 == 0){
                                                echo '<tr class="even pointer">
                                                <td class=" ">'.$document["title"].'</td>
                                                <td class=" "><a href="'.$document["url"].'">View</a>';
                                                if(array_key_exists("summary",$document)){
                                                echo '<td class=" ">'.$document["summary"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                if(array_key_exists("keywords",$document)){
                                                echo '<td class=" ">'.implode(",",$document["keywords"]->jsonSerialize()).'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                if(array_key_exists("impression",$document)){
                                                echo '<td class=" ">'.$document["impression"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                if(array_key_exists("score",$document)){
                                                echo '<td class=" ">'.$document["score"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                 if(array_key_exists("date",$document)){
                                                echo '<td class=" ">'.$document["date"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                echo '</tr>';
                                                }
                                                 else{
                                                    echo '<tr class="even pointer">
                                                <td class=" ">'.$document["title"].'</td>
                                                <td class=" "><a href="'.$document["url"].'">View</a>';
                                                if(array_key_exists("summary",$document)){
                                                echo '<td class=" ">'.$document["summary"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                if(array_key_exists("keywords",$document)){
                                                echo '<td class=" ">'.implode(",",$document["keywords"]->jsonSerialize()).'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                if(array_key_exists("impression",$document)){
                                                echo '<td class=" ">'.$document["impression"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                if(array_key_exists("score",$document)){
                                                echo '<td class=" ">'.$document["score"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                 if(array_key_exists("date",$document)){
                                                echo '<td class=" ">'.$document["date"].'</td>';
                                                }
                                                else{
                                                echo '<td class=" ">'."".'</td>';
                                                }
                                                echo '</tr>';
                                               }
                                               $check++;  

                                         //   }
                                        } 
                                        ?>
                                       </tbody>
                                            </table>
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


</body>

</html>
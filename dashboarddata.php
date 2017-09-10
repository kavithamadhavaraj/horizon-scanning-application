<?php
 try{ 
  require_once('config.php');
  if(!isset($_SESSION['role'])){
    echo "<script>
      window.location.href='".SERVER_URL."logout.php';
      </script>";
  }
  $m = new MongoDB\Client("mongodb://".MONGO_SERVER.":".MONGO_PORT);
   $db = $m->techstore;
   $collection_techdata = $db->techdata;
   $collection_authdata = $db->auth_user;
   $collection_quesdata = $db->questionnaire;
   $collection_response = $db->user_response;
   $totaltechnologies = $collection_techdata->count();
   $scoredtechnologies = $collection_techdata->count(array("score" => array('$ne' => -1 )));
   $t1 = $collection_techdata->count(array("isPosted" => array('$exists' => true, '$ne' => "discarded")));
   $t2 = $collection_techdata->count(array("impression" => array('$exists' => true )));
   $facebookreach = round(($t2/1)*100); //alerted
   $totalusefultechnologies = $collection_techdata->count(array("isPosted" => array('$ne' => "discarded" )));
  
  
   $totalreviewers = $collection_authdata->count();
   $totalexperts = $collection_authdata->count(array("role" => "Expert Reviewer"));
   $totalquestionnaire = $collection_quesdata->count();
   $score = array();
   $social = array();
   $technology = array();
   $environmental = array();
   $economical = array();
   $political = array();
   $social_t = array();
   $technology_t = array();
   $environmental_t = array();
   $economical_t = array();
   $political_t= array();
   $cursor_r = $collection_response->find();
   foreach($cursor_r as $document)
   {
     foreach($document['response'] as $data){
      $score[] = $data['totalscore'];
      foreach($data['scoreC'] as $value){
        if(($value['social'] == 3)||($value['social'] == 4)) {
        $social[] = $value['social']; }
        $social_t[] = $value['social'];
        if(($value['technological'] == 3)||($value['technological'] == 4)) {
        $technology[]=$value['technological']; }
        $technology_t[]=$value['technological'];
        if(($value['environmental'] == 3)||($value['environmental'] == 4)) {
        $environmental[]=$value['environmental']; }
        $environmental_t[]=$value['environmental'];
        if(($value['economic'] == 3)||($value['economic'] == 4)) {
        $economical[]=$value['economic'];}
        $economical_t[]=$value['economic'];
        if(($value['political'] == 3)||($value['political'] == 4)) {
        $political[]=$value['political'];}
        $political_t[]=$value['political'];
      }
      break;
     }
   }
   $total = 1;
   $total = sizeof($score);
   $total_s = 0; 
   $total_t = 0; 
   $total_e = 0;
   $total_ec = 0;
   $total_p = 0;
   for($i=0; $i< $total; $i++){
    $total_s =  $total_s + $social_t[$i];
    $total_t =  $total_t + $technology_t[$i];
    $total_e =  $total_e + $environmental_t[$i];
    $total_ec =  $total_ec + $economical_t[$i];
    $total_p =  $total_p + $political_t[$i];
   }
   if($total != 0){
    $total_s = ($total_s/($total*4))*100; 
    $total_t = ($total_t/($total*4))*100; 
    $total_e = ($total_e/($total*4))*100;
    $total_ec =($total_ec/($total*4))*100;
    $total_p = ($total_p/($total*4))*100;
   }else{
    $total_s = "NA"; 
    $total_t = "NA"; 
    $total_e = "NA"; 
    $total_ec = "NA"; 
    $total_p = "NA"; 
   }
   
   $stardate = date('01-m-Y');
   $enddate = date('t-m-Y');
   $period = new DatePeriod(
     new DateTime($stardate),
     new DateInterval('P1D'),
     new DateTime($enddate)
  );
   $newperiod = array();
   $eachdaycount = array();

    foreach( $period as $date) { 
      $newperiod[] = ($date->format('d/m/Y'));
      $eachdaycount[] = $collection_techdata->count(array("date" => $date->format('d/m/Y')));
    }
 }
 catch(MongoConnectionException $e){
  if(isset($_SESSION['currentPage']))
    header('Location: '+ SERVER_URL . $_SESSION['currentPage'].'.php');
 }
?>
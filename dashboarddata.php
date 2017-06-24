<?php
 try{ 
   $m = new MongoClient();
   $db = $m->techstore;
   $collection_techdata = $db->techdata;
   $collection_authdata = $db->auth_user;
   $collection_quesdata = $db->questionnaire;
   $collection_response = $db->user_response;
   $cursor_t = $collection_techdata->find();
   $totaltechnologies = $cursor_t->count(true);
   $cursor_t = $collection_techdata->find(array("score" => array('$ne' => -1 )));
   $scoredtechnologies = $cursor_t->count(true);
   $cursor_t = $collection_techdata->find(array("isPosted" => array('$exists' => true, '$ne' => "discarded")));
   $t1 =  $cursor_t->count(true);
   $cursor_t = $collection_techdata->find(array("impression" => array('$exists' => true )));
   $t2 =  $cursor_t->count(true);
   $facebookreach = round(($t2/1)*100); //alerted
   $cursor_t = $collection_techdata->find(array("isPosted" => array('$ne' => "discarded" )));
   $totalusefultechnologies =  $cursor_t->count(true);
   $cursor_a = $collection_authdata->find();
   $totalreviewers = $cursor_a->count(true);
   $cursor_a = $collection_authdata->find(array("role" => "Expert Reviewer"));
   $totalexperts = $cursor_a->count(true);
   $cursor_q = $collection_quesdata->find();
   $totalquestionnaire = $cursor_q->count(true);
   $cursor_r = $collection_response->find(array("response" => array('$exists' => true )));
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
     }
   }
   $total=1;
   $total=sizeof($score);
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
   $total_s = ($total_s/($total*4))*100; 
   $total_t = ($total_t/($total*4))*100; 
   $total_e = ($total_e/($total*4))*100;
   $total_ec =($total_ec/($total*4))*100;
   $total_p = ($total_p/($total*4))*100;
   
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
     $cursor_t = $collection_techdata->find(array("date" => $date->format('d/m/Y')));
      $eachdaycount[] = $cursor_t->count(true);
    }
 }
 catch(MongoConnectionException $e){
  if(isset($_SESSION['currentPage']))
    header('Location: http://localhost/techstore/gentelella-master/production/'.$_SESSION['currentPage'].'.php');
 }
?>
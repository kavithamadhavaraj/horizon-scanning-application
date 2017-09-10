<?php
	require_once('config.php');
	session_start();
	 // connect to mongodb
   $m = new MongoDB\Client("mongodb://".MONGO_SERVER.":".MONGO_PORT);
   $db = $m->techstore;

   $collection = $db->techdata;
   $collection2 = $db->questionnaire;
   if(isset($_GET["currentQues"]))
	{
		if($_GET["currentQues"] != "select"){
	 	$mycur = $collection2->find(array("name" => $_GET["currentQues"]));
		 foreach ($mycur as $document) {
   	 		$_SESSION['currentQuestionnaire']= $document["_id"];
   	  	 }
   	  	echo json_encode($_SESSION['currentQuestionnaire']);
   	  }
   	  
	}

	else{
	$obj_id_array = array();
	$title_array = array();
	$url_array = array();
	$desc_array = array();
   
  /*  $coll= $db->auth_user;
    $cur = $coll->find(array("username" => $_SESSION['username']));
    $emailID = null;
    foreach($cur as $documents){ 
			$emailID = $documents['E-mail'];
	}

	*/
	$cursor2 = $collection2->find(array('_id' => (new MongoDB\BSON\ObjectID(($_SESSION['currentQuestionnaire'])))));
	$tech_id = array();
	
  	foreach($cursor2 as $documents){ 
			$tech_id = explode(",", $documents["setData"]);
	foreach($tech_id as $data){
		//echo $data."\n";
		$cursor = $collection->find(array('_id' => (new MongoDB\BSON\ObjectID($data))));
		foreach ($cursor as $document) {
			$obj_id_array[] = $document["_id"];
			$title_array[] = $document["title"];
			$url_array[]= $document["url"];
			$desc_array[] = $document["summary"];
			
		}
		} 	
	}
 		echo json_encode(array($obj_id_array, $title_array, $url_array, $desc_array));

	}
 
	
  
?>

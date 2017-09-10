<?php
	session_start();
	require_once('config.php');
	if(isset($_POST['data1'])){
	$output = json_decode($_POST['data1'],true);
    $m = new MongoDB\Client("mongodb://".MONGO_SERVER.":".MONGO_PORT);
	$db = $m->techstore;
	$collection = $db->user_response;
	$dcollection = $db->techdata;
	$totalscore = array();
	$nodeid = $output['node'];// $output['node'];
	$scoremap = $output['score'];//$output['score'];
	$titlemap = $output['title'];//$output['title'];
	
	
	$score = array();
	
	for ($x = 0; $x < sizeof($nodeid); $x++) {
		array_push($totalscore, array_sum($scoremap[$x]));
	}

	

	for ($x = 0; $x < sizeof($nodeid); $x++) {
		if(($collection->count(array(('username') => $_SESSION["username"], "techId" => $nodeid[$x])))> 0){
			echo json_encode("exist");
			$collection->updateOne(array("username"=>$_SESSION["username"], "techId" => $nodeid[$x]), 
				array('$set'=>array("response" =>[array(
									"techtitle" => $titlemap[$x],
									"scoreA" => $scoremap[$x][0],
									"scoreB" => $scoremap[$x][1],
									"scoreC" => [array (
													"social" => $scoremap[$x][2],
													"technological" => $scoremap[$x][3],
													"environmental" => $scoremap[$x][4],
													"economic" => $scoremap[$x][5],
													"political" => $scoremap[$x][6]
												)],
									"totalscore" => $totalscore[$x]
								)]
			)));
		}
		else{
			echo json_encode("nexist");
			$mongoID = (new MongoDB\BSON\ObjectID($nodeid[$x]));		
			$result = $dcollection->findOne(array("_id" => $mongoID));
			$newdata = array('$set' => array("score" => $totalscore[$x] + $result["score"]));
			$dcollection->updateOne(array("_id" =>  $mongoID), $newdata);
			$document = array(  
				"username" =>$_SESSION["username"] , 
				"techId" => $nodeid[$x],
				"response" => [array(									
									"techtitle" => $titlemap[$x],
									"scoreA" => $scoremap[$x][0],
									"scoreB" => $scoremap[$x][1],
									"scoreC" => [array (
													"social" => $scoremap[$x][2],
													"technological" => $scoremap[$x][3],
													"environmental" => $scoremap[$x][4],
													"economic" => $scoremap[$x][5],
													"political" => $scoremap[$x][6]
												)],
									"totalscore" => $totalscore[$x]
								)]
			);
			$collection->insertOne($document);
		}
	 
	}  
	}	
?>

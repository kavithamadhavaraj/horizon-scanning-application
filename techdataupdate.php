<?php
	session_start();
	echo json_encode("hello");
	if(isset($_POST['data1'])){
	$output = json_decode($_POST['data1'],true);
	$m = new MongoClient();
	$db = $m->techstore;
	$collection = $db->user_response;
	$totalscore = array();
	$nodeid = $output['node'];// $output['node'];
	$scoremap = $output['score'];//$output['score'];
	$titlemap = $output['title'];//$output['title'];
	
	$total = 0;
	$score = array();
	
	for ($x = 0; $x < sizeof($nodeid); $x++) {
		for ($y = 0; $y < sizeof($scoremap); $y++) {
			$total = $total + $scoremap[$x][$y];
		}
		array_push($totalscore, $total);
	}

	for ($x = 0; $x < sizeof($nodeid); $x++) {
		$cursor = $collection->find(array(('username') => $_SESSION["username"]));
		if(($cursor->count())> 0){
			echo json_encode("exist");
			$collection->update(array("username"=>$_SESSION["username"]), 
				array('$push'=>array("response" =>array(
									"techId" => $nodeid[$x],
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
								)
								)));
		}
		else{
			echo json_encode("nexist");
			$document = array(  
				"username" =>$_SESSION["username"] , 
				"response" => [array(
									"techId" => $nodeid[$x],
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
			$collection->insert($document);
		}
	}  
	}	
?>

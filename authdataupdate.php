<?php
require_once('config.php');
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == "admin" ) {
    }
    elseif (($_SESSION['role'] == "moderator") ||($_SESSION['role'] == "reviewer")||($_SESSION['role'] == "Expert Reviewer")) {
        echo "<script>window.location.href='".SERVER_URL."logout.php';</script>"; 
    }
}
else{
    echo "<script>window.location.href='".SERVER_URL."logout.php';</script>"; 
}
if(isset($_POST['action']) && !empty($_POST['action'])) {
   $data = json_decode(stripslashes($_POST['action']));
   $m = new MongoDB\Client("mongodb://".MONGO_SERVER.":".MONGO_PORT);
   $db = $m->techstore;
   $collection = $db->auth_user;
   $cursor = $collection->find();
   
   $GLOBALS["check"] = 0;
   
   // iterate cursor to check documents
   foreach ($cursor as $document) {
      if(($document["E-mail"] == $data[0]) || ($document["username"] == $data[1]))
		{
			$GLOBALS["check"] = $GLOBALS["check"]+ 1;
			echo json_encode(array("answer"=>"failure"));
			break;
		}
	}
	if($GLOBALS["check"]== 0) {

			if($data[3] == "expert")
				$role = "Expert Reviewer";
			else
				$role = "Reviewer";
			$document = array(  
				"E-mail" => $data[0],
				"username" => $data[1],
				"password" => $data[2],
				"role" => $role
			);
		// now insert the document
			$collection->insertOne($document);
			echo json_encode(array("answer"=>"success"));
			//echo "Document inserted successfully"; 
	}
	
}
?>
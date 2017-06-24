<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {
   $data = json_decode(stripslashes($_POST['action']));
   $m = new MongoClient();
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
			$collection->insert($document);
			echo json_encode(array("answer"=>"success"));
			//echo "Document inserted successfully"; 
	}
	
}
?>
<?php
  session_start();
	if(isset($_POST['action']) && !empty($_POST['action'])) {
   $data = json_decode(stripslashes($_POST['action']));
	//$data = json_decode(stripslashes($_POST['data']));

   // connect to mongodb
   $m = new MongoClient();
	
   //echo "Connection to database successfully \n ";
   // select a database
   $db = $m->techstore;
	
   //echo "Database techstore selected \n ";
   $collection = $db->auth_user;
  // echo "Collection techdata selected \n ";
    $cursor = $collection->find(array('username' => $data[0]));
    $_SESSION['valid'] = false;
   // iterate cursor to display title of documents
    foreach ($cursor as $document) {
      if($document['password'] == $data[1]){
 	    $_SESSION['username'] = $document['username'];
		  $_SESSION['password'] = $document['password'];
		  $_SESSION['role'] = $document['role'];	
      $_SESSION['valid'] = true;
      break;
    }
    else{
      $_SESSION['valid'] = false;
      break;
    }	
   }
   echo $_SESSION['valid'];
 }
?>

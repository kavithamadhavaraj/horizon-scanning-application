<?php
  session_start();
  require 'config.php';
	if(isset($_POST['username']) && isset($_POST['passWord'])){
   $_SESSION['valid'] = false;
   // connect to mongodb
   $m = new MongoDB\Client("mongodb://".MONGO_SERVER.":".MONGO_PORT);
   // select a database
   $db = $m->techstore;	
   $collection = $db->auth_user;
   $cursor = $collection->find(['username' => $_POST['username']]);  
   // iterate cursor to display title of documents
    foreach ($cursor as $document) {
      if($document['password'] == $_POST['passWord']){
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
    header('Location:'. SERVER_URL.'login.php');
 }
 header('Location:'. SERVER_URL.'login.php');
?>

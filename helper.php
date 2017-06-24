<?php
  try{ 
   $m = new MongoClient();
   debug_to_console("Connection to database successfull");
   $db = $m->techstore;
   debug_to_console("Database techstore selected");
   $collection = $db->techdata;
 }
 catch(MongoConnectionException $e){
  if(isset($_SESSION['currentPage']))
    header('Location: http://localhost/techstore/gentelella-master/production/'.$_SESSION['currentPage'].'.php');
 }
   debug_to_console("Collection techdata selected");
   $result = null;
   require './facebook-sdk-v5/Facebook.php';
    // Create our Application instance (replace this with your appId and secret).
    $facebook = new Facebook(array(
    'appId'  => '950411125007007',
    'secret' => '4b77caeee8c8c42b33ff2e6f742e9de4',
    'cookie' => true
   ));
   
   function postToFB($title,$url){

   $ret_obj = $GLOBALS['facebook']->api('/'.$_SESSION['page_id'].'/feed', 'post',
            array('access_token' => $_SESSION['page_token'],
            'from' => '950411125007007',
            'to' => $_SESSION['page_id'],
            'caption' => '- a techstore Post',
            'link' => $url,
            'description' =>  $title
            ));

    return $ret_obj['id'];
  }

  function getInsights($postid){
  // $ret_obj = $GLOBALS['facebook']->api('/'.$postid.'/insights/post_impressions?period=lifetime');
   return rand (0,80);
  }


	function debug_to_console( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	}
	
	function find_next_record( $filter ) {
		$cursor = $GLOBALS['collection']->find(array($filter =>  array('$exists' => false)));
		$cursor->limit(1);
   		// iterate cursor to display title of documents
   		foreach ($cursor as $document) {
   			 $GLOBALS['result'] = $document; 
	    }
	}

 	if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    if (isset($_POST['discard'])) {
      $mongoID = new MongoID($_GET['id']);
      $newdata = array('$set' => array("isPosted" => "discarded"));
      $collection->update(array("_id" => $mongoID ), $newdata);
      find_next_record('isPosted');
    } 

    elseif (isset($_POST['assign'])){ 
      $newdata = array('$set' => array("userlist" => explode(",",$_POST['userlist'])));
      $collection = $db->questionnaire;
      $collection->update(array("name" => $_POST['selection']), $newdata);
      echo "<script>
alert('Updated successfully');
window.location.href='http://localhost/techstore/gentelella-master/production/assign.php';
</script>";
    }
    
    elseif (isset($_POST['post'])){
      $mongoID = new MongoID($_GET['id']);
      $fbid = postToFB($_GET['title'],$_GET['url']);
     	$newdata = array('$set' => array("isPosted" => $fbid, "keywords" => explode(",",$_POST['tags_value'])));
      $collection->update(array("_id" => $mongoID ), $newdata);
      find_next_record('isPosted');
    }
    elseif (isset($_POST['create'])){
       if(!(empty($_POST['qname'])) && !(empty($_POST['ids']))){
        $document = array(  
        "name" => $_POST['qname'],
        "setData" => $_POST['ids']
      ); 

      $collection = $db->questionnaire;
      $cursor = $collection->find(array('name' => $_POST['qname']));
      if($cursor->count()){
             echo "<script>
alert('Questionnaire name already exists!');
window.location.href='http://localhost/techstore/gentelella-master/production/createQuestionnaire.php';
</script>"; 
      }
      else{
      $collection->insert($document);
      echo "<script>
alert('Created successfully');
window.location.href='http://localhost/techstore/gentelella-master/production/createQuestionnaire.php';
</script>";
      }
    }
      else{
         echo "<script>
alert('Empty questionnaire name / selection ! Please retry !');
window.location.href='http://localhost/techstore/gentelella-master/production/createQuestionnaire.php';
</script>";
      }

      
     // echo "<script> alert('Created successfully'); </script>";
     // header('Location: http://localhost/techstore/gentelella-master/production/createQuestionnaire.php');
     // debug_to_console(implode(",",$_POST['param']));
    /*  $mongoID = new MongoID($_GET['id']);
      $fbid = postToFB($_GET['title'],$_GET['url']);
      $newdata = array('$set' => array("isPosted" => $fbid, "keywords" => explode(",",$_POST['tags_value'])));
      $collection->update(array("_id" => $mongoID ), $newdata);
      find_next_record('isPosted');*/
    }
     elseif (isset($_POST['insights'])){
      $cursor = $GLOBALS['collection']->find(array("isPosted" =>  array('$ne' => "discarded")));
      foreach ($cursor as $document) {
        if(array_key_exists("isPosted",$document)){
          $newdata = array('$set' => array("impression" => getInsights($document['isPosted'])));
          $collection->update(array("_id" => $document['_id'] ), $newdata); 
          find_next_record('isPosted');        
        }
      }
    }

}
?>
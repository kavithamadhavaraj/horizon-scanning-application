<?php
  require_once('config.php');
  try{ 
   $m = new MongoDB\Client("mongodb://".MONGO_SERVER.":".MONGO_PORT);
   debug_to_console("Connection to database successfull");
   $db = $m->techstore;
   debug_to_console("Database techstore selected");
   $collection = $db->techdata;
 }
 catch(MongoConnectionException $e){
  if(isset($_SESSION['currentPage']))
    header('Location: '+SERVER_URL+$_SESSION['currentPage'].'.php');
 }
   debug_to_console("Collection techdata selected");
   $result = null;
    // Create our Application instance (replace this with your appId and secret).
    $facebook = new \Facebook\Facebook([
    'app_id'  => 'YOUR APP ID',
    'app_secret' => 'YOUR APP SECRET',
    'default_graph_version' => 'v2.10',
    'cookie' => true
    ]);
   
   function postToFB($title,$url){
     try {
      $response = $GLOBALS['facebook']->post('/'.$_SESSION['page_id'].'/feed',
              ['access_token' =>$_SESSION['page_token'],
                'from' => 'YOUR APP ID',
              'to' => $_SESSION['page_id'],
              'caption' => '- a demo Post by CAAN Associates',
              'link' => $url,
              'description' =>  $title
              ]);
        return json_decode($response->getBody())->id;
      } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }
  }

  function getInsights($postid){
    // try {
      // $response = $GLOBALS['facebook']->get('/'.$postid.'/insights/page_post_engagements');
      //   echo serialize($response->getDecodedBody());
      // } catch(\Facebook\Exceptions\FacebookResponseException $e) {
      //   echo 'Graph returned an error: ' . $e->getMessage();
      //   exit;
      // } catch(\Facebook\Exceptions\FacebookSDKException $e) {
      //   echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //   exit;
      // }
    #return $ret_obj;
    return rand(0,80);
  }


	function debug_to_console( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	}
	
	function find_next_record( $filter ) {
    $options = ['sort' => ['date' => -1], 'limit' => 1 ];
		$cursor = $GLOBALS['collection']->find(array($filter =>  array('$exists' => false)), $options);
   		// iterate cursor to display title of documents
   		foreach ($cursor as $document) {
   			 $GLOBALS['result'] = $document; 
	    }
	}

 	if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    if (isset($_POST['discard'])) {
      $mongoID = (new MongoDB\BSON\ObjectID($_GET['id']));
      $newdata = array('$set' => array("isPosted" => "discarded", "keywords" => explode(",",$_POST['tags_value'])));
      $collection->updateOne(array("_id" => $mongoID ), $newdata);
      find_next_record('isPosted');
    } 

    elseif(isset($_POST['selectionName'])){     
        $collection = $db->questionnaire;
        $cursor = $collection->find(array('name' =>  $_POST['selectionName']));
        foreach ($cursor as $document) {    
             if(isset($document["userlist"]))      
              echo json_encode($document['userlist']);
            else
              echo "[]";                        
        }
    }

    elseif (isset($_POST['assign'])){ 
      if (isset($_POST['user_selection'])){  
          $newdata = array('$set' => array("userlist" => $_POST['user_selection']));
          $collection = $db->questionnaire;
          $collection->updateOne(array("name" => $_POST['selection']), $newdata);
          echo "<script>alert('Reviewers assigned successfully')</script>";
      }
    }
    
    elseif (isset($_POST['post'])){
      $mongoID = (new MongoDB\BSON\ObjectID($_GET['id']));
      $fbid = postToFB($_GET['title'],$_GET['url']);
     	$newdata = array('$set' => array("isPosted" => $fbid, "keywords" => explode(",",$_POST['tags_value'])));
      $collection->updateOne(array("_id" => $mongoID ), $newdata);
      find_next_record('isPosted');
    }
    elseif (isset($_POST['create'])){
       if(!(empty($_POST['qname'])) && !(empty($_POST['ids']))){
        $document = array(  
        "name" => $_POST['qname'],
        "setData" => $_POST['ids']
      ); 

      $collection = $db->questionnaire;
      if($collection->count(array('name' => $_POST['qname']))){
             echo "<script>
alert('Questionnaire name already exists!');
window.location.href='".SERVER_URL."createQuestionnaire.php';
</script>"; 
      }
      else{
      $collection->insertOne($document);
      echo "<script>
alert('Created successfully');
window.location.href='".SERVER_URL."createQuestionnaire.php';
</script>";
      }
    }
      else{
         echo "<script>
alert('Empty questionnaire name / selection ! Please retry !');
window.location.href='".SERVER_URL."createQuestionnaire.php';
</script>";
      }
    }
     elseif (isset($_POST['insights'])){
      $cursor = $GLOBALS['collection']->find(array("isPosted" =>  array('$ne' => "discarded")));
      foreach ($cursor as $document) {
        if(array_key_exists("isPosted",$document)){
          $newdata = array('$set' => array("impression" => getInsights($document['isPosted'])));
          $collection->updateOne(array("_id" => $document['_id'] ), $newdata); 
          find_next_record('isPosted');        
        }
      }
    }

}
?>
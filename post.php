<?php
   session_start();
   require './facebook-sdk-v5/Facebook.php';
    // Create our Application instance (replace this with your appId and secret).
    $facebook = new Facebook(array(
    'appId'  => '950411125007007',
    'secret' => '4b77caeee8c8c42b33ff2e6f742e9de4',
    'cookie' => true
   ));
   if(isset($_GET['fbTrue'])){
    $token_url = "https://graph.facebook.com/oauth/access_token?"
        . "client_id=950411125007007&redirect_uri=" . urlencode('http://localhost/techstore/gentelella-master/production/post.php?fbTrue=true')
        . "&client_secret=4b77caeee8c8c42b33ff2e6f742e9de4&code=" . $_GET['code'];
 
    $response = file_get_contents($token_url);   // get access token from url
    $params = null;
    parse_str($response, $params);
 
    $_SESSION['token'] = $params['access_token'];
 
    $graph_url_pages = "https://graph.facebook.com/me/accounts?access_token=".$_SESSION['token'];
    $pages = json_decode(file_get_contents($graph_url_pages)); // get all pages information from above url.
    $_SESSION['page_token'] = $pages->data[0]->access_token;
    $_SESSION['page_id'] = $pages->data[0]->id;
    //echo $_SESSION['page_id'];
    if(isset($_SESSION['currentPage'])){
      if($_SESSION['currentPage'] == "postFB"){
        header('Location: http://localhost/techstore/gentelella-master/production/postFB.php');
      }
      elseif($_SESSION['currentPage'] == "createQuestionnaire"){
        header('Location: http://localhost/techstore/gentelella-master/production/createQuestionnaire.php');
      }
    }
   }

?>
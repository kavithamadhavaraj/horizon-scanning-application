<?php
   session_start();
   require_once('config.php');
    // Create our Application instance (replace this with your appId and secret).
    $facebook = new \Facebook\Facebook(array(
    'app_id'  => 'YOUR APP ID',
    'app_secret' => 'YOUR APP SECRET',
    'default_graph_version' => 'v2.10',
    'cookie' => true
   ));

    $helper = $facebook->getRedirectLoginHelper();
    try {
      $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    if (isset($accessToken)) {
      $_SESSION['access_token'] = (string) $accessToken;
      $graph_url_pages = "https://graph.facebook.com/me/accounts?access_token=".$_SESSION['access_token'];
      $pages = json_decode(file_get_contents($graph_url_pages)); // get all pages information from above url.
      $_SESSION['page_token'] = $pages->data[0]->access_token;
      $_SESSION['page_id'] = $pages->data[0]->id;
      if(isset($_SESSION['currentPage'])){
        if($_SESSION['currentPage'] == "postFB"){
          header('Location: '.SERVER_URL.'postFB.php');
        }
        elseif($_SESSION['currentPage'] == "createQuestionnaire"){
          header('Location: '.SERVER_URL.'createQuestionnaire.php');
        }
      }
    } elseif ($helper->getError()) {
      // The user denied the request
      exit;
    }
?>
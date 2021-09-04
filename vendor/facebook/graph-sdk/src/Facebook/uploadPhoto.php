<?php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
    'app_id' => 'app_id',
    'app_secret' => '780f9ff7b24ad190e08c82018a7f54a3',
    'default_graph_version' => 'v11.0',
    'default_access_token' => 'EAArDjWsHm5UBAEokbvdzWeolQDHwtjJcf1YbwuDreb9Couy4hzVODXdEQxN54DB5LCFmhiRk72kZAX2U3n9OPpfJlEFZBmCvTH8MeQQUZBEZCJov50ZB8ryKZCQfa0Dm0ix43QOcvk4utnGDOxSTTe2fTYZBcBlIPtgZBaNnvHZAm9ZBgJSiozElVeKcR1UTq3yPlTpFeqxi4uF3qwyVhp7mpI3s7Gzirk0mgZD', // optional
  ]);
  
  // Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
  //   $helper = $fb->getRedirectLoginHelper();
  //   $helper = $fb->getJavaScriptHelper();
  //   $helper = $fb->getCanvasHelper();
  //   $helper = $fb->getPageTabHelper();
  
  try {
    // Get the \Facebook\GraphNodes\GraphUser object for the current user.
    // If you provided a 'default_access_token', the '{access-token}' is optional.
    $response = $fb->get('/me', 'EAArDjWsHm5UBAEokbvdzWeolQDHwtjJcf1YbwuDreb9Couy4hzVODXdEQxN54DB5LCFmhiRk72kZAX2U3n9OPpfJlEFZBmCvTH8MeQQUZBEZCJov50ZB8ryKZCQfa0Dm0ix43QOcvk4utnGDOxSTTe2fTYZBcBlIPtgZBaNnvHZAm9ZBgJSiozElVeKcR1UTq3yPlTpFeqxi4uF3qwyVhp7mpI3s7Gzirk0mgZD');
  } catch(\Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(\Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  $me = $response->getGraphUser();
  echo 'Logged in as ' . $me->getName();
?>
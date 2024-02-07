<?php

require_once ('vendor/autoload.php');

class FacebookLogin{
    private $fb;

    public function __construct($appId, $appSecret){
        $this->fb = new Facebook\Facebook([
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v12.0',
        ]);
    }
 public function getLoginUrl($redirectUrl, $permissions){
     $helper = $this -> fb ->getRedirectLoginHelper();
     return $helper->getLoginUrl($redirectUrl, $permissions);
 }

 public function getUserData($accessToken){
     try {
         $response = $this->fb->get('/me?fields=id,name,email', $accessToken);
         return $response->getGraphUser();
     } catch (\Facebook\Exceptions\FacebookResponseException $e) {
         throw new Exception('Graph returned an error: ' . $e->getMessage());
     } catch (\Facebook\Exceptions\FacebookSDKException $e) {
         throw new Exception('Facebook SDK returned an error: ' . $e->getMessage());
     }
    }





}

?>
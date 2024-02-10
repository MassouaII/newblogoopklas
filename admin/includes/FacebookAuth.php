<?php

require_once 'vendor/autoload.php';
$config = require_once 'config.php';

use League\OAuth2\Client\Provider\Facebook;

class FacebookAuth{
    private $provider;

    public function __construct(){
        global $config;
        $this->provider = new Facebook([
                'clientId' => $config['clientId'],
                'clientSecret' => $config['clientSecret'],
                'redirectUri' => $config['redirectUri'],
        ]);
    }
    public function getAuthorizationUrl(){
        return $this->provider->getAuthorizationUrl([
                'scope' => ['email']
        ]);
    }
    public function getAccessToken($code){
        return $this->provider->getAccessToken('authorization_code', ['code' => $code,]);
    }
    public function getUserDetails($accessToken){
        $resourceOwner = $this->provider->getResourceOwner($accessToken);
        return $resourceOwner->toArray();
    }
}



?>
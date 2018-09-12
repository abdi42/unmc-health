<?php 

  use GuzzleHttp\Client;

  function getHealthData($endpoint,$sc,$sv,$access_token = null){
    
    if($access_token == null)
      $access_token = getenv('ACCESS_TOKEN');
    
    $url = "https://api.ihealthlabs.com:8443/openapiv2/" . $endpoint;                                                                                                      // Enter the URL to fetch the User Profile of all users
    
    $client = new Client();
    $response = $client->request('GET',$url,[
      'query' => [
        'client_id' => getenv('CLIENT_ID'),
        'client_secret' => getenv('CLIENT_SECRET'),
        'redirect_uri' => getenv('REDIRECT_URI'),
        'access_token' => $access_token,
        'sc' => $sc,
        'sv' => $sv
      ]
    ]);
    
    $body = json_decode($response->getBody());
    
    return $body;
  }
  

 ?>

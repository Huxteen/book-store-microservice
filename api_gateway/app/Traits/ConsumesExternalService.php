<?php

namespace App\Traits;

use GuzzleHttp\Client;


trait ConsumesExternalService {
  // send a request to any service
  // @return string

  public function performReguest($method, $requestUrl, $formParams=[], $headers = [])
  {
    $client = new Client([
      'base_url' => $this->baseUri,
    ]);

    $response = $client->request($method, $requestUrl, 
        ['form_params' => $formParams, 'headers' => $headers]);

    return $response->getBody()->getContents();
  }

}



?>
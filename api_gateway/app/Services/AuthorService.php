<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
  use ConsumesExternalService;

  /**
   * The base uri to consume the authors service
   * @var string
   * 
   */
  public $baseUri;
  
  
  /**
   * The secret to consume the authors service
   * @var string
   * 
   */
  public $secret;

  public function __construct()
  {
    $this->baseUri = config('services.authors.base_uri');
    $this->secret = config('services.authors.secret');
  }

  /**
   * obtain the full list of author from the author service
   * @return string
   */

   public function obtainAuthors()
   {
     return $this->performRequest('GET', '/authors');
   }

   /**
   * Create one Author using an author service
   * @return string
   */
   public function createAuthor($data)
   {
     return $this->performRequest('POST', '/author/create', $data);
   }

   /**
   * obtain the single author from the author service
   * @return string
   */

   public function obtainAuthor($id)
   {
     return $this->performRequest('GET', "/author/{$id}");
   }

   /**
   * obtain the update an instance of author from the author service
   * @return string
   */

   public function editAuthor($data, $id)
   {
     return $this->performRequest('PUT', "/author/{$id}", $data);
   }


   /**
   * remove an instance of author from the author service
   * @return string
   */

   public function deleteAuthor($id)
   {
     return $this->performRequest('DELETE', "/author/{$id}");
   }





}


?>
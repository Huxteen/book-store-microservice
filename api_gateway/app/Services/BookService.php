<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
  use ConsumesExternalService;

  /**
   * The base uri to consume the books service
   * @var string
   * 
   */
  public $baseUri;

  public function __construct()
  {
    $this->baseUri = config('services.books.base_uri');
  }



  /**
   * obtain the full list of books from the books service
   * @return string
   */

   public function obtainBooks()
   {
     return $this->performRequest('GET', '/books');
   }

   /**
   * Create one Book using an book service
   * @return string
   */
   public function createBook($data)
   {
     return $this->performRequest('POST', '/book/create', $data);
   }

   /**
   * obtain the single book from the book service
   * @return string
   */

   public function obtainBook($id)
   {
     return $this->performRequest('GET', "/book/{$id}");
   }

   /**
   * obtain the update an instance of book from the book service
   * @return string
   */

   public function editBook($data, $id)
   {
     return $this->performRequest('PUT', "/book/{$id}", $data);
   }


   /**
   * remove an instance of book from the book service
   * @return string
   */

   public function deleteBook($id)
   {
     return $this->performRequest('DELETE', "/book/{$id}");
   }



}


?>
<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Book;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;
use App\Services\AuthorService;


class BookController extends Controller
{   

    use ApiResponser;

     /**
     * The service to consume the books microservice
     * @var Bookservice
     */
    public $bookService;

     /**
     * The service to consume the books microservice
     * @var Authorservice
     */
    public $authorService;


    public function __construct(BookService $bookService, AuthorService $authorService)
    {
      $this->bookService = $bookService;
      $this->authorService = $authorService;
    }


   
    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return $this->successResponse($this->bookService->obtainBooks());
    }


    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->authorService->obtainAuthor($request->author_id);


      return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     return $this->successResponse($this->bookService->obtainBook($id));
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->authorService->obtainAuthor($request->author_id);

      return $this->successResponse($this->bookService->editBook($request->all(), $id));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     return $this->successResponse($this->bookService->deleteBook($id));
    }


}

<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;


class BookController extends Controller
{   

    use ApiResponser;

     /**
     * The service to consume the books microservice
     * @var Bookservice
     */
    public $bookService;


    public function __construct(BookService $bookService)
    {
      $this->bookService = $bookService;
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
      return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
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

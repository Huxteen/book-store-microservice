<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Image;

class BookController extends Controller
{   

    use ApiResponser;


    public function __construct()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Book::all();
      return $this->successResponse($books);
    }


    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'price' => 'required|min:1',
        'author_id' => 'required|min:1',
      ];

      $this->validate($request, $rules);

      $book = Book::create($request->all());
      
      return $this->successResponse($book, Response::HTTP_CREATED);


      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book, $id)
    {
      $book = Book::findOrFail($id);
      return $this->successResponse($book);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
  
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $rules = [
        'title' => 'max:255',
        'description' => 'max:255',
        'price' => 'min:1',
        'author_id' => 'min:1',
      ];

      $this->validate($request, $rules);

      $book = Book::findOrFail($id);
      $book->fill($request->all());

      if($book->isClean()){
        return $this->errorResponse('Sorry, new value is same with old value.',
        Response::HTTP_UNPROCESSABLE_ENTITY);
      }
      $book->save();

      return $this->successResponse($book);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request, $id)
    {
      $book = Book::findOrFail($id);
      $book->delete();

      return $this->successResponse($book);
     
    }


}

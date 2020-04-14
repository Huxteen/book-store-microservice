<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Image;

class AuthorController extends Controller
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
      $authors = Author::all();
      return $this->successResponse($authors);
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
        'name' => 'required|max:255',
        'gender' => 'required|max:255|in:male,female',
        'country' => 'required|max:255',
      ];

      $this->validate($request, $rules);

      $author = Author::create($request->all());
      
      return $this->successResponse($author, Response::HTTP_CREATED);


      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author, $id)
    {
      $author = Author::findOrFail($id);

      return $this->successResponse($author);
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
        'name' => 'max:255',
        'gender' => 'max:255|in:male,female',
        'country' => 'max:255',
      ];

      $this->validate($request, $rules);

      $author = Author::findOrFail($id);
      $author->fill($request->all());

      if($author->isClean()){
        return $this->errorResponse('Sorry, new value is same with old value.',
        Response::HTTP_UNPROCESSABLE_ENTITY);
      }
      $author->save();

      return $this->successResponse($author);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request, $id)
    {
     
    }


}

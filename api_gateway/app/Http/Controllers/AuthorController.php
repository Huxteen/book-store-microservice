<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AuthorService;

class AuthorController extends Controller
{   
    use ApiResponser;
    /**
     * The service to consume the authors microservice
     * @var AuthorService
     */
    public $authorService;


    public function __construct(AuthorService $authorService)
    {
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
      return $this->successResponse($this->authorService->obtainAuthors());
    }


    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return $this->successResponse($this->authorService->createAuthor($request->all(), Response::HTTP_CREATED));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     return $this->successResponse($this->authorService->obtainAuthor($id));
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       return $this->successResponse($this->authorService->editAuthor($request->all(), $id));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     return $this->successResponse($this->authorService->deleteAuthor($id));
    }


}

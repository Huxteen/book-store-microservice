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
      
    }


    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author, $id)
    {
     
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

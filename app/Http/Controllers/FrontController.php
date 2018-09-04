<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    public function index(){

    	return Post::all();

    }

    public function show(int $id){

    	return Post::find($id);

    }
}

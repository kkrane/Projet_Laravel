<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
	protected $paginate = 5;

	public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $posts = Post::pluck('post_type', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('posts', $posts ); // on passe les données à la vue
        });
    }

    public function index(){

    	$posts = Post::all();

    	return view('front.index', ['posts' => $posts]);

    }

    public function show(int $id){

    	return Post::find($id);

    }

     public function showPostByCategories(int $id){
        // on récupère le modèle genre.id 
        $categorie = Categorie::find($id);

        $posts = $categorie->posts()->paginate($this->paginate);

        return view('front.categorie', ['posts' => $posts, 'categorie' => $categorie]);
    }
}

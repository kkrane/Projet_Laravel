<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Maildev;
use Illuminate\Support\Facades\Mail;
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

    	$posts = Post::published()->orderBy('created_at', 'desc')->take(2)->get();

    	return view('front.index', ['posts' => $posts]);

    }

    public function show(int $id){

    	$post = Post::find($id);

        return view('front.show', ['post' => $post]);

    }

     public function showPostByFormation(){
        // Method pour afficher les posts de type formation 
        $posts = Post::published()->where('post_type', '=', 'formation')->paginate($this->paginate);

        return view('front.formation', ['posts' => $posts]);
    }

     public function showPostByStage(){
        // Method pour afficher les posts de type stage
        $posts = Post::published()->where('post_type', '=', 'stage')->paginate($this->paginate);

        return view('front.stage', ['posts' => $posts]);
     }

     public function contact(){

        return view('front.contact');

     }

     // Envoie de mail via la page contact avec Maildev
     public function maildev(Request $request){
        //Envoie du formulaire de contact (mailDev)
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
        
        Mail::to('admin@contact.fr')->send(new MailDev($request));
        return redirect()->route('maildev')->with('message', __('Votre email a bien été envoyé !'));

     }

     public function search(Request $request){

        $query = $request->search;
        $posts = Post::published()->where('titre', 'like', '%' . $query . '%')
                                  ->paginate($this->paginate);

        return view('front.index', compact('posts', 'query'));

     }

}


<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categorie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $paginate = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate($this->paginate);

        return view('back.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::pluck('name', 'id')->all();
        //$posts = Post::pluck('name', 'id')->all();

        return view('back.post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'titre' => 'required',
            'description' => 'required|string',
            'category_id' => 'integer',
            'price' => 'integer', // pour vérifier un tableau d'entiers il faut mettre authors.*
            'nb_max_personne' => 'integer',
            'start_dt' => 'date',
            'end_dt' => 'date| after:start_dt',
            'status' => 'in:published,unpublished'
        ]);

        $post = Post::create($request->all());
        // image
        $im = $request->file('picture');

        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $post->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? $request->title
            ]);
        }
        //dd($request);

        return redirect()->route('post.index')->with('message', 'Le post a bien été crée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); 

        return view('back.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Categorie::all();

        return view('back.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->update($request->all());

        $new_image = $request->file('picture');
        $old_image = $post->picture->link;
        
        // si on associe une image à un post
        if ($new_image !== null) {
            Storage::disk('local')->delete($old_image); // supprimer physiquement l'image

            $link = $request->file('picture')->store('/');
            // suppression de l'image si elle existe 
            if($post->picture()->exists()){
                $post->picture()->update([
                    'link' => $link,
                    'title' => $request->title_image?? $request->title
                ]);
            }else{
                $post->picture()->create([
                    'link' => $link,
                    'title' => $request->title_image?? $request->title
                ]);
            }
        }
        return redirect()->route('post.index')->with('message', 'La mise à jour a réussi !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('post.index')->with('message', 'La suppression a bien été effectué !');
    }


    // function pour effectuer une recherche
    public function search(){

    }
}

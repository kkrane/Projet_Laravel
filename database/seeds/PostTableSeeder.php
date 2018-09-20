<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//Création des catégories

    	App\Categorie::create([
    		'name' => 'Développeur Full stack'
    	]);

    	App\Categorie::create([
    		'name' => 'Développeur Front end'
    	]);

    	App\Categorie::create([
    		'name' => 'Développeur Back end'
    	]);

    	

    	Storage::disk('local')->delete(Storage::allFiles());

        factory(App\Post::class, 15)->create()->each(function($post){
        	//associations de catégorie à un post que nous venons de créer.
 			$categorie = App\Categorie::find(rand(1,4));

 			$post->category()->associate($categorie);

 			$post->save();


    		$link = str_random(12) . '.jpg';
    		$file = file_get_contents('https://dummyimage.com/250x250/' . rand(1,9));


    		Storage::disk('local')->put($link, $file);

 			$post->picture()->create([
    		'title' => 'Default',
    		'link' => $link
    		]);

 			//pour chaque $post on lui associe une catégorie en particulier.
 			$post->category()->associate($categorie);
        	$post->save(); //il faut garder l'association pour faire persister en base de données.
        });
    }
}

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

    	App\Categorie::create({

    		'name' => ''

    	});

        factory(App\Post::class, 15)->create();
    }
}

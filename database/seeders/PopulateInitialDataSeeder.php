<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
#use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;
use DB;

class PopulateInitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          # $this->faker->randomElement(Category::all())['id'])

       // $user = User::factory()->create();    
            //OR
            $user = new \stdClass();

            $user->id = fake()->randomElement(Category::all())['id'];
     
             $articl = Article::factory()
             ->count(1)        
             ->create(
                 [
                     "added_by"=>$user->id,
                     "updated_by"=>$user->id,
                 ]
              );
             
     
              $cate = Category::factory()->count(2)
              ->create(
                 [
                     "added_by"=>$user->id,
                     "updated_by"=>$user->id,
                 ]
              );
     
             DB::table("article_category")->insert(
                 [
                "category"	=> fake()->randomElement(Category::all())['id'],
                "article"   => fake()->randomElement(Article::all())['id'],
                 ],
                 [
                     "category"	=> fake()->randomElement(Category::all())['id'],
                     "article"   => fake()->randomElement(Article::all())['id'],
                 ]
             );
     
    }
}

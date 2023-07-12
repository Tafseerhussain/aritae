<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;
use App\Models\BlogArticle;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_json = file_get_contents(public_path()."/assets/data/blogs.json");
        $blogs = json_decode($blog_json, true);

        foreach($blogs as $blog){
            BlogArticle::updateOrCreate([
                'id' => $blog['id'],
            ],[
                'img' => $blog['img'],
                'blog_category_id' => 1,
                'title' => $blog['title'],
                'subtitle' => $blog['subTitle'],
                'introduction' => $blog['introduction'],
                'more_imgs' => json_encode($blog['moreImgs']),
                'quote' => $blog['quote'],
                'quote_by' => $blog['quoteBy'],
                'long_text' => $blog['longText'],
                'foot_note' => $blog['footNote'],
            ]);
        }

        $category_json = file_get_contents(public_path()."/assets/data/blog-categories.json");
        $categories = json_decode($category_json, true);

        foreach($categories as $category){
            BlogCategory::updateOrCreate([
                'id' => $category['id'],
            ],[
                'name' => $category['name'],
                'slug' => $category['slug'],
            ]);
        }
    }
}

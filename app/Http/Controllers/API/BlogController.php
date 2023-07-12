<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogArticle;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function getBlogs(){
        $blogs = BlogArticle::all();

        $blog_array = [];
        foreach($blogs as $blog){
            array_push($blog_array, [
                'id' => $blog->id,
                'title' => $blog->title,
                'img' => $blog->img,
                'introduction' => $blog->introduction,
                'created_at' => $blog->created_at,
            ]);
        }

        return response()->json([
            "status" => "success",
            "blogs" => $blog_array,
        ]);
    }

    public function getCategoryBlogs($id){
        $blogs = BlogArticle::where('blog_category_id', $id)->get();

        $blog_array = [];
        foreach($blogs as $blog){
            array_push($blog_array, [
                'id' => $blog->id,
                'title' => $blog->title,
                'img' => $blog->img,
                'introduction' => $blog->introduction,
                'created_at' => $blog->created_at,
            ]);
        }

        return response()->json([
            "status" => "success",
            "blogs" => $blog_array,
        ]);
    }

    public function getCategories(){
        $categories = BlogCategory::all();

        $category_array = [];
        foreach($categories as $category){
            array_push($category_array, [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
            ]);
        }

        return response()->json([
            "status" => "success",
            "categories" => $category_array,
        ]);
    }

    public function getLatestPosts(){
        $posts = BlogArticle::orderBy('created_at', 'DESC')->limit(5)->get();

        $post_array = [];
        foreach($posts as $post){
            array_push($post_array, [
                'id' => $post->id,
                'title' => $post->title,
                'img' => $post->img,
                'created_at' => $post->created_at,
            ]);
        }

        return response()->json([
            "status" => "success",
            "latest_posts" => $post_array,
        ]);
    }

    public function getBlog($id){
        $blog_data = BlogArticle::find($id);
        
        $blog = [];
        if($blog_data){
            $blog['id'] = $blog_data->id;
            $blog['img'] = $blog_data->img;
            $blog['category'] = $blog_data->blog_category->name;
            $blog['title'] = $blog_data->title;
            $blog['subTitle'] = $blog_data->subtitle;
            $blog['introduction'] = $blog_data->introduction;
            $blog['moreImgs'] = json_decode($blog_data->more_imgs, true);
            $blog['quote'] = $blog_data->quote;
            $blog['quoteBy'] = $blog_data->quote_by;
            $blog['longText'] = $blog_data->long_text;
            $blog['footNote'] = $blog_data->foot_note;
            $blog['createdAt'] = $blog_data->created_at;

            return response()->json([
                "status" => "success",
                "blog" => $blog,
            ]);
        }

        return response()->json([
            "status" => "error",
            "message" => "Requested blog doesn't exist!",
        ]);
    }

    public function getRelatedBlogs($id){
        $blog = BlogArticle::find($id);

        if($blog){
            $blogs = BlogArticle::where('blog_category_id', $blog->blog_category_id)->limit(4)->get();
            
            $related_blogs = [];
            foreach($blogs as $blog){
                array_push($related_blogs, [
                    'id' => $blog->id,
                    'img' => $blog->img,
                    'title' => $blog->title,
                    'createdAt' => $blog->created_at,
                ]);
            }

            return response()->json([
                "status" => "success",
                "related_blogs" => $related_blogs,
            ]);
        }
        else{
            return response()->json([
                "status" => "error",
                "message" => "Blog post doesn't exists!",
            ]);
        }
    }
}

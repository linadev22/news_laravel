<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrondController extends Controller
{
    public function index()
    {


        $subcategory = SubCategory::all();
        $category = Category::all();
        $post = Post::latest()->first();
        $subpost = Post::inRandomOrder()->take(4)->get();
        $trending = Post::latest()->OrderBy('status', 'DESC')->get();
        $news = Post::all();
        $popular = Post::take(5)->get();
        $secondnews = Post::orderBy('id', 'DESC')->get();
        $lastpost = Post::take(9)->get();
        $mostViewed = Post::orderBy('status', 'DESC')->take(3)->get();

        return view('Frondend.index', compact('mostViewed', 'subcategory', 'category', 'lastpost', 'post', 'subpost', 'trending', 'news', 'popular', 'secondnews'));
    }
    public function Category($id)
    {
        $mostViewed = Post::orderBy('status', 'DESC')->take(3)->get();
        $lastpost = Post::take(9)->get();
        $category = Category::all();
        $post = Post::where('category_id', $id)->latest()->get();
        $popular = Post::take(5)->get();
        $trending = Post::inRandomOrder()->take(8)->get();

        return view('Frondend.category', compact('mostViewed', 'lastpost', 'category', 'post', 'popular', 'trending'));
    }
    public function SubCategory($id)
    {
        $mostViewed = Post::orderBy('status', 'DESC')->take(3)->get();
        $lastpost = Post::take(9)->get();
        $category = Category::all();
        $post = Post::where('sub_category_id', $id)->latest()->get();
        $popular = Post::take(5)->get();
        $trending = Post::latest()->OrderBy('status', 'DESC')->get();

        return view('Frondend.category', compact('mostViewed', 'lastpost', 'category', 'post', 'popular', 'trending'));
    }

    public function Detail($id)
    {

        $mostViewed = Post::orderBy('status', 'DESC')->take(3)->get();
        $lastpost = Post::take(9)->get();
        $subcategory = SubCategory::all();
        $category = Category::all();
        $post = Post::FindOrFail($id);
        $popular = Post::take(5)->get();
        $trending = Post::latest()->OrderBy('status', 'DESC')->get();

        return view('Frondend.detail', compact('mostViewed', 'lastpost', 'category', 'post', 'popular', 'trending'));
    }
}

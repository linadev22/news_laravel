<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.category.index');
    }

    public function search(Request $request)
    {
        $post = Post::where('title_kh', 'LIKE', "%{$request->search}%")
            ->orWhere('title_en', 'LIKE', "%{$request->search}%")
            ->orWhere('detail_en', 'LIKE', "%{$request->search}%")
            ->orWhere('detail_kh', 'LIKE', "%{$request->search}%")->get();

        $mostViewed = Post::orderBy('status', 'DESC')->take(3)->get();
        $lastpost = Post::take(9)->get();
        $category = Category::all();
        $popular = Post::take(5)->get();
        $trending = Post::latest()->OrderBy('status', 'DESC')->get();
        return view('Frondend.category', compact('lastpost', 'mostViewed', 'category', 'popular', 'post', 'trending'));
    }
}

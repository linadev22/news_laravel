<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function list()
    {
        $post = Post::latest()->paginate(6);
        return view('admin.post.list', compact('post'));
    }
    public function InsertForm()
    {
        $post = Post::all();
        $main_categories = Category::all();
        return view('admin.post.insert_form', compact('main_categories', 'post'));
    }
    public function Edit($id)
    {

        $post = Post::findOrFail($id);
        $main_categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.post.edit_form', compact('main_categories', 'sub_categories', 'post'));
    }
    //the method for ajax get subcategory data
    public function getSubcategory(Request $request, $id)
    {
        $subcategory = SubCategory::where('category_id', $id)->get();
        $option = '<option disabled selected>Loading 2... </option>';
        foreach ($subcategory as $key => $value) {
            $option .= '<option value="' . $value->id . '"> ' . $value->name_kh . '</option>';
        }
        return $option;
    }
    public function Store(Request $request)
    {
        $image = $request->image;
        if ($image) {
            //generate name
            $image_name = date('YmdHsi') . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $image_path = 'images/' . $image_name;

            Post::insert([
                'image' => $image_path,
                'title_kh' => $request->tittle_kh,
                'title_en' => $request->tittle_en,
                'detail_kh' => $request->detail_kh,
                'detail_en' => $request->detail_en,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Post::insert([
                // 'image' => $image_path,
                'title_kh' => $request->tittle_kh,
                'title_en' => $request->tittle_en,
                'detail_kh' => $request->detail_kh,
                'detail_en' => $request->detail_en,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('post.list');
    }
    public function update(Request $request, $id)
    {
        $image = $request->image;
        if ($image) {
            //generate name
            $image_name = date('YmdHsi') . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $image_path = 'images/' . $image_name;

            Post::findOrFail($id)->update([
                'image' => $image_path,
                'title_kh' => $request->tittle_kh,
                'title_en' => $request->tittle_en,
                'detail_kh' => $request->detail_kh,
                'detail_en' => $request->detail_en,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Post::findOrFail($id)->update([
                // 'image' => $image_path,
                'title_kh' => $request->tittle_kh,
                'title_en' => $request->tittle_en,
                'detail_kh' => $request->detail_kh,
                'detail_en' => $request->detail_en,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('post.list');
    }
    public function Delete($id)
    {
        Post::findOrFail($id)->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function List()
    {
        $category = Category::latest()->paginate(5);
        return view('admin.category.list', compact('category'));
    }
    public function Store(Request $request)
    {
        $request->validate([
            'name_kh' => 'required|unique:categories|max:225',
            'name_en' => 'required|unique:categories|max:225',
        ]);
        Category::insert([
            'name_kh' => $request->name_kh,
            'name_en' => $request->name_en,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_kh' => ['required', Rule::unique('categories')->ignore($id)],
            'name_en' => ['required', Rule::unique('categories')->ignore($id)],
        ]);


        Category::findOrFail($id)->update([
            'name_kh' => $request->name_kh,
            'name_en' => $request->name_en,
            'user_id' => Auth::id(),
            'updated_at' => now(),
        ]);

        return redirect()->back();
    }
    public function Delete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
}

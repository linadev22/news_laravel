<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    public function List()
    {
        $subcategories = SubCategory::latest()->paginate(5);
        $main_subcategories = Category::all();
        return view('admin.subcategory.list', compact('subcategories', 'main_subcategories'));
    }
    public function Store(Request $request)
    {
        $request->validate([
            'name_kh' => 'required|unique:sub_categories|max:225',
            'name_en' => 'required|unique:sub_categories|max:225',
        ]);
        SubCategory::insert([
            'category_id' => $request->category_id,
            'name_kh' => $request->name_kh,
            'name_en' => $request->name_en,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_kh' => ['required', Rule::unique('sub_categories')->ignore($id)],
            'name_en' => ['required', Rule::unique('sub_categories')->ignore($id)],
        ]);

        $subcategories = SubCategory::findOrFail($id);

        $subcategories->update([
            'category_id' => $request->category_id,
            'name_kh' => $request->name_kh,
            'name_en' => $request->name_en,
            'user_id' => Auth::id(),
            'updated_at' => now(),
        ]);

        return redirect()->back();
    }
    public function Delete($id)
    {
        SubCategory::findOrFail($id)->delete();
        return back();
    }
}

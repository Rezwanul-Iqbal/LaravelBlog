<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;


class categoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function newCategory(Request $request){

        Category::saveCategoryInfo($request);
        return redirect('/category/add-category')->with('message','Category info save successfully');
    }

    public function manageCategory(){
        return view('admin.category.manage-category',[
            'categories' => Category::all()
        ]);
    }

    public function editCategory($id){   
        return view('admin.category.edit-category',[
            'category' => Category::find($id)
        ]);
    }

    public function updateCategory(Request $request){
        Category::UpdateCategoryInfo($request);
        return redirect('/category/manage-category')->with('message','Category info update successfully');
    }

    public function deleteCategory(Request $request){

        $blog = Blog::where('category_id', $request->id)->first();
        if($blog){
            return redirect('/category/manage-category')->with('message','Sorry this category is exist on blog');

        } else {
            $category = Category::find($request->id);
            $category->delete();
            return redirect('/category/manage-category')->with('message','Category info delete successfully');
        }
    }
}

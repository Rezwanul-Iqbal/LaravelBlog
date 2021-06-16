<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['category_name', 'category_description', 'publication_status'];

    public static function saveCategoryInfo($request){
    //Query Builer process for save data ------------------
        // DB::table('categories')->insert([
        //     'category_name'         => $request->category_name,
        //     'category_description'  => $request->category_description,
        //     'publication_status'    => $request->publication_status
            
        // ]);

    // //Eloquent ORM process--1 for save data----------------
        // $category = new Category();
        // $category->category_name           =$request->category_name;
        // $category->category_description    =$request->category_description;
        // $category->publication_status      =$request->publication_status;
        // $category->save();

        //Eloquent ORM process--2 for save data----------------
        Category::create($request->all());
    }

    public static function UpdateCategoryInfo($request){
        $category = Category::find($request->id);
        $category->category_name         =$request->category_name;
        $category->category_description  =$request->category_description;
        $category->publication_status    =$request->publication_status;
        $category->save();
    }
}

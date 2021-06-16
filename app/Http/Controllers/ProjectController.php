<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $result = json_decode(Slider::get());
        return view('front.home.home', [
           'sliders'    =>$result,
           'blogs'      => Blog::where('publication_status', 1)->orderBy('id', 'desc')->get(),
           'categories' => Category::where('publication_status', 1)->get()
        ]);
    }

    public function categoryBlog($id){
        return view('front.category.category-blog',[
            'categories' => Category::where('publication_status', 1)->get(),
            'blogs'      => Blog::where('category_id', $id)->where('publication_status', 1)->get()
        ]);
    }

    public function blogDetails($id){
        return view('front.blog.blog-details',[
            'categories' => Category::where('publication_status', 1)->get(),
            'blog'       =>Blog::find($id)
        ]);
        
    }
}

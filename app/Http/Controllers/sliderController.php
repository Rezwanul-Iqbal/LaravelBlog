<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sliderController extends Controller
{
    public function addSlider (){
        return view('admin.slider.add-slider');
    }

    public function newSlider(Request $request){
        $image     = $request->file('slider_image');
        $imageName = $image->getClientOriginalName();
        $directory = 'slider-images/';
        $image->move($directory, $imageName);

        $slider = new Slider();
        $slider->slider_image                   =$directory.$imageName;
        $slider->slider_caption_heading         =$request->slider_caption_heading;
        $slider->slider_caption_paragraph       =$request->slider_caption_paragraph;
        $slider->save();

        return redirect('/slider/add-slider')->with('message','Slider info created successfully');
  
    }

    public function manageSlider(){
        $sliders = DB::table('sliders')

                    ->select('sliders.*', 'sliders.slider_caption_heading')
                    ->orderBy('sliders.id', 'desc')
                    ->get();

        return view('admin.slider.manage-slider',[
            'sliders' => $sliders
        ]);
    }

    public function editSlider($id){
        return view('admin.slider.edit-slider',[
            'slider'      => Slider::find($id)
        ]);
    }

    public function updateSlider(Request $request){
        $sliderImage = $request->file('slider_image');
        if($sliderImage){
            $slider = Slider::find($request->id);
            unlink($slider->slider_image);
            
            $imageName = $sliderImage->getClientOriginalName();
            $directory = 'slider-images/';
            $sliderImage->move($directory, $imageName);

            $slider->slider_image                  = $directory.$imageName;
            $slider->slider_caption_heading        = $request->slider_caption_heading;
            $slider->slider_caption_paragraph      = $request->slider_caption_paragraph;

            $slider->save();

            return redirect('/slider/manage-slider')->with('message','slider info update successfully');

        } else {

            $slider = Slider::find($request->id);

            $slider->slider_caption_heading        = $request->slider_caption_heading;
            $slider->slider_caption_paragraph      = $request->slider_caption_paragraph;

            $slider->save();

            return redirect('/slider/manage-slider')->with('message','slider info update successfully');

        }
    }

    public function deleteSlider(Request $request){
        $slider = Slider::find($request->id);
        unlink($slider->slider_image);
        $slider->delete();

        return redirect('/slider/manage-slider')->with('message','Slider info delete successfully');
    }
}

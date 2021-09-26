@extends('admin.master')

@section('title')
    Add Slider
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="shadow p-3 mb-5 bg-body rounded">
        <h1 class="text-success text-center">{{ Session::get('message') }}</h1>

            <form action="{{route('new-slider')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-md-3">Slider Image</label>
                <div class="col-md-9">
                    <input type="file" name="slider_image" accept="image/*"/>
                    <span class="text-danger"> {{$errors->has('slider_image') ? $errors->first('slider_image') : ''}}</span>

                </div>
            </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Slider Caption Heading</label>
                    <div class="col-md-9">
                        <input type="text" name="slider_caption_heading" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('slider_caption_heading') ? $errors->first('slider_caption_heading') : ''}}</span>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Slider Caption Paragraph</label>
                    <div class="col-md-9">
                        <input type="text" name="slider_caption_paragraph" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('slider_caption_paragraph') ? $errors->first('slider_caption_paragraph') : ''}}</span>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-9 col-md-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Slider Info"/>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@extends('admin.master')

@section('title')
    Edit Slider
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="shadow p-3 mb-5 bg-body rounded">
        <h1 class="text-success text-center">{{ Session::get('message') }}</h1>

            <form action="{{route('update-slider')}}" method="post" class="form-horizontal" enctype="multipart/form-data" name="editSliderForm">
            @csrf
            <div class="form-group">
                <label class="control-label col-md-3">Slider Image</label>
                <div class="col-md-9">
                    <input type="file" name="slider_image" accept="image/*"/>
                    <br/>
                    <img src="{{asset($slider->slider_image)}}" alt="" height="100" width="120"/>
                </div>
            </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Slider Caption Heading</label>
                    <div class="col-md-9">
                        <input type="text" name="slider_caption_heading" value="{{$slider->slider_caption_heading}}" class="form-control"/>
                        <input type="hidden" name="id" value="{{$slider->id}}"  class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Slider Caption Paragraph</label>
                    <div class="col-md-9">
                        <input type="text" name="slider_caption_paragraph" value="{{$slider->slider_caption_paragraph}}" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-9 col-md-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Slider Info"/>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    document.forms['editSliderForm'].elements['slider_id'].value = '{{$slider->slider_id}}';
</script>
@endsection

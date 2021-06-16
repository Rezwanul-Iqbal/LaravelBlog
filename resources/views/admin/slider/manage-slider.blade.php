@extends('admin.master')

@section('title')
    Manage Slider
@endsection

@section('body')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Slider List</h6>
                <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped  table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Slider Image</th>
                                <th>Slider Caption Heading</th>
                                <th>Slider Caption Paragraph</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL NO</th>
                                <th>Slider Image</th>
                                <th>Slider Caption Heading</th>
                                <th>Slider Caption Paragraph</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php ($i=1)
                            @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><img src="{{asset($slider->slider_image)}}" alt="" height="100" width="120"></td>
                                <td>{{$slider->slider_caption_heading}}</td>
                                <td>{{$slider->slider_caption_paragraph}}</td>
                                <td>
                                    <a href="{{ route('edit-slider',['id' => $slider->id]) }}">Edit</a>
                                    <a href="#" id="{{$slider->id}}" class="delete-slider-btn">Delete</a>
                                    <form id="deleteSliderForm{{$slider->id}}" action="{{route('delete-slider')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$slider->id}}" name="id"/>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection
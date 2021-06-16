@extends('admin.master')

@section('title')
    Manage Blog
@endsection

@section('body')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog List</h6>
                <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped  table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Blog Title</th>
                                <th>Blog Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Blog Title</th>
                                <th>Blog Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php ($i=1)
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$blog->category_name}}</td>
                                <td>{{$blog->blog_title}}</td>
                                <td><img src="{{asset($blog->blog_image)}}" alt="" height="100" width="120"></td>
                                <td>{{$blog->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{ route('edit-blog',['id' => $blog->id]) }}">Edit</a>
                                    <a href="#" id="{{$blog->id}}" class="delete-blog-btn">Delete</a>
                                    <form id="deleteBlogForm{{$blog->id}}" action="{{route('delete-blog')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$blog->id}}" name="id"/>
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
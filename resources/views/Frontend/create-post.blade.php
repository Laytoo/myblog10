@extends('layouts.master')
@section('content')
<div class="container">
    <div class="comment-form-wrap pt-5">
        <div class="comment-form-wrap pt-5">
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!!\Session::get('success')!!}</p>
                </div>
            @endif
            <h3 class="mb-5">Create Post</h3>
            <form action="{{route('userpost.store',)}}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="title">Title </label>
                <input type="text" placeholder="enter the title" name="title" class="form-control" id="title">
            </div>



            <div class="form-group">
                <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Categories</option>

                    @foreach ($categories as $category )
                        <option value="{{$category->title}}">{{$category->title}}</option>
                    @endforeach

                </select>
            </div>

            {{-- <div class="form-group">
                <input placeholder="user Name" type="text"  name="user_name" class="form-control" id="">
            </div>

            <div class="form-group">
                <input placeholder="user id" type="text"  name="user_id" class="form-control" id="">
            </div> --}}

            <div class="form-group">
                <label for="title">Image </label>
                <input type="file" name="image"  class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Description</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Create Post" class="btn btn-primary">
            </div>

            </form>
        </div>
    <div>
</div>

@endsection

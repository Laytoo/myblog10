@extends('layouts.master')
@section('content')

<div class="container">
    <div class="comment-form-wrap pt-5">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{!!\Session::get('success')!!}</p>
            </div>
        @endif
        <h3 class="mb-5">Update Post</h3>
        <form action="{{route('userpost.update',$editPost->id)}}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
            @csrf
            {{-- <input name="id" value="{{$editPost->id}}" type="hidden"> --}}

            {{-- <div class="form-group">
                <label>Preview image</label>
            <br>
            <img src="{{asset('assets/images/'.$editPost->image.'')}}" width="200px" alt="">
          </div> --}}

          {{-- <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
          </div> --}}



        <div class="form-group">
            <label for="title">Title </label>
            <input type="text" placeholder="enter the title" value="{{$editPost->title}}" name="title" class="form-control" id="title">
        </div>
        @error('title')
        <span class="text-danger" role="alert"><strong>{{$message}}</strong></span>
        @enderror



        <div class="form-group">
            <select name="category" class="form-select" aria-label="Default select example">
                <option selected>Categories</option>

                @foreach ($categories as $category )
                    <option value="{{$category->title}}">{{$category->title}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="message">Description</label>
            <textarea name="description" id="description"  cols="30" rows="10" class="form-control"></textarea>
        </div>
        @error('description')
        <span class="text-danger" role="alert"><strong>{{$message}}</strong></span>
        @enderror

        <div class="form-group">
            <input type="submit" value="Update Post" class="btn btn-primary">
        </div>

        </form>
  </div>
  <div>

@endsection

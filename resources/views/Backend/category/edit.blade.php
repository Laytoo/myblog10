@extends('Backend.layouts.master')
@section('content')

    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
            @csrf
            <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="{{$category->name}}" name="name" id="form2Example1" class="form-control" placeholder="name" />

                </div>
                @error('name')
                    <span class="text-danger" role="alert"><strong>{{$message}}</strong></span>
                @enderror
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
@endsection

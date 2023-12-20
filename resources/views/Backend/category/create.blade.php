@extends('Backend.layouts.master')
@section('content')

    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{!!\Session::get('success')!!}</p>
                    </div>
                @endif
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
          <form method="POST" action="{{route('category.create')}}" enctype="multipart/form-data">
            @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection

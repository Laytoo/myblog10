@extends('Backend.layouts.master')
@section('content')

    <div class="container-fluid">
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                @if(\Session::has('delete'))
                    <div class="alert alert-success">
                        <p>{!!\Session::get('delete')!!}</p>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{!!\Session::get('success')!!}</p>
                    </div>
                @endif
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="{{route('category.store')}}" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->title}}</td>
                        <td><a  href="update-category.html" class="btn btn-warning text-white text-center ">Update Categories</a></td>
                        <td><a href="{{route('category.delete',$category->id)}}" class="btn btn-danger  text-center ">Delete Categories</a></td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



  </div>
@endsection

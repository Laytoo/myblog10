@extends('layouts.master')

@section('content')

  <div class="site-cover site-cover-sm same-height overlay single-page"
     style="background-image: url('{{asset('assets/images/'.$singlePost->image.'')}}');">
    <div class="container">
      <div class="row same-height justify-content-center">
        @if(\Session::has('update'))
            <div class="alert alert-success">
                <p>{!!\Session::get('update')!!}</p>
            </div>
        @endif
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">{{substr($singlePost->title,0,15)}}</h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 me-3 d-inline-block">
                {{-- <img  src="{{asset('assets/images/'.$singlePost->image.'')}}" alt="Image" class="img-fluid"> --}}
            </figure>
              <span class="d-inline-block mt-1">{{$singlePost->user_name}}</span>
              <span>&nbsp;-&nbsp; {{$singlePost->created_at}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">

            <p>{{$singlePost->content}}</p>

          </div>


          <div class="pt-5">
            <p>Categories:  </p>
            <a href="">{{$singlePost->category}}</a>

            {{-- <a href="{{route('blog',['category'=>$category->slug])}}">{{$category->name}}</a> --}}

          </div>
          @auth
            @if (Auth::user()->id == $singlePost->user_id)
                <a class="btn btn-danger" href="{{route('userpost.delete',$singlePost->id)}}" role="button">Delete</a>
            @endif
          @endauth

          @auth
            @if (Auth::user()->id == $singlePost->user_id)
                <a style="float: right" class="btn btn-warning" href="{{route('userpost.edit',$singlePost->id)}}" role="button">Update</a>
            @endif
        @endauth

          @if (\Session::has('success'))
            <div class="alert alert-success">
                <p> {!!\Session::get('success')!!}</p>
            </div>
          @endif
          {{-- <div class="pt-5 comment-wrap">
            <h3 class="mb-5 heading">6 Comments</h3>
            <ul class="comment-list">

              <li class="comment">
                <div class="vcard">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Jean Doe</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>
            </ul>
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="#" class="p-5 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>

              </form>
            </div>
          </div> --}}

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">

          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div class="bio text-center">
              {{-- <img src="{{asset('assets/user_images/'.$user->image.'')}}" alt="Image Placeholder" class="img-fluid mb-3"> --}}
              <div class="bio-body">
                <h2>Created By {{$user->name}}</h2>
                <p class="mb-4">{{$user->description}}</p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">Read my Test  bio</a></p>
                {{-- <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p> --}}
              </div>
            </div>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
              <ul>
                @foreach ($postPop as $post)
                <li>
                    <a href="{{route('userpost.single',$post->id)}}">
                      <img src="{{asset('assets/images/'.$post->image.'')}}" alt="Image placeholder" class="me-4 rounded">
                      <div class="text">
                        <h4>{{substr($post->title,0,20)}}</h4>
                        <div class="post-meta">
                          <span class="mr-2">{{$post->created_at}}</span>
                        </div>
                      </div>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul class="categories">
                @foreach ($categories as $category )
                    <li><a href="#">{{$category->title}} <span>({{$category->totale}})</span></a></li>
                @endforeach
            </ul>
          </div>
          <!-- END sidebar-box -->


        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>


  <!-- Start posts-entry -->
  <section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12 text-uppercase text-black">More Blog Posts</div>
      </div>
      <div class="row">
        @foreach ($moreBlogs as $more )
        <div class="col-md-6 col-lg-3">
            <div class="blog-entry">
              <a href="{{route('userpost.single',$more->id)}}" class="img-link">
                <img src="{{asset('assets/images/'.$more->image.'')}}" alt="Image" class="img-fluid">
              </a>
              <span class="date">{{$more->created_at}}</span>
              <h2><a href="single.html">{{substr($more->title,0,20)}}</a></h2>
              <p>{{substr($more->content,0,20)}}</p>
              <p><a href="{{route('userpost.single',$more->id)}}" class="read-more">Continue Reading</a></p>
            </div>
          </div>
        @endforeach


      </div>
    </div>
  </section>
  <!-- End posts-entry -->

@endsection

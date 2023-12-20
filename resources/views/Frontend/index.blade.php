@extends('layouts.master')

@section('content')




<!-- Start retroy layout blog posts -->


<section class="section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout">

            @if(\Session::has('delete'))
                <div class="alert alert-success">
                    <p>{!!\Session::get('delete')!!}</p>
                </div>
            @endif

            <div class="col-md-4">
                @foreach ($postLeft as $left )
                <a href="{{route('userpost.single',$left->id)}}" class="h-entry mb-30 v-height gradient">

                    <div class="featured-img" style="background-image: url('{{asset('assets/images/'.$left->image.'')}}');"></div>
                    <div class="text">
                        <span class="date">{{$left->created_at}}</span>
                        <h2>{{$left->title}}</h2>
                    </div>
                </a>
                @endforeach
            </div>


            <div class="col-md-4">
                @foreach ($postMiddle as $middlePost )

                <a href="{{route('userpost.single',$middlePost->id)}}" class="h-entry img-5 h-100 gradient">

                    <div class="featured-img" style="background-image: url('{{asset('assets/images/'.$middlePost->image.'')}}');"></div>

                    <div class="text">
                        <span class="date">{{$middlePost->created_at}}</span>
                        <h2>{{$middlePost->title}}</h2>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="col-md-4">
                @foreach ($postRight as $rightPost )
                <a href="{{route('userpost.single',$rightPost->id)}}" class="h-entry mb-30 v-height gradient">

                    <div class="featured-img" style="background-image: url('{{asset('assets/images/'.$rightPost->image.'')}}');"></div>

                    <div class="text">
                        <span class="date">{{$rightPost->created_at}}</span>
                        <h2>{{$rightPost->title}}</h2>
                    </div>
                </a>
                @endforeach
            </div>
    </div>
</section>



<!-- End retroy layout blog posts -->

<!-- Start posts-entry -->


<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Technology</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-9">
                <div class="row g-3">
                    @foreach ($postBusinees as $postbus )
                    <div class="col-md-6">
                        <div class="blog-entry">
                            <a href="{{route('userpost.single',$postbus->id)}}" class="img-link">
                                <img src="{{asset('assets/images/'.$postbus->image.'')}}" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">{{$postbus->created_at}}</span>
                            <h2><a href="{{route('userpost.single',$postbus->id)}}">{{$postbus->title}}</a></h2>
                            <p>{{$postbus->content}}</p>
                            <p><a href="{{route('userpost.single',$postbus->id)}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    @foreach ( $postBusineesRight as $postright )
                    <li>
                        <span class="date">{{$postright->created_at}}</span>
                        <h3><a href="{{route('userpost.single',$postright->id)}}">{{$postright->title}}</a></h3>
                        <p>{{$postright->content}}</p>
                        <p><a href="{{route('userpost.single',$postright->id)}}" class="read-more">Continue Reading</a></p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>



<!-- End posts-entry -->

<!-- Start posts-entry -->


<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row">
            @foreach ( $postnormal as $postNor)
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="{{route('userpost.single',$postNor->id)}}" class="img-link">
                        <img src="{{asset('assets/images/'.$postNor->image.'')}}" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">{{$postNor->created_at}}</span>
                    <h2><a href="{{route('userpost.single',$postNor->id)}}">{{substr($postNor->title,0,30)}}</a></h2>
                    <p>{{substr($postNor->content,0,30)}}</p>
                    <p><a href="{{route('userpost.single',$postNor->id)}}" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            @endforeach

            <div class="mx-auto pb-10 w-4/5"> {{$postnormal->links()}}</div>



        </div>

    </div>

</section>


<!-- End posts-entry -->

<!-- Start posts-entry -->
{{-- <section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Culture</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-9 order-md-2">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="blog-entry">
                            <a href="single.html" class="img-link">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">Apr. 14th, 2022</span>
                            <h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-entry">
                            <a href="single.html" class="img-link">
                                <img src="images/img_2_sq.jpg" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">Apr. 14th, 2022</span>
                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    <li>
                        <span class="date">Apr. 14th, 2022</span>
                        <h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </li>

                    <li>
                        <span class="date">Apr. 14th, 2022</span>
                        <h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </li>

                    <li>
                        <span class="date">Apr. 14th, 2022</span>
                        <h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}


{{-- <section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Politics</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>

        <div class="row">

            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_7_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section> --}}



@endsection

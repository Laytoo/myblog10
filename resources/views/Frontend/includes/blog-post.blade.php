
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout">

            <div class="col-md-4">
                @foreach ($postLeft as $leftpost )
                <a href="{{route('single_post',$leftpost->id)}}" class="h-entry mb-30 v-height gradient">

                    <div class="featured-img" style="background-image: url('{{asset('assets/images/'.$post->image.'')}}');"></div>
                    <div class="text">
                        <span class="date">{{$leftpost->created_at}}</span>
                        <h2>{{$leftpost->title}}</h2>
                    </div>
                </a>
                @endforeach
            </div>


            <div class="col-md-4">
                @foreach ($postMiddle as $middlePost )

                <a href="{{route('single_post',$middlePost->id)}}" class="h-entry img-5 h-100 gradient">

                    <div class="featured-img" style="background-image: url('{{asset('assets/images/'.$onePost->image.'')}}');"></div>

                    <div class="text">
                        <span class="date">{{$middlePost->created_at}}</span>
                        <h2>{{$middlePost->title}}</h2>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="col-md-4">
                @foreach ($postRight as $rightPost )
                <a href="{{route('single_post',$rightPost->id)}}" class="h-entry mb-30 v-height gradient">

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



<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">

            <div class="mb-4">
                @if(\Session::has('success'))
                {{-- <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show"> --}}
                    <div class="alert alert-success">
                        <p>{!!\Session::get('success')!!}</p>
                    </div>
                @endif
                        <h3>Subscribe To Our Newsletter</h3>
                        @auth
                        <form action="{{ route('newsletter-subscriptions.store') }}" method="POST" class="search-form">
                            @csrf
                            <input class="form-control" name="email" type="email" placeholder="enter your email...">
                            <button style="margin-top: 10px" type="submit" class="btn btn-outline-secondary mb-1">subscribe</button>
                        </form>
                        @endauth
                </div>





                <div class="widget">
                    <h3 class="mb-4">About</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="col-lg-4 ps-lg-5">
                <div class="widget">
                    <h3 class="mb-4">Company</h3>
                    <ul class="list-unstyled float-start links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Vision</a></li>
                        <li><a href="#">Mission</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                    <ul class="list-unstyled float-start links">
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Creative</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 ps-lg-5">
                <div class="widget">
                    <h3 class="mb-4">Company</h3>
                    <ul class="list-unstyled float-start links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Vision</a></li>
                        <li><a href="#">Mission</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>

                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">


        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash;  <a href="https://laytoshopping.com">Designed MK</a>
        </p>
      </div>
    </div>
  </div>
</footer>

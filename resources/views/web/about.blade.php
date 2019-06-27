<!--==========================
  Featured Services Section
============================-->
<section id="featured-services">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 box box-bg text-center">
            <p class="description">{{ $desc->description }}</p>
      </div>

    </div>
  </div>
</section><!-- #featured-services -->

<!--==========================
  About Us Section
============================-->
<section id="about" class="container-fluid">
  <div class="container">

    <header class="section-header">
      <h3>About Us</h3>
      <p>{{  $about_us->description }}</p>
    </header>

    <div class="row about-cols">

      @foreach(\App\About::all() as $about)
      <div class="col-md-4 wow fadeInUp">
        <div class="about-col">
          <div class="img">
            <img src="img/about/{{ $about->picture }}" alt="" class="img-fluid">
            <div class="icon"><i class="{{ $about->icon }}"></i></div>
          </div>
          <h2 class="title"><a href="#">Our {{ $about->title }}</a></h2>
          <p>
              {{ $about->description }}
          </p>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- #about -->

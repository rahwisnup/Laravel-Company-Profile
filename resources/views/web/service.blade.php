
    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Services</h3>
          <p>{{ $service->description }}</p>
        </header>

        <div class="row">
            @foreach(\App\Service::all() as $service)
              <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                <div class="icon"><i class="{{ $service->icon }}"></i></div>
                <h4 class="title"><a href="">{{ $service->name }}</a></h4>
                <p class="description">{{ $service->description }}</p>
              </div>
            @endforeach
        </div>

      </div>
    </section><!-- #services -->

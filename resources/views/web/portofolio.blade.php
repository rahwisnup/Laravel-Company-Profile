
    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Portfolio</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach(\App\Product::distinct()->select('type')->get() as $type)
              <li data-filter=".filter-{{ $type->type }}">{{$type->type}}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
        @foreach(\App\Product::inRandomOrder()->get() as $prod)
          <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $prod->type  }} wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/{{ $prod->picture  }}" class="img-fluid" alt="">
                <a href="img/portfolio/{{ $prod->picture  }}" data-lightbox="portfolio" data-title="{{ $prod->name_produk  }}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">{{ $prod->name_produk }}</a></h4>
                <p>{{ $prod->type }}</p>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- #portfolio -->

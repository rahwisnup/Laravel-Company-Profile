
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        @php $no = 1 @endphp
         @foreach(\App\Intro::all() as $slide)
             <div class="carousel-item @if($no++ == 1) active @endif">
               <div class="carousel-background"><img src="img/intro-carousel/{{ $slide->picture }}" alt=""></div>
               <div class="carousel-container">
                 <div class="carousel-content">
                   <h2>{{ $slide->title }}</h2>
                   <p>{{ $slide->description }}</p>
                    <a href="#contact" class="btn-get-started scrollto">Get Started</a>
                 </div>
               </div>
             </div>
         @endforeach

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

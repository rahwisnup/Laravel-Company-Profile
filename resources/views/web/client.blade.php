<!--==========================
  Clients Section
============================-->
<section id="clients" class="wow fadeInUp">
  <div class="container">

    <header class="section-header">
      <h3>Our Clients</h3>
    </header>

    <div class="owl-carousel clients-carousel" >
     @foreach(\App\Client::all() as $cl)
        <img src="img/clients/{{ $cl->logo }}" alt="" >
     @endforeach
    </div>
  </div>
</section><!-- #clients -->

<style media="screen">
    .owl-item{
        height: 100px;
    }
</style>

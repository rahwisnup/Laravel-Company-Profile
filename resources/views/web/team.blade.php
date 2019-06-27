<!--==========================
  Team Section
============================-->
<section id="team">
  <div class="container">
    <div class="section-header wow fadeInUp">
      <h3>Team</h3>
      <p>{{ $team->description }}</p>
    </div>

    <div class="row">

    @foreach(\App\Team::all() as $team)
      <div class="col-lg-3 col-md-6 wow fadeInUp">
        <div class="member figure">
          <img src="img/team/{{ $team->picture }}" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content ">
              <h4>{{ $team->name }}</h4>
              <span>{{ $team->position }}</span>
              <!-- <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div> -->
            </div>
          </div>  
        </div>
      </div>
    @endforeach

    </div>
    <style media="screen">
    .figure {
        height:250px;
        overflow:hidden;
    }
    /* .figure > div {
        height:350px;
        display:table-cell;
        vertical-align:middle;
    } */
    .figure > img {
        display:block;
        margin:0 auto;
    }
    </style>
  </div>
</section><!-- #team -->

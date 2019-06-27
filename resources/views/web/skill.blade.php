<!--==========================
  Call To Action Section
============================-->
<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
    <h3>Call To Action</h3>
    <p>{{ $call_action->description }}</p>
    <a class="cta-btn scrollto" href="#contact" >Call To Action</a>
  </div>
</section><!-- #call-to-action -->

<!--==========================
  Skills Section
============================-->
<section id="skills">
  <div class="container">

    <header class="section-header">
      <h3>Our Skills</h3>
      <p>{{ $skill->description }}</p>
    </header>

    <div class="skills-content">

     @foreach(\App\Skill::all() as $skill )
      <div class="progress">
        <div class="progress-bar {{ $skill->color }}" role="progressbar" aria-valuenow="{{ $skill->value }}" aria-valuemin="0" aria-valuemax="100">
          <span class="skill">{{ $skill->name }} <i class="val">{{ $skill->value }}%</i></span>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section>
<!-- #Skill -->

<!--==========================
  Contact Section
============================-->
<section id="contact" class="section-bg wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h3>Contact Us</h3>
      {{-- <p>{{ $contact->description }}</p> --}}
    </div>

    <div class="row contact-info">

      <div class="col-md-4">
        <div class="contact-address">
          <i class="ion-ios-location-outline"></i>
          <h3>Address</h3>
          <address style="font-size:9pt;">{{ $web->address }}</address>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-phone">
          <i class="ion-ios-telephone-outline"></i>
          <h3>Phone Number</h3>
          <p><a href="tel:+155895548855">{{ $web->telp }}</a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="ion-ios-email-outline"></i>
          <h3>Email</h3>
          <p><a href="mailto:info@example.com">{{ $web->email }}</a></p>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="form col-md-8" >
        <img src="{{ asset('img/web/load.gif') }}" id="load" style="Display:none; width:30px; height:30px;" alt="">
      <div id="sendmessage">Your message has been sent. Thank you!</div>
      <div id="errormessage">Your message Failed! Please Reload this Website</div>
      <form id="myForm" method="post" action="" role="form" class="contactForm">
         {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
            <div class="validation"></div>
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
            <div class="validation"></div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
          <div class="validation"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" id='message' data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
          <div class="validation"></div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
    </div>
    <div class="col-md-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1643424773238!2d106.84004611409846!3d-6.242060295481669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3bf4d9ba483%3A0xd7437dddb6523c21!2sPT+Lamjaya+Global+Solusi!5e0!3m2!1sen!2sid!4v1542865080420" style="min-height:250px; width:100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>
  </div>
</section><!-- #contact -->
@push('script')
<script type="text/javascript">
$(document).ready(function(){

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  $("#myForm").on("submit",function(e){
    $("#errormessage").hide('');
    $("#sendmessage").hide('');
    e.preventDefault();
    $("#load").show("");
    $.ajax({
      type:'POST',
      url: "{{ route('message.store') }}",
      data: $("#myForm").serialize(),
      success:function(data){
        $("#load").hide("");
        if(data == ''){
          $("#sendmessage").show('');
          $( '#newsletterform' ).each(function(){
              this.reset();
          });
          console.log(data) ;
        }else{
          $("#sendmessage").show('');
          $('.contactForm').find("input, textarea").val("");
          $( '#newsletterform' ).each(function(){
              this.reset();
          });
          console.log(data) ;
        }
      }
    });
  });

});
</script>

@endpush

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link href="{{ asset('favicon.ico') }}" rel="icon">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/morris.js/morris.cs')}}s">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/animate.min.css')}}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin/template/header')
    @include('admin/template/sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin/template/content_header')
        @yield('content')
    </div>
    @include('admin/template/footer')
</div>

<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Profile</h4>
      </div>
      <form id="formProfile" method="post">
      <input type="hidden" name="id" id="id" value="{{ Auth::user()->id  }}">
      <input type="hidden" name="_method" id="_method" value="PUT">
      {{ csrf_field() }}
      <div class="modal-body">
         <div class="form-group">
             <label> Name </label>
             <input type="text" name="name" id='name' class="form-control" value="{{ Auth::user()->name  }}">
         </div>
         <div class="form-group">
             <label> Email </label>
             <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email  }}">
         </div>
         <div class="form-group">
             <label> Password </label>
             <input type="text" name="password" id="password" class="form-control" value="">
         </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Change</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- vue js  -->
<script type="text/javascript">
  const BASE_URL = '{{url("/")}}/';
</script>
<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>

<script type="text/javascript">

$(document).ready(function() {
     setInterval(get_data, 5000);
     });
     function get_data()
     {
       $.ajax({
       type: 'get',
       url: "{{ route('message.show',12) }}",
         success: function(data) {
           $('#message').html(data);
         }
       });
 }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#formProfile").on("submit",function(e){
        e.preventDefault();
        $("#load").show("");
        $.ajax({
           type:'PUT',
           url: "{{ route('profile.update', Auth::user()->id ) }}",
           data: $("#formProfile").serialize(),
           success:function(data){
             $("#load").hide("");
             if(data == ''){
                 alert('Update Failed') ;
                 $("#modal-default").modal('hide') ;
             }else{
                 alert('Update Success') ;
                 $("#modal-default").modal('hide') ;
             }
           }
        });
	});
</script>
<!-- jQuery 3 -->
<script src="{{ asset('admin_lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin_lte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('admin_lte/bower_components/raphael/raphael.min.js')}}"></script>
<!-- <script src="{{ asset('admin_lte/bower_components/morris.js/morris.min.js')}}"></script> -->
<!-- Sparkline -->
<script src="{{ asset('admin_lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('admin_lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('admin_lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin_lte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin_lte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('admin_lte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('admin_lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin_lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_lte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('admin_lte/dist/js/pages/dashboard.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_lte/dist/js/demo.js')}}"></script>
</body>

</html>

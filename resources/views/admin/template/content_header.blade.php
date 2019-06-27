<section class="content-header">
    @php
        $path =  explode('/',Request::path()) ;
    @endphp
  <h1>
     Menu
    <small>{{ $path[0] === 'admin' ? 'Home': ucwords( str_replace('_',' ',$path[0])) }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ $path[0] === 'admin' ? 'Home': ucwords( str_replace('_',' ',$path[0])) }}</a></li>
    <li class="active">Menu</li>
  </ol>
</section>

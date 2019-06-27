@extends('layouts.master_admin')
@section('content')
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="alert alert-warning animated bounceIn delay-0s">
            <h4>Welcome <strong>{{ ucwords(Auth::user()->name) }}</strong> In Our Website </h4>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6 animated rotateIn delay-0s">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ auth::user()->message() }}</h3>

              <p>Message</p>
            </div>
            <div class="icon">
              <i class="ion ion-email-unread"></i>
            </div>
            <a href="message" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 animated rotateIn delay-1s">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ auth::user()->produk() }}</h3>

              <p>Portfolio</p>
            </div>
            <div class="icon">
              <i class="ion-android-desktop "></i>
            </div>
            <a href="produk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 animated rotateIn delay-2s">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ auth::user()->team() }}</h3>

              <p>Our Team</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="team" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 animated rotateIn delay-3s">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ auth::user()->client() }}</h3>

              <p>Client</p>
            </div>
            <div class="icon">
              <i class="fa fa-handshake-o"></i>
            </div>
            <a href="client" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </section>
    <!-- /.content -->



  @endsection

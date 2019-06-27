@extends('layouts.master')
@section('title')
{{ $web->name }}
@endsection
@section('content')
@include('web/header')
@include('web/slide')
  <main id="main">
      @include('web/about')
      @include('web/service')
      @include('web/skill')
      @include('web/portofolio')
      @include('web/client')
      @include('web/team')
      @include('web/contact_us')
  </main>
@include('web/footer')
@endsection

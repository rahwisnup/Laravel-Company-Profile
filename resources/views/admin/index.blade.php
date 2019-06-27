@extends('layouts.master_admin')
@section('content')

@php
    $path =  explode('/',Request::path()) ;
@endphp

<div id="app">
@if($path[0] == 'slide')
    <slide></slide>
@elseif($path[0] == 'service')
    <service></service>
@elseif($path[0] == 'skill')
    <skill></skill>
@elseif($path[0] == 'description')
    <description></description>
@elseif($path[0] == 'message')
    <message></message>
@elseif($path[0] == 'about')
    <about></about>
@elseif($path[0] == 'client')
    <client></client>
@elseif($path[0] == 'team')
    <team></team>
@elseif($path[0] == 'produk')
    <produk></produk>
@elseif($path[0] == 'web_setting')
    <web></web>
@endif


</div>
@endsection

@extends('layouts.app')

@section('section-comtainer')
    <div id="products">

    </div>
    <div id="video-player"></div>
    <x-contact-me />
    @include('pages/partial/index')
    @include('pages/product/index')
@endsection

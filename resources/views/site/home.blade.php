@extends('layouts.app')

@section('content')

  <!-- slider section -->
  <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="{{asset('assets/front/images/slider-bg.jpg')}}" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-6 ml-auto">
        <div class="detail-box">
          <h1>
            Welcome To <br>
            Our Cafe
          </h1>
          <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem
          </p>
          <div>
            <a href="" class="slider-link">
              Book A Table
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end slider section -->

  <section class="about_section  layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{asset('assets/front/images/about-img.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolorem eum consequuntur ipsam repellat dolor soluta aliquid laborum, eius odit consectetur vel quasi in quidem, eveniet ab est corporis tempore.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

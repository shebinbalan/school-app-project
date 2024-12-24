@extends('layouts.app')
@section('content')
<main>

<section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
    "autoplay": {
      "delay": 5000
    },
    "slidesPerView": 1,
    "effect": "fade",
    "loop": true
  }'>
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <div class="overflow-hidden position-relative h-100">
        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
          <img loading="lazy" src="{{asset('assets/images/home/demo3/slideshow-character1.png')}}" width="542" height="733"
            alt="Woman Fashion 1"
            class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
          <div class="character_markup type2">
            <p
              class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">
              Dresses</p>
          </div>
        </div>
        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
          <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
            New Arrivals</h6>
          <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring</h2>
          <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
          <a href="#"
            class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
            Now</a>
        </div>
      </div>
    </div>

    <div class="swiper-slide">
      <div class="overflow-hidden position-relative h-100">
        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
          <img loading="lazy" src="{{asset('assets/images/slideshow-character1.png')}}" width="400" height="733"
            alt="Woman Fashion 1"
            class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
          <div class="character_markup">
            <p class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">Summer
            </p>
          </div>
        </div>
        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
          <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
            New Arrivals</h6>
          <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring</h2>
          <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
          <a href="#"
            class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
            Now</a>
        </div>
      </div>
    </div>

    <div class="swiper-slide">
      <div class="overflow-hidden position-relative h-100">
        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
          <img loading="lazy" src="{{asset('assets/images/slideshow-character2.png')}}" width="400" height="690"
            alt="Woman Fashion 2"
            class="slideshow-character__img animate animate_fade animate_rtl animate_delay-10 w-auto h-auto" />
        </div>
        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
          <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
            New Arrivals</h6>
          <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring</h2>
          <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
          <a href="#"
            class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
            Now</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div
      class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
    </div>
  </div>
</section>
<div class="container mw-1620 bg-white border-radius-10">
  <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
 

 <section class="category-banner container">
  <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Gallary</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="category-banner__item border-radius-10 mb-5">
          <img loading="lazy" class="h-auto" src="{{asset('assets/images/home/demo3/category_9.jpg')}}" width="690" height="665"
            alt="" />
          <div class="category-banner__item-mark">
            Starting at $19
          </div>
         
        </div>
      </div>
      <div class="col-md-6">
        <div class="category-banner__item border-radius-10 mb-5">
          <img loading="lazy" class="h-auto" src="{{asset('assets/images/home/demo3/category_10.jpg')}}" width="690" height="665"
            alt="" />
          <div class="category-banner__item-mark">
            Starting at $19
          </div>
          
        </div>
      </div>
    </div>
  </section>

  <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  <section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">School Gallary</h2>

    <div class="row">
      @foreach($galleries as $gallery)
      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
          <div class="pc__img-wrapper">
            <a href="details.html">
              <img loading="lazy" src="{{asset('uploads/gallery')}}/{{$gallery->image}}" width="330" height="400"
                alt="Cropped Faux leather Jacket" class="pc__img">
            </a>
          </div>

          <div class="pc__info position-relative">
            <h6 class="pc__title"><a href="details.html">{{$gallery->title}}</a></h6>
            <div class="product-card__price d-flex align-items-center">
             
            </div>

           
          </div>
        </div>
      </div>
      @endforeach
    </div><!-- /.row -->

    <div class="text-center mt-2">
      <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">Load More</a>
    </div>
  </section>
</div>

<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

</main>
@endsection
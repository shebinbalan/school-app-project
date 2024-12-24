@extends('layouts.app')
@section('content')

<section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Gallary</h2>

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
    


  </main>


@endsection

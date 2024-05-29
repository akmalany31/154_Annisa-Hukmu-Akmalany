@extends('themes.artshop.layouts.app')
@include('themes.artshop.shared.slider')
@section('content')
<!-- Buy Product -->
<section class="popular">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6">
          <h1>Product</h1>
        </div>
        <div class="col-6 text-end">
          <a href="/products" class="btn-first">View All</a>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-3 col-6">
          <div class="card card-product card-body p-lg-4 p3">
            <img src="{{ asset('themes/artshop/assets//img/shop_01.jpg') }}" alt="" class="img-fluid"></a>
            <h3 class="product-name mt-3">BRUSH</h3>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="card card-product card-body p-lg-4 p3">
            <img src="{{ asset('themes/artshop/assets//img/shop_02.jpg') }}" alt="" class="img-fluid"></a>
            <h3 class="product-name mt-3">PEN</h3>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6 mt-3 mt-lg-0">
          <div class="card card-product card-body p-lg-4 p3">
            <img src="{{ asset('themes/artshop/assets//img/shop_03.jpg') }}" alt="" class="img-fluid"></a>
            <h3 class="product-name mt-3">ACRYLIC</h3>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6 mt-3 mt-lg-0">
          <div class="card card-product card-body p-lg-4 p3">
            <img src="{{ asset('themes/artshop/assets//img/shop_04.jpg') }}" alt="" class="img-fluid"></a>
            <h3 class="product-name mt-3">WATERCOLOUR PAPER</h3>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@extends('layouts.frontend.frontend')
@section('title', 'Sumburero')
@section('content')

    <main class="main-content">
        <!--== Start Hero Area Wrapper ==-->
        <section class="home-slider-area slider-default">
            <div class="home-slider-content">
                <!-- Start Slide Item -->
                <div class="home-slider-item">
                    <div class="slider-content-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-7">
                                    <div class="content" data-aos="fade-right" data-aos-duration="1000">
                                        <div class="subtitle-content">
                                            <h2> {{ $website->name }}</h2>
                                        </div>
                                        <div class="tittle-wrp">
                                            <h4> {!! $website->resume !!}</h4>
                                        </div>
                                        <div class="btn-wrp">
                                            <a href="causes.html" class="btn-theme btn-gradient btn-slide btn-style">All
                                                Causes <img class="icon icon-img"
                                                    src="{{ asset('frontend/assets/img/icons/arrow-line-right2.png') }}"
                                                    alt="Icon"></a>
                                            <a href="#/" class="btn-theme btn-border btn-black btn-style">Donate Now <img
                                                    class="icon icon-img"
                                                    src="{{ asset('frontend/assets/img/icons/arrow-right-line-dark.png') }}"
                                                    alt="Icon"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 offset-md-1 col-lg-5 offset-lg-1 col-xl-5 offset-xl-0">
                                    <div class="layer-style">
                                        <div class="thumb scene">
                                            <span class="scene-layer" data-depth="0.20">
                                                <img class=""
                                                    src="{{ asset('storage' . '/' . $website->images->first()->url) }}"
                                                    alt="Image-Givest">
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-shape">
                            <div class="shape-style1">
                                <img class="shape-img1" src="{{ asset('frontend/assets/img/shape/map1.png') }}"
                                    alt="Image-Givest">
                            </div>
                            <div class="shape-style2">
                                <img class="shape-img2" src="{{ asset('frontend/assets/img/shape/map2.png') }}"
                                    alt="Image-Givest">
                            </div>
                            <div class="shape-style3">
                                <img class="shape-img3" src="{{ asset('frontend/assets/img/shape/banner-line1.png') }}"
                                    alt="Image-Givest">
                            </div>
                            <div class="shape-style4">
                                <img class="shape-img3" src="{{ asset('frontend/assets/img/shape/banner-line2.png') }}"
                                    alt="Image-Givest">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slide Item -->
            </div>
        </section>
        <!--== End Hero Area Wrapper ==-->

        <!--== Start About Area ==-->
        <section class="about-area about-default-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="section-title position-relative z-index-1" data-aos="fade-up" data-aos-duration="1000">
                            <h5 class="subtitle line-theme-color">About Us.</h5>
                            <h2 class="title"><span>Givest</span> is The Non Profitable Organization.</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-7">
                        <div class="layer-style" data-aos="fade-up" data-aos-duration="1100">
                            <div class="thumb">
                                <div class="row m-0">
                                    <div
                                        class="col-sm-4 col-md-4 col-lg-4 col-xl-4 p-0 d-none d-sm-block d-lg-none d-xl-block tilt-animation">
                                        <img src="assets/img/about/1.jpg" alt="Image-Givest">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-12 col-xl-8 p-0 tilt-animation">
                                        <img class="img-two" src="assets/img/about/2.jpg" alt="Image-Givest">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5">
                        <div class="about-content" data-aos="fade-up" data-aos-duration="1100">
                            <p class="text-style">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry has been the industry standard.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry orem Ipsum has been
                                the industry's standard dummy text ever since the 1500s, when an unknown.</p>
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry orem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an unknown.</p>
                            <ul class="list-icon-style">
                                <li><img class="icon-img" src="assets/img/icons/check-double-line.png"
                                        alt="Image-Givest"> Need your simple help <br>for save children.</li>
                                <li class="line-center"></li>
                                <li><img class="icon-img" src="assets/img/icons/check-double-line.png"
                                        alt="Image-Givest"> Need your simple help <br>for save children.</li>
                            </ul>
                            <a href="#/" class="btn-theme btn-gradient btn-slide">Donate Now <img class="icon icon-img"
                                    src="assets/img/icons/arrow-line-right2.png" alt="Icon"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End About Area ==-->
        <!--== Start Blog Area Wrapper ==-->

        <section class="blog-area blog-default-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h5 class="subtitle line-theme-color">Notícias</h5>
                            <h2 class="title title-style">Actividades realizadas recentemente  <img class="img-shape"
                                    src="{{ asset('frontend/assets/img/shape/3.png') }}" alt="Image-Givest"></h2>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    
                    @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <!--== Start Blog Post Item ==-->
                        <div class="post-item mb-md-150">
                          <div class="thumb">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/2.jpg') }}" alt="Givest-Blog"></a>
                            <div class="meta-date">
                              <a href="blog.html"><span>{{$post->created_at->day}}</span>{{$post->created_at->month}}</a>
                            </div>
                            <div class="shape-line"></div>
                          </div>
                          <div class="content">
                            <div class="inner-content">
                              <div class="meta">
                                <a class="post-category" href="{{ route('category.posts',$post->category->slug ) }}">{{$post->category->title}}</a>
                                <div class="post-share">
                                  <a class="icon-share" href="blog.html"><img src="{{ asset('frontend/assets/img/icons/share-line-gradient.png') }}" alt="Icon"></a>
                                  <ul>
                                    <li><a class="color-facebook" href="#/"><i class="social_facebook"></i></a></li>
                                    <li><a class="color-twitter" href="#/"><i class="social_twitter"></i></a></li>
                                    <li><a class="color-dribbble" href="#/"><i class="social_dribbble"></i></a></li>
                                    <li><a class="color-pinterest" href="#/"><i class="social_pinterest"></i></a></li>
                                  </ul>
                                </div>
                              </div>
                              <h4 class="title">
                                <a href="blog-details.html">{{$post->title}}</a>
                              </h4>
                              {!! $post->description !!}
                            </div>
                            <div class="post-footer">
                              <a href="blog-details.html" class="btn-theme btn-border-gradient btn-size-xs"><span>Detalhes</span></a>
                              <a class="post-author" href="blog.html">{{$post->author->name}}</a>
                            </div>
                          </div>
                        </div>
                        <!--== End Blog Post Item ==-->
                      </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->
        <!--== Start Brand Logo Area ==-->
        <section class="brand-logo-area brand-logo-default-area">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-4 offset-lg-0 col-xl-4">
                        <div class="section-title text-center text-lg-start">
                            <h2 class="title title-style mt-xl-30">Our Current Sponsors. <img class="img-shape"
                                    src="{{ asset('frontend/assets/img/shape/3.png') }}" alt="Image-Givest"></h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-7 offset-xl-1">
                        <div class="brand-logo-content">
                            <div class="row row-cols-3 row-cols-sm-5">
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/1.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/2.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/3.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/4.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/5.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/6.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/7.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/8.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/9.png" alt="Image-Givest">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/10.png" alt="Image-Givest">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Brand Logo Area ==-->
    </main>
@endsection

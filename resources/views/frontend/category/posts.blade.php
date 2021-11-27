@extends('layouts.frontend.frontend')
@section('title',$title)
@section('wrapper','blog-page-wrapper')
@section('content')
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="{{ asset('frontend/assets/img/photos/bg-page-title.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Blog Post</h2>
              <div class="bread-crumbs"><a href="index.html">Home<span class="breadcrumb-sep">//</span></a><span class="active">Blog</span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-grid-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="blog-content-column">
              <div class="blog-content-area post-items-style2">
                @foreach ($posts as $post)
                         <!--== Start Blog Post Item ==-->
                        <div class="post-item">
                            <div class="thumb">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/g1.jpg') }}" alt="Givest-Blog"></a>
                            <div class="meta-date">
                                <a href="blog.html"><span>{{$post->created_at->day}}</span> {{$post->created_at->month}}</a>
                            </div>
                            <div class="shape-line"></div>
                            </div>
                            <div class="content">
                            <div class="inner-content">
                                <div class="meta">
                                <a class="post-category" href="blog.html">{{$title}}</a>
                                <a class="post-author" href="blog.html"><span class="icon"><img class="icon-img" src="{{ asset('frontend/assets/img/icons/admin1.png') }}" alt="Icon-Image"></span>{{$post->author->name}}</a>
                                </div>
                                <h4 class="title">
                                <a href="blog-details.html">{{$post->title}}.</a>
                                </h4>
                                <p>{{$post->resume}}</p>
                                <a href="blog-details.html" class="btn-theme btn-border-gradient btn-size-md"><span>Read More <img class="icon icon-img" src="assets/img/icons/arrow-line-right-gradient.png" alt="Icon"></span></a>
                            </div>
                            </div>
                        </div>
                        <!--== End Blog Post Item ==-->
                @endforeach
                {{$posts->links()}}
                <div class="pagination-area pt-0 pb-0">
                  <nav>
                    <ul class="page-numbers">
                      <li>
                        <a class="page-number" href="blog.html">1</a>
                      </li>
                      <li>
                        <a class="page-number" href="blog.html">2</a>
                      </li>
                      <li>
                        <a class="page-number" href="blog.html">3</a>
                      </li>
                      <li>
                        <a class="page-number next" href="blog.html">
                          <img src="{{ asset('frontend/assets/img/icons/arrow-line-right-gradient.png') }}" alt="Icon-Image">
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="sidebar-area">
                <div class="widget">
                  <h3 class="widget-title">Pesquisar</h3>
                  <div class="widget-search-box">
                    <form action="#" method="post">
                      <div class="form-input-item">
                        <label for="search2" class="sr-only">Pesquisar</label>
                        <input type="text" id="search2" placeholder="Search here">
                        <button type="submit" class="btn-src">
                          <i class="icofont-search-1"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="widget">
                  <h3 class="widget-title">Categorias</h3>
                  <div class="separator-line">
                    <img class="me-1" src="{{ asset('frontend/assets/img/shape/line-t2.png') }}" alt="Image-Givest">
                  </div>
                  <div class="widget-category">
                      @foreach ($categories as $category)
                         <a href="{{ route('category.posts',$category->id) }}"> {{$category->title}} <span>({{$category->posts->where('published',true)->count()}})</span></a>
                      @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>
@endsection
{{--
                <div class="widget">
                  <h3 class="widget-title">Urgent Causes</h3>
                  <div class="separator-line">
                    <img class="me-1" src="assets/img/shape/line-t2.png" alt="Image-Givest">
                  </div>
                  <div class="widget-causes-item">
                    <div class="thumb">
                      <img src="assets/img/causes/w1.jpg" alt="Givest-HasTech">
                    </div>
                    <div class="content">
                      <h4 class="title"><a href="causes-details.html">Need School For Uganda Poor Children.</a></h4>
                      <ul class="donate-info">
                        <li class="info-item">
                          <span class="info-title">Goal:</span>
                          <span class="amount">$ 5,000</span>
                        </li>
                        <li class="info-item">
                          <span class="info-title">Raised:</span>
                          <span class="amount">$ 2,000</span>
                        </li>
                      </ul>
                      <!-- Start Progress Item -->
                      <div class="progress-item">
                        <div class="progress-line">
                          <div class="progress-bar-line" data-percent="75%"><span class="percent"></span></div>
                        </div>
                      </div>
                      <form action="#">
                        <div class="amount-info">
                          <div class="donate-amount">$20</div>
                          <div class="donate-amount">$35</div>
                          <div class="donate-amount">$48</div>
                          <div class="donate-amount me-0">$90</div>
                          <div class="donate-amount donate-custom-amount">
                            <input class="form-control" type="text" placeholder="Custome Amount">
                          </div>
                        </div>
                        <a class="btn-theme btn-gradient btn-slide" href="#"><span>Donate Now <img class="icon icon-img" src="assets/img/icons/arrow-line-right2.png" alt="Icon"></span></a>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="widget mb-0 pb-3">
                  <h3 class="widget-title">Popular Tags</h3>
                  <div class="separator-line">
                    <img class="me-1" src="assets/img/shape/line-t2.png" alt="Image-Givest">
                  </div>
                  <div class="widget-tags">
                    <ul>
                      <li><a href="#/">Clean Water</a></li>
                      <li><a href="#/">Education</a></li>
                      <li><a class="style2" href="#/">Health</a></li>
                      <li><a class="style2" href="#/">Medicine</a></li>
                      <li><a href="#/">Poor</a></li>
                      <li><a href="#/">Children</a></li>
                      <li><a class="style2" href="#/">Charity</a></li>
                      <li><a class="style2" href="#/">Non Profit</a></li>
                    </ul>
                  </div>
                </div>--}}
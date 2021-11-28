@extends('layouts.frontend.frontend')
@section('title',$title)
@section('wrapper','blog-page-wrapper')
@section('content')
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="{{ asset('storage/'.$category->cover_image) }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">{{$title}}</h2>
              <div class="bread-crumbs">  </div>
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
                            <a href="blog-details.html"><img src="{{ asset('storage/'.$post->cover_image) }}" alt="Givest-Blog"></a>
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
              </div>
              <div class="sidebar-area">
                <div class="widget">
                  <h3 class="widget-title">Pesquisar</h3>
                  <div class="widget-search-box">
                    <form action="#" method="post">
                      <div class="form-input-item">
                        <label for="search2" class="sr-only">Pesquisar</label>
                        <input type="text" id="search2" placeholder="Pesquisar">
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

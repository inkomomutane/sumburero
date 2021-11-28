@extends('layouts.frontend.frontend')
@section('title',$post->title)

@section('content')
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="{{ asset('storage/'.$post->cover_image) }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">{{$post->title}}</h2>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-details-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="blog-details-column">
              <div class="post-details-content">
                <div class="post-details-body">
                  <div class="thumb">
                    <img class="w-100" src="{{ asset('storage/'.$post->cover_image) }}" alt="{{$post->title}}">
                  </div>
                  <div class="content">
                    <div class="meta">
                      <a class="post-category" href="{{ route('category.posts',$post->category->slug) }}">{{$post->category->title}}</a>
                      <a class="post-author" ><span class="icon"><img class="icon-img" src="{{ asset('frontend/assets/img/icons/admin1.png') }}" alt="Icon-Image"></span>Autor: {{$post->author->name}}</a>
                    </div>
                    <div class="row mb-32">
                        {!! $post->description !!}
                    </div>
                    <div class="category-social-content">
                      <div class="social-items">
                        <a href="#/"><i class="icofont-facebook"></i></a>
                        <a href="#/"><i class="icofont-skype"></i></a>
                        <a href="#/"><i class="icofont-twitter"></i></a>
                      </div>
                      <div class="category-items">
                        <span>Tags:</span>
                        @foreach ($post->tags as $tag)
                        <a href="">{{$tag->name}} </a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="comment-area">
                    <h6 class="title">Comentários <span>({{$post->comments->count()}})</span></h6>
                    <div class="comment-content">
                        @foreach ($post->comments as $comment)

                      <div class="single-comment">
                        <div class="author-info">
                          <div class="author-details">
                            <h6 class="name">{{$comment->name}}</h6>
                            <div class="comment-date">{{$comment->created_at}}</div>
                            <p>{{$comment->comment}}</p> </div>
                        </div>
                      </div>
                        @endforeach
                    </div>
                    <div class="comment-form">
                      <h2 class="title">Comentar</h2>
                      <form action="#" method="post">
                        <div class="comment-form-content">
                          <div class="row row-gutter-20">
                            <div class="col-md-6">
                              <div class="form-group">
                                <input class="form-control" type="text" placeholder="Name" required="">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email" required="">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group mb-0">
                                <textarea class="form-control textarea" name="comment" id="comment" cols="45" rows="7" placeholder="Comment" required=""></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group mb-0">
                                <button class="btn-theme btn-gradient btn-slide no-border" type="submit">Comentar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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

                  <div class="widget-category">
                      @foreach ($categories as $category)
                         <a href="{{ route('category.posts',$category->id) }}"> {{$category->title}} <span>({{$category->posts->where('published',true)->count()}})</span></a>
                      @endforeach
                  </div>
                </div>

                <div class="widget mb-0 pb-3">
                    <h3 class="widget-title">Tags</h3>
                    <div class="widget-tags">
                      <ul>
                        @foreach ($tags as $tag)
                        <li><a href="#/">{{$tag->name}}</a></li>
                        @endforeach
                      </ul>
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

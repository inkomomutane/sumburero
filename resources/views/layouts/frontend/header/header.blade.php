  <!--== Start Header Wrapper ==-->

  <header class="header-area header-default sticky-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-5 col-sm-3 col-md-3 col-lg-2 pr-0">
          <div class="header-logo-area">
            <a href="index.html">
              <img class="logo-main" src="{{asset('frontend/assets/img/logo.png')}}" alt="Logo" />
              <img class="logo-light" src="{{asset('frontend/assets/img/logo.png')}}" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-7 col-sm-9 col-md-9 col-lg-10">
          <div class="header-align">
            <div class="header-navigation-area">
              <ul class="main-menu nav justify-content-center">
                <li class="@if (Route::is('welcome')) active @endif" ><a href="{{ route('welcome') }}">Início</a></li>
                <li class="@if (Route::is('welcome')) active @endif"><a href="{{ route('welcome') }}">Sobre Nós</a></li>
                <li class="has-submenu @if (Route::is('web.posts') || Route::is('category.posts')) active @endif"><a href="{{ route('web.posts') }}">Notícias</a>
                  <ul class="submenu-nav">
                      @foreach ($categories as $category)

                      <li class="@if (Route::is('category.posts')) active @endif"><a href="{{ route('category.posts',$category->slug) }}">{{$category->title}}</a></li>
                      @endforeach
                                      </ul>
                </li>
                <li class="@if (Route::is('contact')) active @endif"><a href="{{route('contact')}}">Contacto</a></li>
              </ul>
            </div>
            <div class="header-action-area">
              <button class="btn-menu d-xl-none">
                <span></span>
                <span></span>
                <span></span>
              </button>
              <a href="{{ route('welcome') }}" class="btn-theme btn-gradient btn-slide btn-style">Pesquisar &nbsp; &nbsp; <i class="icofont-search-1" style="color: #fff"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->

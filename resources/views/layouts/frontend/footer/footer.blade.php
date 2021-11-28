

  <!--== Start Footer Area Wrapper ==-->
  <footer class="footer-area">
    <div class="footer-main">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="widget-item">
              <div class="about-widget">
                <a class="footer-logo" href="index.html">
                  <img src="{{ asset('frontend/assets/img/logo.png')}}" alt="Logo">
                </a>
                <p>
                    {!! $resume !!}
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="widget-item">
              <h4 class="widget-title line-style">Galeria</h4>
              <div class="widget-gallery">
                <div class="row row-cols-3 row-gutter-10">
                    @foreach ($images as $image)
                    <div class="col">
                        <div class="gallery-item">
                          <img src="{{ asset('storage/'.$image->url)}}" alt="{{$image->name}}">
                          <a class="icon" href="#/"><i class="fas fa-newspaper    "></i></a>
                        </div>
                      </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="widget-item menu-wrap-two-column">
              <h6 class="widget-title line-style">Links do site</h6>
              <nav class="widget-menu-wrap">
                <div class="row">
                  <div class="col-6 col-sm-6 col-md-6 pr-sm-5">
                    <ul class="nav-menu nav">
                      <li><a href="{{ url('/') }}">Início</a></li>
                      <li><a href="blog.html">Sobre nós</a></li>
                      <li><a href="#/">Notícias</a></li>
                    </ul>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 pl-sm-5">
                    <ul class="nav-menu nav align-right">
                        <li><a href="#/">contacte nos</a></li>
                        <li><a href="#/">Pesquisar</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!--== Scroll Top Button ==-->
      <div class="scroll-to-top"><img src="{{ asset('frontend/assets/img/icons/arrow-up-line.png')}}" alt="Icon-Image"></div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="footer-bottom-content">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="widget-copyright text-center">
                <p>© {{ now()->year}} <span>Sumburero</span>. All rights reserved. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="shape-layer">
      <img src="{{ asset('frontend/assets/img/shape/footer-line.png')}}" alt="Image-Givest">
    </div>
  </footer>
  <!--== End Footer Area Wrapper ==-->

  <!--== Start Side Menu ==-->
  <aside class="off-canvas-wrapper">
    <div class="off-canvas-inner">
      <div class="off-canvas-overlay"></div>
      <!-- Start Off Canvas Content Wrapper -->
      <div class="off-canvas-content">
        <!-- Off Canvas Header -->
        <div class="off-canvas-header">
          <div class="logo-area">
            <a href="index.html"><img src="{{ asset('frontend/assets/img/logo.png')}}" alt="Logo" /></a>
          </div>
          <div class="close-action">
            <button class="btn-close"><i class="icofont-close"></i></button>
          </div>
        </div>

        <div class="off-canvas-item">
          <!-- Start Mobile Menu Wrapper -->
          <div class="res-mobile-menu menu-active-one">
            <!-- Note Content Auto Generate By Jquery From Main Menu -->
          </div>
          <!-- End Mobile Menu Wrapper -->
        </div>
        <!-- Off Canvas Footer -->
        <div class="off-canvas-footer"></div>
      </div>
      <!-- End Off Canvas Content Wrapper -->
    </div>
  </aside>
  <!--== End Side Menu ==-->

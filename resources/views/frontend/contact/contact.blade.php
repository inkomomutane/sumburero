@extends('layouts.frontend.frontend')
@section('title', 'Contacte - nos')
@section('content')
    @if ($website)
        <main class="main-content site-wrapper-reveal">
            <!--== Start Page Title Area ==-->
            <section class="page-title-area" data-bg-img="{{ url('storage') }}/{{ $website->images->last()->url }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title-content text-center">
                                <h2 class="title text-white">Contacte nos</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Title Area ==-->
                <section>
                    <div class="container">
                        <div class="row mx-auto">
                            <div class="col-10 pt-5">
                                @include('layouts.frontend.session')
                            </div>
                        </div>
                    </div>
                </section>
            
            <!--== Start Contact Area ==-->
            <section class="contact-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-colunm">
                                <div class="contact-form">
                                    <form class="contact-form-wrapper" action="{{ route('contact.mail') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="section-title">
                                                    <h5 class="subtitle line-theme-color">Contacte Nos</h5>
                                                   
                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row row-gutter-20">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="name"
                                                                placeholder="Nome">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control" type="email" name="email"
                                                                placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="phone"
                                                                placeholder="Contacto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0">
                                                            <textarea class="form-control textarea" name="message"
                                                                placeholder="Mensage"></textarea>

                                                        </div>

                                                    </div>
                                                    <div class="form-group mb-0 col-md-12 mt-3">
                                                        <label class="form-group mb-0">
                                                            <input class="form-check-input" name="newslatter"
                                                                id="newslatter" type="checkbox" aria-label="Ser Newslatter"
                                                                value="off">
                                                            Receber notificações no email de novos posts.
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0">
                                                            <button class="btn-theme btn-gradient btn-slide no-border"
                                                                type="submit">Enviar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Message Notification -->
                                <div class="form-message"></div>
                                <div class="contact-map-area">
                                    <div class="contact-info-content">
                                        <div class="contact-info-item">
                                            <div class="icon">
                                                <img class="icon-img"
                                                    src="{{ asset('frontend/assets/img/icons/c1.png') }}" alt="Icon">
                                            </div>
                                            <div class="content">
                                                <h4>Telefone</h4>
                                                <img class="line-icon"
                                                    src="{{ asset('frontend/assets/img/shape/line-s1.png') }}"
                                                    alt="ligar-sumburero">
                                                <a href="tel://+258 {{ $website->phones }}">{{ $website->phones }}</a>
                                            </div>
                                        </div>
                                        <div class="contact-info-item">
                                            <div class="icon icon-mail">
                                                <img class="icon-img"
                                                    src="{{ asset('frontend/assets/img/icons/c2.png') }}" alt="Icon-mail">
                                            </div>
                                            <div class="content">
                                                <h4>Email</h4>
                                                <img class="line-icon"
                                                    src="{{ asset('frontend/assets/img/shape/line-s1.png') }}"
                                                    alt="email-sumburero">
                                                <a href="mailto://{{ $website->emails }}">{{ $website->emails }}</a>
                                            </div>
                                        </div>
                                        <div class="contact-info-item mb-0 pb-0">
                                            <div class="icon icon-location">
                                                <img class="icon-img"
                                                    src="{{ asset('frontend/assets/img/icons/c3.png') }}" alt="Icon">
                                            </div>
                                            <div class="content">
                                                <h4>Localização</h4>
                                                <img class="line-icon"
                                                    src="{{ asset('frontend/assets/img/shape/line-s1.png') }}"
                                                    alt="localização-sumburero">
                                                <p>{{ $website->country }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    {!! $website->map !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Contact Area ==-->
        </main>
    @endif
@endsection

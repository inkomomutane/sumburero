@extends('backend.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Configurações do wesite</h4>
                    @if (!$website)@else
                    <div class="card-header-action">
                        <a href="{{ route('website.logo',$website->id) }}" class="btn btn-info"><i
                                class="fas fa-image"></i><span> Adicionar logo</span></a>
                    </div>
                    @endif
                </div>
                        @if (!$website)
                            <form action=" {{ route('website.store') }} " method="post">
                            @method('POST')
                        @else
                            <form action=" {{ route('website.update',$website->id) }}" method="post">
                            @method('PATCH')
                        @endif
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <label for="">Nome da organização</label>
                                <input type="text" name="name" id="name" class="form-control " placeholder="Nome da organização" aria-describedby="nome" required  autofocus autocomplete="name" @if($website)  value="{{ $website->name }} " @else  value="{{ old('email') }} @endif ">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                    <label for="">País da organização</label>
                                    <input type="text" name="country" id="country" class="form-control " placeholder="País da organização" aria-describedby="country" required autofocus autocomplete="country" @if($website)  value="{{ $website->country }} " @else  value="{{ old('country') }} @endif ">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                    <label for="">Email da organização</label>
                                    <input type="email" name="emails" id="emails" class="form-control inputtags" placeholder="Email da organização" aria-describedby="emails" required autofocus autocomplete="emails" @if($website)  value="{{ $website->emails }} " @else  value="{{ old('emails') }} @endif ">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                    <label for="">Contacto da organização</label>
                                    <input type="tel" name="phones" id="phones" class="form-control " placeholder="Contacto da organização" aria-describedby="phones" required autofocus autocomplete="phones" @if($website)  value="{{ $website->phones }} " @else  value="{{ old('phones') }} @endif ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                <label for="">Hora de início das actividades</label>
                                <input type="text" name="open_at" id="open_at" 
                                class="form-control timepicker" placeholder="Hora de início das actividades" aria-describedby="open_at" 
                                required autofocus autocomplete="open_at" @if($website)  value="{{ date_format($website->open_at,'h:i A') }}" @else  value="{{ old('open_at') }}" @endif>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 ">
                                    <label for="">Hora de enceramento das actividades</label>
                                    <input type="text" name="close_at" id="close_at" class="form-control timepicker"
                                     placeholder="Hora de enceramento das actividades" aria-describedby="close_at" 
                                     required autofocus  @if($website)  value="{{ date_format($website->close_at,'h:i A') }}" @else  value="{{ old('close_at') }}" @endif >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group col-sm-12">
                                  <label for="">Mapa da localização da organização</label>
                                  <textarea class="form-control" name="map" id="map" rows="5" placeholder="Mapa da localização da organização" autocapitalize maxlength="1500" > @if($website) {{ $website->map }}  @else  {{ old('map') }} @endif </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group col-sm-12">
                                  <label for="">Breve resumo sobre a organização</label>
                                  <textarea class="form-control" name="resume" id="resume" rows="5" placeholder="Breve resumo sobre a organização" autocapitalize maxlength="125">@if($website) {{ $website->resume }}  @else  {{ old('resume') }} @endif</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group col-sm-12">
                                  <label for="">Missão da organização</label>
                                  <textarea class="form-control" name="mission" id="mission" rows="5" placeholder="Missão da organização" autocapitalize maxlength="125">@if($website) {{ $website->mission }}  @else  {{ old('mission') }} @endif</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group col-sm-12">
                                  <label for="">Visão da organização</label>
                                  <textarea class="form-control" name="vision" id="vision" rows="5" placeholder="Visão da organização" autocapitalize maxlength="125">@if($website) {{ $website->vision }}  @else  {{ old('vision') }} @endif</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group col-sm-12">
                                  <label for="">Objectivos da organização</label>
                                  <textarea class="form-control" name="objectives" id="objectives" rows="5" placeholder="Ovjectivos da organização" autocapitalize maxlength="125">@if($website) {{ $website->objectives }}  @else  {{ old('objectives') }} @endif</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="form-group col-sm-12">

                              <input type="submit" class=" btn btn-primary w-100"  value="Guardar Informção">
                            </div>
                        </div>

                    </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="{{ asset('backend/ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace('resume');</script>
<script>CKEDITOR.replace('mission');</script>
<script>CKEDITOR.replace('vision');</script>
<script>CKEDITOR.replace('objectives');</script>
@endpush
@push('css')
<style>
    .cke_chrome{
        border: none !important;
    }
    .cke_top{
        background:transparent !important;
        border-top:  1px solid #d1d1d1 !important;
    }
    .cke_bottom{
        background:transparent !important;
        border-bottom: 1px solid #d1d1d1 !important;
    }
</style>
    
@endpush
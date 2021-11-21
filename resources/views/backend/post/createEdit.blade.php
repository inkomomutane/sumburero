@extends('backend.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@if (Route::is('post.create'))
                        Criar novo post
                    @else
                        Editar post
                    @endif</h4>
                    @if (!$post)@else
                    <div class="card-header-action">
                        <a href="{{ route('post.show',$post->id) }}" class="btn btn-info"><i
                                class="fas fa-image"></i><span> Adicionar fotos ao post</span></a>
                    </div>
                    @endif
                </div>
                        @if (!$post)
                            <form action=" {{ route('post.store') }} " method="post">
                            @method('POST')
                        @else
                            <form action=" {{ route('post.update',$post->id) }}" method="post">
                            @method('PATCH')
                        @endif
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Título do post</label>
                                <input type="text" name="title" id="title " class="form-control " placeholder="Título do post" aria-describedby="title" required  autofocus autocomplete="title" @if($post)  value="{{ $post->title }} " @else  value="{{ old('title') }}" @endif >
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="">Subtítulo do post</label>
                                    <input type="text" name="subtitle" id="subtitle" class="form-control " placeholder="Subtítulo do post" aria-describedby="subtitle" required autofocus autocomplete="subtitle" @if($post)  value="{{ $post->subtitle }} " @else  value="{{ old('subtitle') }}" @endif >
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="">Breve resumo do post 120 letras no máximo.</label>
                                    <input type="text" name="resume" id="resume" class="form-control inputtags" placeholder="Breve resumo do post 120 letras no máximo." aria-describedby="resume" required autofocus autocomplete="resume" @if($post)  value="{{ $post->resume }}" @else  value="{{ old('resume') }}" @endif>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="">Palavras chaves separados por vírgula</label>
                                    <input type="text" name="keywords" id="keywords" class="form-control " placeholder="Palavras chaves separados por vírgula" aria-describedby="keywords" required autofocus autocomplete="keywords" @if($post)  value="{{ $post->keywords }} " @else  value="{{ old('keywords') }}" @endif >
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <label for="">Categoria</label>
                                    <select name="category_id" id="category_id" class="selectric" aria-placeholder="Cetegoria">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <label for="">Tags</label>
                                    <select name="tags[]" id="tags" class="selectric" aria-placeholder="tags" multiple>
                                        @if($post)
                                            @foreach ($tags as $tag)
                                        
                                            <option value="{{$tag->id}}" {{$tag->selected}}>{{$tag->name}}</option>
                                            @endforeach
                                        @else
                                        @foreach ($tags as $tag)

                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                 </div>
                                 <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <label for="">Publicar</label>
                                    <select name="published" id="published" class="selectric" aria-placeholder="published">
                                        @if($post)
                                        <option value="1" @if ($post->published) selected @endif>Sim</option>
                                        <option value="0" @if (!($post->published)) selected @endif>Não</option>
                                        @else 
                                        <option value="1">Sim</option>
                                        <option value="0"  selected>Não</option>
                                        @endif
                                    </select>
                                 </div>


                                
                                <input type="hidden" name="author_id" id="author_id" value="{{Auth::user()->id}}">
                            </div>
                            <div class="row">
                                <div class="form-group form-group col-sm-12">
                                  <label for="">Descrição do post</label>
                                  <textarea class="form-control" name="description" id="description" rows="5" placeholder="Descrição do post" autocapitalize maxlength="125">@if($post) {{ $post->description }}  @else  {{ old('description') }} @endif</textarea>
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
<script>CKEDITOR.replace('description');</script>
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
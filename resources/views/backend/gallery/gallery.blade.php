@extends('layouts.backend.dashboard')
@push('css')
    <style>
        @font-face {
            font-family: 'Ubuntu';
            src: url("{{ asset('frontend/errors/fonts/ubuntu.ttf') }}") format('truetype'), ;
            font-weight: normal;
            font-style: normal;
        }

        .btn {
            font-family: 'Ubuntu';
            font-weight: 500 !important;
        }

    </style>
@endpush
@section('sessions')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('error') }}</strong>
            </div>
        </div>
    @endif
    @if (session('errors'))
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>×</span></button>
            @error('modelImageName')
                <strong>{{ $message }}</strong>
            @enderror
            @error('modelImageContent')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>
@endif
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="{{ route($modelIndexRoute) }}" class="btn btn-icon btn-light">
                            <i class="fas fa-arrow-left"></i>
                            Voltar</a>
                    </div>
                    <h3> <code>{{ $title }} </code></h3>

                </div>
            </section>

            <div class="card">

                <div class="card-header">
                    <div class="card-header-action">
                        <button class="btn btn-danger mx-2" id="delete_selected_images"><i class="fas fa-trash"></i> <span> Apagar
                                selecionadas</span></button>
                        <input type="file" class="btn btn-info mx-2" id="upload_image" placeholder="">
                    </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row gutters-sm">
                            <form class="row col-sm-12" action="{{ route($modelDeleteImageRoute, $model->id) }}" method="post" id="delete_image">
                                @csrf
                                @foreach ($model->images as $foto)
                                    <div class="col-sm-3">
                                        <label class="imagecheck mb-4">
                                            <input name="{{$foto->id}}" type="checkbox" value="{{ $foto->url }}" class="imagecheck-input"
                                                name="{{ $foto->url }}" />
                                            <figure class="imagecheck-figure">
                                                <img src="{{ asset('storage') }}/{{ $foto->url }}"
                                                    alt="{{ $foto->url }}" class="imagecheck-image">
                                            </figure>
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">

                <div class="card-header">
                    <div class="card-header-action">
                        <button class="btn btn-success mx-2" id="link_selected_image"><i class="fas fa-image    "></i></i> <span>
                                Usar Imagem selecionada</span></button>  </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row gutters-sm">
                            <form class="row col-sm-12" action="{{ route($imageLinkRoute, [
                                'id' => $model,
                                'model' => get_class($model)
                            ]) }}" method="post" id="imageLink">
                                @csrf
                                @foreach ($model->images as $foto)
                                    <div class="col-sm-3">
                                        <label class="imagecheck mb-4">
                                            <input name="cover_image" type="radio" value="{{ $foto->url }}" class="imagecheck-input"
                                                name="{{ $foto->url }}" />
                                            <figure class="imagecheck-figure">
                                                <img src="{{ asset('storage') }}/{{ $foto->url }}"
                                                    alt="{{ $foto->url }}" class="imagecheck-image">
                                            </figure>
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg w-100" role="document">
            <div class="modal-content">

                <form action="{{ route($modelStoreImageRoute, $model->id) }}" method="post" id="store_image">
                    @csrf


                <div class="modal-header">
                    <h5 class="modal-title">Cortar imagem antes de adicionar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-sm-12 mx-auto">
                        <label for="">Nome da Image</label>
                        <input type="text" class="form-control" name="modelImageName"  id="modelImageName" placeholder="Nome da Image" required>
                         </div>
                      <input type="text" alt="" hidden name="modelImageContent" id="imovel_image_preview_input" value="">

                    <div class="img-container">
                        <div class="row container">
                            <div class="col-md-12">
                                <img src="" id="sample_image" height="420px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@include('backend.gallery.assets')

@push('js')
    <script>
        $(document).ready(function() {

            var $modal = $('#modal');

            var image = document.getElementById('sample_image');

            var cropper;

            $('#upload_image').change(function(event) {
                var files = event.target.files;

                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };

                if (files && files.length > 0) {
                    reader = new FileReader();
                    reader.onload = function(event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image);
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            $('#store_image').on('submit',function(e) {
                e.preventDefault();
                var bs = $('#store_image').serializeArray();


                canvas = cropper.getCroppedCanvas();

                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var image = reader.result;
                        var data_file = $('#imovel_image_preview_input');
                        data_file[0].value = image;
                        console.log(data_file);
                        console.log(bs);
                        e.currentTarget.submit();
                        $('#modal').modal('toggle');
                    };
                });
            });
        });

        $(function(){
            $('#delete_selected_images').on('click',function(){
                $('#delete_image').submit();
            });
            $("#link_selected_image").on('click', function () {
                $('#imageLink').submit();
            });
        });
    </script>
@endpush

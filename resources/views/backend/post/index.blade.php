@extends('layouts.backend.dashboard')
@section('content')
<div class="section-header">
    <h1>Posts</h1>
    <div class="section-header-button">
        <a href="{{ route('post.create') }}" class="btn btn-info"><i class="fas fa-plus    "></i> Novo Post</a>
    </div>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></div>
        <div class="breadcrumb-item">Todos seus Posts</div>
    </div>
</div>
<div class="section-body">

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article article-style-b">
                <div class="article-header">
                    <div class="article-image" data-background="assets/img/news/img13.jpg" style="background-image: url(&quot;assets/img/news/img13.jpg&quot;);">
                    </div>
                    <div class="article-badge">
                        @if ($post->published)
                        <div class="article-badge-item bg-success"><i class="fas fa-clock"></i> Publicado</div>
                            @else
                            <div class="article-badge-item bg-warning"><i class="fas fa-clock"></i> Não publicado</div>
                       
                        @endif
                          </div>
                </div>
                <div class="article-details">
                    <div class="article-title">
                        <h2><a href="#">{{$post->title}}</a></h2>
                    </div>
                    <p>{{$post->resume}}</p>
                    <div class="article-cta">
                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt    "></i>&nbsp; Editar</a>
                        <a href="{{ route('post.destroy',$post->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt    "></i>&nbsp; Deletar</a>
                     </div>
                </div>
            </article>
        </div>
    @endforeach
</div>
</div>
{{$posts->links()}}
@endsection

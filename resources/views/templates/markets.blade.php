@extends('layouts.master')

@section('seo')
    @include('elements.seo', ['seo' => $post->seo()])
@endsection

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container" style="max-width: 1610px;">
            @include('elements.breadcrumb', ['post' => $post, 'position' => 0, 'is_parent' => false])
        </div>
    </div>
    
    <div class="container my-5">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <h1 class="mb-15">
                        {{ $post->post_title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    


    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                {!! \Vedmant\LaravelShortcodes\Facades\Shortcodes::render($post->post_content) !!}
            </div>
        </div>
    </div>
    
    <div class="container mt-35">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <div class="title">
                        <h3>Our <span style="color: #00984d;">Brands</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card wow animate__ animate__fadeInUp animated" data-wow-delay=".2s" style="background-color: #f3e8e8;">
                    <div class="card-body banner-text mb-3">
                        <h4 class="my-3">Safana Brand</h4>
                        <div class="title">Brand in Siam Ocean</div>
                        <a class="btn btn-xs mt-2" href="{{ \App\Models\Post::find(7)->url() }}">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
               <div class="card wow animate__ animate__fadeInUp animated" data-wow-delay=".2s" style="background-color: #f3e8e8;">
                    <div class="card-body banner-text mb-3">
                        <h4 class="my-3">Fiorella Brand</h4>
                        <div class="title">Brand in Siam Ocean</div>
                        <a class="btn btn-xs mt-2" href="{{ \App\Models\Post::find(8)->url() }}">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3><span style="color: #00984d;">Featured</span> Categories</h3>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
            </div>
            <div class="carausel-6-columns-cover position-relative">
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach(App\Models\Term::where('taxonomy','product_category')->get() as $term)
                    <div class="card-2 mx-1 {{$term->bg}} wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href='{{ $term->url() }}'><img src="{{ asset('assets/imgs/' . $term->image) }}" alt="{{ $term->name }}" /></a>
                        </figure>
                        <h6><a href='{{ $term->url() }}'>{{$term->name}}</a></h6>
                        <span>{{$term->count()}} items</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <div class="container faq">
        @includeIf('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])
    </div>
@endsection
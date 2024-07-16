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
    <section class="row align-items-center mb-50">
        <div class="col-lg-4">
            <img src="{{asset('assets/imgs/slider/inspector.png')}}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
        </div>
        <div class="col-lg-8">
            <div class="pl-25">
                {!! \Vedmant\LaravelShortcodes\Facades\Shortcodes::render($post->post_content) !!}
                {{--<div class="carausel-3-columns-cover position-relative mt-4">
                    <div id="carausel-3-columns-arrows"></div>
                    <div class="carausel-3-columns" id="carausel-3-columns">
                        <img src="{{asset('assets/imgs/slider/slider-1.jpg')}}" alt="" style="height: 18vh;object-fit: cover;"/>
                        <img src="{{asset('assets/imgs/slider/slider-2.jpg')}}" alt="" style="height: 18vh;object-fit: cover;"/>
                        <img src="{{asset('assets/imgs/slider/slider-3.png')}}" alt="" style="height: 18vh;object-fit: cover;" />
                        <img src="{{asset('assets/imgs/slider/slider-4.jpg')}}" alt="" style="height: 18vh;object-fit: cover;" />
                        <img src="{{asset('assets/imgs/slider/slider-5.png')}}" alt="" style="height: 18vh;object-fit: cover;" />
                        <img src="{{asset('assets/imgs/slider/slider-6.png')}}" alt="" style="height: 18vh;object-fit: cover;" />
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
</div>

<div class="container mb-50">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-24 m-auto">
            <div class="featured-card">
                <img src="{{asset('assets/imgs/theme/icons/vision.png')}}" alt="">
                <h4>Our Vision</h4>
                <p>Achieving excellence in delivering our products with specifications and quality that satisfy both customers and end consumers, and are compliant with local and international quality standards, entails developing our production and marketing teams. Additionally, it involves utilizing the best raw materials for our products.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-24 m-auto">
            <div class="featured-card">
                <img src="{{asset('assets/imgs/theme/icons/mission.png')}}" alt="">
                <h4>Our Message</h4>
                <p>At Siam Ocean, we are committed to providing the highest quality products according to the required standards and in compliance with international and local specifications. We hold full credibility in all our dealings with customers, ensuring that our products meet their expectations.</p>
            </div>
        </div>
        <hr class="mt-15">
    </div>
</div>

<div class="container">
    <div class="row product-grid-4">
        <div class="col-xl-12">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Our Popular Products</h3>
            </div>
        </div>
        @foreach(\App\Models\Post::where('post_type', 'product')->where('post_status', 'publish')->limit(6)->get() as $product)
            @include('elements.product-list', ['post' => $product])
        @endforeach
    </div>
</div>

<div class="container faq">
    @includeIf('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])
</div>
@endsection
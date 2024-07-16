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

    <div class="container faq">
      @includeIf('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])
    </div>

@endsection
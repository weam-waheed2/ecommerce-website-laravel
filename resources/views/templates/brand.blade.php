@extends('layouts.master')

@section('seo')
    @include('elements.seo', ['seo' => $post->seo()])
@endsection

@section('content')

  @include('elements.breadcrumb', ['post' => $post, 'position' => 0, 'is_parent' => false])


  <div class="container faq">
      @includeIf('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])
  </div>
@endsection
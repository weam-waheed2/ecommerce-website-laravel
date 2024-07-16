@extends('layouts.master')

@section('seo')
    @include('elements.seo', ['seo' => $post->seo()])
@endsection

@php
$sub_terms_ID = \App\Models\Term::whereIn('ID', is_array(json_decode($post->meta('filter_category'), 1)) ? json_decode($post->meta('filter_category'), 1) : [$post->meta('filter_category')])->pluck('ID')->toArray();
$pageTerms = \App\Models\Term::where('taxonomy', 'product_category')->whereIn('ID', $sub_terms_ID)->get();
@endphp

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

  <div class="container mb-30">
    <div class="row">
        <div class="col-lg-9">
            <div class="shop-product-fillter">
                <h3>Products</h3>
            </div>
            <div class="row mt-40">
                <div class="col-12">
                    <div class="row related-products" id="page-tour-list">
                      @foreach(\App\Models\Post::whereIn('ID', \App\Models\TermRelationship::whereIn('term_ID', $pageTerms->pluck('ID')->toArray())->pluck('post_ID')->toArray())->get() as $i => $product)
                            @include('elements.product-list', ['post' => $product, 'col' => 'col-lg-3 col-md-4 col-12 col-sm-6', 'i' => $i])
                      @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget price_range range mb-30">
              
              @foreach(\App\Models\Post::whereIn('ID', json_decode($post->meta('filter_pages'), 1))->get() as $filter_page)
                  <a href="{{ $filter_page->url() }}" class="search-tag d-block text-center d-none" id="filter-page-link-{{ $filter_page->ID }}">{{ $filter_page->post_title }}</a>
              @endforeach
              <div class="row">
                  <div class="col-12 my-4">
                      <h5 class="section-title style-1 mb-30">Keyword</h5>
                      <input type="text" class="form-control" name="keyword">
                  </div>
                  <div class="col-12 my-4 overflow-auto scroll-onphone">
                      <h5 class="section-title style-1 mb-30">Categories</h5>
                      @foreach($pageTerms as $term)
                      <div class="gx-checkbox">
                          <input type="radio" id="term-category-{{ $term->ID }}" class="category-checkbox form-check-input" value="{{ $term->ID }}" name="category-radio">
                          <label for="term-category-{{ $term->ID }}">{{ $term->name }}</label>
                      </div>
                      @endforeach
                  </div>
              </div>
                <button class='btn btn-sm btn-default' id="filter-btn" type="button"><i class="fi-rs-filter mr-5"></i> Fillter</button>
            </div>

            <div class="sidebar-widget widget-category-2 mb-30">
              <h5 class="section-title style-1 mb-30">Category</h5>
              <ul>
                @foreach(App\Models\Term::where('taxonomy','product_category')->get() as $term)
                <li>
                    <a href='{{$term->url()}}'> <img src="{{asset('assets/imgs/theme/icons/category-2.svg')}}" alt="" />{{$term->name}}</a><span style="display: inline-block;background-color: #BCE3C9;width: 24px;height: 24px;line-height: 24px;text-align: center;border-radius: 20px;margin-left: 5px;font-size: 12px;color: #253D4E;">{{$term->count()}}</span>
                </li>
                @endforeach
              </ul>
          </div>
        </div>
    </div>
</div>

  <div class="container faq">
      @includeIf('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])
  </div>

  <script>
$(document).ready(function(){
    function randomize(){
        var parent  = $("#page-tour-list");
        var divs    = parent.children();
        while (divs.length) {
            parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
        }
    }

    $('.category-checkbox, #filter-btn').on('change click', function (){
        console.log('clicked');
        $('.tour-list-item').hide();
        $('.category-checkbox:checked').each(function () {
            var termID = $(this).val();
            $('.tour-list-item').each(function (){
                if($(this).attr('data-terms').split(',').includes(termID)){
                    $(this).show();
                }
            });
            randomize();
        });
        if($('.tour-list-item:visible').length == 0){
            $('.tour-list-item').show();
        }
    
    });

    $('[name="keyword"]').on('input', function(){
        var keyword = $(this).val().toLowerCase();
        $('.tour-list-item').each(function(){
            var title = $(this).find('#title-product').text().toLowerCase(); // Assuming the title is within an anchor tag inside an h2 element
            if(title.includes(keyword)){
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        randomize();
    });
});


</script>

@endsection
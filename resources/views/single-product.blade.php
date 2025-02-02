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
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-12 m-auto">
            <div class="row">
                <div class="col-xl-8">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{$post->image()}}" alt="product image" class="background:white" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    @foreach($post->Categories() as $category)
                                    <span class="stock-status out-stock">  
                                        {{$category->name}}
                                    </span>
                                    @endforeach 
                                    <h2 class="title-detail">{{$post->post_title}}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 100%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">Weight: <span class="text-brand">{{$post->meta('data') ? json_decode($post->meta('data'), true)['weight'] : ''}}</span></li>
                                            <li class="mb-5">Unit Per Case:<span class="text-brand"> {{$post->meta('data') ? json_decode($post->meta('data'), true)['case'] : ''}}</span></li>
                                            <li>Unit Per Container: <span class="text-brand">{{$post->meta('data') ? json_decode($post->meta('data'), true)['container'] : ''}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">

                                    <div class="tab-pane fade show active" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                                <tr class="stand-up">
                                                    <th>Weight</th>
                                                    <td>
                                                        <p>{{$post->meta('data') ? json_decode($post->meta('data'), true)['weight'] : ''}}</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-wo-wheels">
                                                    <th>Unit Per Case</th>
                                                    <td>
                                                        <p>{{$post->meta('data') ? json_decode($post->meta('data'), true)['case'] : ''}}</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-w-wheels">
                                                    <th>Unit Per Container</th>
                                                    <td>
                                                        <p>{{$post->meta('data') ? json_decode($post->meta('data'), true)['container'] : ''}}</p>
                                                    </td>
                                                </tr>
                                                <tr class="door-pass-through">
                                                    <th>Category</th>
                                                    <td>
                                                        @foreach($post->Categories() as $category)
                                                        <span class="stock-status out-stock">  
                                                            {{$category->name}}
                                                        </span>
                                                        @endforeach 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Related products</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach(\App\Models\post::where('post_type', 'product')->where('post_status', 'publish')->whereIn('ID', \App\Models\termRelationship::whereIn('term_ID', $post->PrimaryCategory() ? [$post->PrimaryCategory()->ID] : $post->Categories()->pluck('ID')->toArray())->pluck('post_ID'))->limit(4)->get() as $product)
                                        @include('elements.product-list', ['post' => $product, 'col' => 'col-lg-3 col-md-4 col-12 col-sm-6'])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 primary-sidebar sticky-sidebar mt-30">
                    <div class="sidebar-widget widget-vendor mb-30 bg-grey-9 box-shadow-none">
                        <h5 class="section-title style-3 mb-20">About Us</h5>
                        <p></p>
                        <ul class="contact-infor">
                            <li><img src="{{asset('assets/imgs/theme/icons/icon-location.svg')}}" class="mx-2" /><strong>Address: </strong> <br> <span>Al metawaren area Sadat City, Monufia Governorate, Egypt</span></li>
                            <li><img src="{{asset('assets/imgs/theme/icons/icon-contact.svg')}}" class="mx-2" /><strong>Contact:</strong> <br> <span>{{ \App\Models\Option::get('phone') }}</span></li>
                        </ul>
                        <ul>
                            <li class="hr"><span></span></li>
                        </ul>
                        <p>Get in Touch <a href='{{url('contact')}}'> Contact Us Now</a></p>
                    </div>
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Categories</h5>
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
    </div>
</div>
<div class="container faq">
    @includeIf('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])
</div>

@endsection
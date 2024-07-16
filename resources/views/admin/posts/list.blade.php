@extends('admin.layouts.master')
@section('title', $post_type == 'product' ? 'المنتجات' : ($post_type == 'post' ? 'المقالات' : 'الصفحات'))
@php
    $i = 1;
    $status = [
        'publish'   => 'success',
        'draft'     => 'warning',
        'trash'     => 'danger'
    ];
@endphp
@section('content')
    <style>
        .row-actions{
            position: relative;
            left: -9999em;
        }
        .post-index-tr:hover .row-actions{
            position: static;
        }
      </style>  
        @foreach(\App\Models\Post::where('post_title', 'LIKE', "%Egypt Itinerary%")->get() as $short)
            [category img="{{ $short->post_image }}" link="{{ $short->url() }}" title="{{ $short->post_title }}"]
        @endforeach
    
    <div class="row">
        <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8">{{$post_type == 'product' ? 'المنتجات' : ($post_type == 'post' ? 'المقالات' : 'الصفحات')}}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{url('admin/home')}}">
                                        لوحة التحكم
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    {{$post_type == 'product' ? 'المنتجات' : ($post_type == 'post' ? 'المقالات' : 'الصفحات')}}
                                </li>
                            </ol>
                            <div class="mt-3">
                                <a href="{{ url('admin/posts/'.$post_type.'/add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    اضافة {{$post_type == 'product' ? 'منتج' : ($post_type == 'post' ? 'مقاله' : 'صفحه')}}
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card border mb-5">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">
                            <a href="{{ url('admin/posts/'. $post_type .'/') }}">All {{ $post_type }} {{ \App\Models\Post::where('post_type', $post_type)->count() }} |</a> |
                            <a href="{{ url('admin/posts/'. $post_type .'/?status=draft') }}">Draft ({{ \App\Models\Post::where('post_type', $post_type)->where('post_status', 'draft')->count() }})</a> |
                            <a href="{{ url('admin/posts/'. $post_type .'/?status=trash') }}">Trash ({{ \App\Models\Post::where('post_type', $post_type)->where('post_status', 'trash')->count() }})</a>
                        </span>

                    </h3>
                </div>

                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4" style="direction: ltr;text-align:left">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 rounded-start">#</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Brand</th>
                                <th>Edit</th>
                                <th>Trash</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr class="post-index-tr">
                                    <td>
                                        <div class="d-flex align-items-center mb-8">
                                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                            @if($post->post_type == 'product')
                                            <img src="{{$post->image()}}" alt="product image" class="rounded-circle" width="100" height="100">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex-grow-1">
                                            <a href="{{ url('admin/posts/edit/' . $post->ID) }}" class="text-gray-800 text-hover-primary fw-bolder fs-4">
                                                {{ $i }} - {{ $post->post_title }}
                                                @if($post->post_status !== 'publish')
                                                    <span class="p-2 bg-{{ $status[$post->post_status] }} border border-light rounded-pill text-white">{{ $post->post_status }}</span>
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach($post->Categories()->where('taxonomy', $post_type . '_category') as $cat)
                                            <a href="{{ $request->fullUrlWithQuery(['category_ID' => $cat->ID]) }}">{{ $cat->name }}, </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($post->Categories()->where('taxonomy', 'product_brand') as $cat)
                                            <a href="{{ $request->fullUrlWithQuery(['category_ID' => $cat->ID]) }}">{{ $cat->name }}, </a>
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        <a href="{{ url('admin/posts/edit/' . $post->ID) }}" class="btn btn-success btn-sm text-white">Edit</a>
                                    </td>
                                    <td>
                                        @if($post->post_status == 'trash')
                                            <a href="{{ url('admin/posts/permanently-remove/' . $post->ID) }}" class="btn btn-danger btn-sm text-white">Permanently Remove</a>
                                        @else
                                            <a href="{{ url('admin/posts/trash/' . $post->ID) }}" class="btn btn-danger btn-sm text-white">Trash</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ $post->url() }}" rel="bookmark" target="_blank" class="btn btn-primary btn-sm text-white">View</a>
                                    </td>
                                </tr>
                                @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

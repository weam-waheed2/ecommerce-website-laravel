@extends('admin.layouts.master')
@section('title', $title)

@section('content')
<form method="POST">
    <div class="row">
        <div class="col-xl-9">
            <div class="card border">
                <div class="card-body p-12">
                    @csrf
                    @if($edit)
                        @php($post_type = $post->post_type)
                        <input type="hidden" name="post[ID]" value="{{ $post->ID }}">
                    @else
                        <input type="hidden" name="post[post_type]" value="{{ $post_type }}">
                    @endif
                    <div class="mb-0">
                        <div class="row gx-10 mb-5">
                            <div class="col-lg-12">
                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Title</label>
                                <div class="mb-5">
                                    <input type="text" class="form-control form-control-solid" placeholder="Title" name="post[post_title]" value="{{ $edit ? $post->post_title : '' }}"/>
                                </div>
                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Slug</label>
                                <div class="mb-5">
                                    <input type="text" class="form-control form-control-solid" placeholder="Slug" name="post[post_slug]" value="{{ $edit ? $post->post_slug : '' }}"/>
                                </div>
                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Description</label>
                                <div class="mb-5">
                                    <textarea class="form-control form-control-solid tinymce" rows="3" name="post[post_content]">{{ $edit ? $post->post_content : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">Data</h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#seo-tab">Seo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#gallery-tab">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#faq-tab">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#post-settings-tab">Main Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#event-tab">Event</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="seo-tab" role="tabpanel">
                            @include('admin.posts.meta.seo', ['seo' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'seo') : null])
                        </div>

                        <div class="tab-pane fade" id="gallery-tab" role="tabpanel">
                            @include('admin.posts.meta.gallery', ['gallery' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'gallery') : null])
                        </div>
                        <div class="tab-pane fade" id="faq-tab" role="tabpanel">
                            @include('admin.posts.meta.faq', ['faq' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'faq') : null])
                        </div>
                        <div class="tab-pane fade" id="post-settings-tab" role="tabpanel">
                            @include('admin.posts.meta.post-settings', ['post_settings' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'post_settings') : null])
                        </div>

                        <div class="tab-pane fade" id="event-tab" role="tabpanel">
                            @include('admin.posts.meta.event', ['event' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'event') : null])
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">Data</h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#itinerary-tab">Itinerary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tour-info-tab">Tour Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#highlights-tab">Highlights</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="itinerary-tab" role="tabpanel">
                            @include('admin.posts.meta.tours.itinerary', ['itinerary' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'itinerary') : null])
                        </div>

                        <div class="tab-pane fade" id="tour-info-tab" role="tabpanel">
                            @include('admin.posts.meta.tours.tour-info', ['info' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'tour_info') : null])
                        </div>

                        <div class="tab-pane fade" id="highlights-tab" role="tabpanel">
                            @include('admin.posts.meta.tours.highlights', ['highlights' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'highlights') : null])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            @foreach(config('admin.sidebar') as $sidebarItem)
                @if(isset($sidebarItem['post_type']) && $sidebarItem['post_type'] == $post_type && isset($sidebarItem['terms']) && is_array($sidebarItem['terms']))
                    @foreach($sidebarItem['terms'] as $term)
                        <div class="card mb-5">
                            <div class="card-body p-5">
                                <span class="card-label fw-bolder fs-3 mb-1">{{ $term['name'] }}</span>
                                <div class="separator separator-dashed my-4"></div>
                                <div class="scroll-y mh-200px mh-lg-325px">
                                    @include('admin.terms.items.checkbox',['terms' => \App\Models\Term::where('taxonomy', $term['taxonomy'])->where('parent', 0)->get(), 'depth' => 0, 'checked' => $edit ? \App\Models\TermRelationship::where('post_ID', $post->ID)->pluck('term_ID')->toArray() : []])
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
            <div class="card">
                <div class="card-body p-5">
                    <div class="mb-10">
                        <select class="form-select form-select-solid" name="post[post_status]">
                            <option {{ $edit && $post->post_status == 'publish' ? 'selected' : '' }} value="publish">Publish</option>
                            <option {{ $edit && $post->post_status == 'draft' ? 'selected' : '' }} value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="separator separator-dashed mb-8"></div>
                    <div class="image-input image-input-outline w-100 text-center">
                        <img class="image-input-wrapper w-125px h-125px" id="featured-image" src="{{ $edit && !empty($post->post_image) ? upload_url($post->post_image) : \App\Models\Media::default() }}" style="object-fit: cover;">
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-bs-toggle="tooltip" title="Change avatar" id="change-featured-image">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <input type="hidden" name="post[post_image]" value="{{ $edit ? $post->post_image : '' }}" id="featured-image-value"/>
                        </label>
                    </div>
                    <div class="separator separator-dashed my-8"></div>

                    <div class="mb-0">
                        <div class="row mb-5">
                            <div class="col">
                                <a href="#" class="btn btn-light btn-active-light-primary w-100" id="">Preview</a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-light btn-active-light-primary w-100">Download</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="currentColor" />
                                    <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="currentColor" />
                                </svg>
                            </span>
                            Update Post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

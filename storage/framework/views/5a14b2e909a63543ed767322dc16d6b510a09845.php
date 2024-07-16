
<?php $__env->startSection('title', $edit ? 'تعديل' : 'إضافة جديد'); ?>

<?php $__env->startSection('content'); ?>
<form method="POST">
    <div class="row">
        <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8"><?php echo e($edit ? 'تعديل' : 'إضافة جديد'); ?></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                        لوحة التحكم
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <?php echo e($edit ? 'تعديل' : 'إضافة جديد'); ?>

                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="card border">
                <div class="card-body p-12">
                    <?php echo csrf_field(); ?>
                    <?php if($edit): ?>
                        <?php ($post_type = $post->post_type); ?>
                        <input type="hidden" name="post[ID]" value="<?php echo e($post->ID); ?>">
                    <?php else: ?>
                        <input type="hidden" name="post[post_type]" value="<?php echo e($post_type); ?>">
                    <?php endif; ?>
                    <input type="hidden" name="meta[primary_category]" id="primary_category" value="<?php echo e($edit && $post->PrimaryCategory() ? $post->PrimaryCategory()->ID : ''); ?>">
                    <div class="mb-0">
                        <div class="row gx-10 mb-3" style="direction:ltr">
                            <div class="col-lg-12">
                                <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">
                                    العنوان
                                </label>
                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-solid" placeholder="العنوان" name="post[post_title]" value="<?php echo e($edit ? $post->post_title : ''); ?>"/>
                                </div>
                                <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">
                                    الرابط
                                </label>
                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-solid" placeholder="الرابط" name="post[post_slug]" value="<?php echo e($edit ? $post->post_slug : ''); ?>"/>
                                </div>
                                <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">
                                    الوصف
                                </label>
                                <div class="mb-3">
                                    <textarea class="tinymce" id="editor" name="post[post_content]"><?php echo $edit ? $post->post_content : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border mt-4">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">
                        البيانات
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0" style="direction: ltr;">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#seo-tab">Seo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#faq-tab">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#data-tab">Data of Product</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent" style="direction: ltr;text-align:left">
                        <div class="tab-pane fade show active" id="seo-tab" role="tabpanel">
                            <?php echo $__env->make('admin.posts.meta.seo', ['seo' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'seo') : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="tab-pane fade" id="faq-tab" role="tabpanel">
                            <?php echo $__env->make('admin.posts.meta.faq', ['faq' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'faq') : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php if($post_type == 'product'): ?>
                        <div class="tab-pane fade" id="data-tab" role="tabpanel">
                            <?php echo $__env->make('admin.posts.meta.data-product', ['data' => $edit ? \App\Models\PostMeta::getMeta($post->ID,'data') : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div  style=" position: sticky; top: 120px; ">
            <div class="card border">
                <div class="card-body p-5">
                    <div class="mb-10">
                        <select class="form-select form-select-solid" name="post[post_status]">
                            <option <?php echo e($edit && $post->post_status == 'publish' ? 'selected' : ''); ?> value="publish">Publish</option>
                            <option <?php echo e($edit && $post->post_status == 'draft' ? 'selected' : ''); ?> value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="separator separator-dashed mb-8"></div>
                    <div class="image-input image-input-outline w-100 text-center">
                        <img class="image-input-wrapper w-125px h-125px my-2" style="width:100px" id="featured-image" src="<?php echo e($edit && !empty($post->post_image) ? asset('assets/uploads/'.$post->post_image) : \App\Models\Media::default()); ?>" style="object-fit: cover;">
                        <label class="btn btn-icon btn-circle btn-primary w-100 h-25px shadow" data-bs-toggle="tooltip" title="Change avatar" id="change-featured-image">
                            إضافة صورة 
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16"><path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/><path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/></svg>
                            <input type="hidden" name="post[post_image]" value="<?php echo e($edit ? $post->post_image : ''); ?>" id="featured-image-value"/>
                        </label>
                    </div>
                    <div class="separator separator-dashed my-8"></div>

                    <div class="mb-0">
                        <?php if($edit): ?>
                        <div class="row mb-3">
                            <div class="col">
                                <a href="<?php echo e($post->url()); ?>" class="btn btn-dark text-light w-100" target="_blank">
                                    عرض
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-success w-100">
                            <?php echo e($edit ? 'تعديل' : 'إضافة جديد'); ?>

                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="currentColor" />
                                    <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="currentColor" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = config('sidebar'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($sidebarItem['post_type']) && $sidebarItem['post_type'] == $post_type && isset($sidebarItem['terms']) && is_array($sidebarItem['terms'])): ?>
                    <?php $__currentLoopData = $sidebarItem['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card border mb-3">
                            <div class="card-body p-5">
                                <span class="card-label fw-bolder fs-3 mb-1"><?php echo e($term['name']); ?></span>
                                <div class="separator separator-dashed my-4"></div>
                                <div class="scroll-y mh-200px mh-lg-325px">
                                    <?php echo $__env->make('admin.terms.items.checkbox',['terms' => \App\Models\Term::where('taxonomy', $term['taxonomy'])->where('parent', 0)->get(), 'depth' => 0, 'checked' => $edit ? \App\Models\TermRelationship::where('post_ID', $post->ID)->pluck('term_ID')->toArray() : []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="card border my-5">
                    <div class="card-body p-5">
                        <span class="card-label fw-bolder fs-3 mb-1">Template</span>
                        <div class="separator separator-dashed my-4"></div>
                        <div class="scroll-y mh-200px mh-lg-325px">
                            <select class="form-select form-select-solid" data-control="select2" name="meta[template]" onchange="$(this).val() == 'filter-page' ? $(this).val() == $('#filter-template-sub-items').show() : $(this).val() == $('#filter-template-sub-items').hide();">
                                <option value="">No Template</option>
                                <?php $__currentLoopData = array_diff(scandir(resource_path('views/templates')), array('.', '..')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($edit && $post->meta('template') == explode('.', $temp)[0] ? 'selected' : ''); ?> value="<?php echo e(explode('.', $temp)[0]); ?>"><?php echo e(explode('.', $temp)[0]); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div id="filter-template-sub-items" style="display: <?php echo e(isset($post) && $post->meta('template') == 'filter-page' ? 'block' : 'none'); ?>;">
                            <div class="separator separator-dashed my-4"></div>
                            <span class="card-label fw-bolder fs-3 mb-1">Filter Category</span>
                            <select class="form-select form-select-solid" data-control="select2" name="meta[filter_category][]" multiple>
                                <?php $__currentLoopData = \App\Models\Term::where('taxonomy', 'product_category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($edit && in_array($term->ID, is_array(json_decode($post->meta('filter_category'), 1)) ? json_decode($post->meta('filter_category'), 1) : [])  ? 'selected' : ''); ?> value="<?php echo e($term->ID); ?>"><?php echo e($term->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="separator separator-dashed my-4"></div>
                            <span class="card-label fw-bolder fs-3 mb-1">Filter Pages</span>
                            <select class="form-select form-select-solid" data-control="select2" name="meta[filter_pages][]" multiple>
                                <?php $__currentLoopData = \App\Models\Post::where('post_type', 'page')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($edit && is_array(json_decode($post->meta('filter_pages'), 1)) && in_array($page->ID, json_decode($post->meta('filter_pages'), 1)) ? 'selected' : ''); ?> value="<?php echo e($page->ID); ?>"><?php echo e($page->post_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="separator separator-dashed my-4"></div>
                            <span class="card-label fw-bolder fs-3 mb-1">Duration Limit</span>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="number" class="form-select-solid" name="meta[duration_limit_min]" value="<?php echo e($edit && $post->meta('duration_limit_min') ? $post->meta('duration_limit_min') : ''); ?>" placeholder="Min"/>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" class="form-select-solid" name="meta[duration_limit_max]" value="<?php echo e($edit && $post->meta('duration_limit_max') ? $post->meta('duration_limit_max') : ''); ?>" placeholder="Max"/>
                                </div>
                            </div>
                            <select class="form-select form-select-solid" data-control="select2" name="meta[filter_pages][]" multiple>
                                <?php $__currentLoopData = \App\Models\Post::where('post_type', 'page')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($edit && is_array(json_decode($post->meta('filter_pages'), 1)) && in_array($page->ID, json_decode($post->meta('filter_pages'), 1)) ? 'selected' : ''); ?> value="<?php echo e($page->ID); ?>"><?php echo e($page->post_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="card border my-5">
                    <div class="card-body p-5">
                        <span class="card-label fw-bolder fs-3 mb-1">Parent</span>
                        <div class="separator separator-dashed my-4"></div>
                        <div class="scroll-y mh-200px mh-lg-325px">
                            <select class="form-select form-select-solid" data-control="select2" name="post[post_parent]">
                                <option value="0">No Parent</option>
                                <?php $__currentLoopData = \App\Models\Post::where('post_type', 'page')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($edit && $post->post_parent == $p->ID ? 'selected' : ''); ?> value="<?php echo e($p->ID); ?>"><?php echo e($p->post_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('#change-featured-image').click(function (){
        GxMediaLibrary.multiple(false);
        GxMediaLibrary.open();
        GxMediaLibrary.insert(function (data) {
            console.log(data);
            $.each(data, function( index, value ) {
                $('#featured-image-value').val(value.name);
                $('#featured-image').attr('src', value.url);
                GxMediaLibrary.close();
            });
        });
    });

    $('.form-check[data-taxonomy="<?php echo e($post_type); ?>_category"]').each(function (){
        var catValue = $(this).find('input').val();
        if(catValue == <?php echo e($edit && $post->PrimaryCategory() ? $post->PrimaryCategory()->ID : 0); ?>){
            $(this).find('span').css('color', '#39a931').toggleClass('text-gray-700');
        }else{
            $(this).find('span').append('<br><a href="javascript:void(0)" onclick="$(`#primary_category`).val('+catValue+');$(this).parent().find(`a`).remove()">Make Primary</a>');
        }
    })
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/admin/posts/add.blade.php ENDPATH**/ ?>
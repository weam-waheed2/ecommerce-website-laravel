
<?php $__env->startSection('title', $taxonomy); ?>

<?php $__env->startSection('content'); ?>
<form method="POST">
    <?php echo csrf_field(); ?>
    <?php if($edit): ?>
        <input type="hidden" value="<?php echo e($term->ID); ?>" name="term[ID]">
    <?php endif; ?>
    <input type="hidden" value="<?php echo e($taxonomy); ?>" name="term[taxonomy]">
    <div class="row">
        <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8"><?php echo e($taxonomy); ?></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                        لوحة التحكم
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <?php echo e($taxonomy); ?>

                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card border mb-5">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1"><?php echo e($edit ? 'Edit' : 'Add New'); ?> <?php echo e($taxonomy); ?></span>
                    </h3>
                </div>
                <div class="card-body py-3" style="direction:ltr">
                    
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-solid" placeholder="Name" name="term[name]" value="<?php echo e($edit ? $term->name : ''); ?>"/>
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-solid" placeholder="Slug" name="term[slug]" value="<?php echo e($edit ? $term->slug : ''); ?>"/>
                    </div>
                    
                    <div class="mb-3">
                        <select class="form-control form-control-solid" name="term[parent]" data-control="select2">
                            <option value="0">No Parent</option>
                            <?php echo $__env->make('admin.terms.items.select',['terms' => \App\Models\Term::where('taxonomy', $taxonomy)->where('parent', 0)->get(), 'depth' => 0, 'selected' => $edit ? $term->parent : 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <select class="form-control form-control-solid" name="term[post_ID]" data-control="select2">
                            <option value="0">No Redirect</option>
                            <?php $__currentLoopData = \App\Models\Post::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($edit && $term->post_ID == $post->ID ? 'selected' : ''); ?> value="<?php echo e($post->ID); ?>"><?php echo e($post->post_title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="separator separator-dashed mb-8"></div>
                    <div class="image-input image-input-outline w-100 text-center mb-5">
                        <img class="image-input-wrapper w-125px h-125px" id="featured-image" src="<?php echo e($edit && !empty($term->image) ? asset('assets/imgs/'.$term->image) : \App\Models\Media::default()); ?>" style="object-fit: cover;">

                        <label class="btn btn-icon btn-circle btn-primary w-100 h-25px shadow" data-bs-toggle="tooltip" title="Change avatar" id="change-featured-image">
                            إضافة صورة 
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16"><path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/><path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/></svg>
                            <input type="hidden" name="term[image]" value="<?php echo e($edit ? $term->image : ''); ?>" id="featured-image-value"/>
                        </label>
                    </div>
                    <div class="separator separator-dashed my-8"></div>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary w-100">
                            <?php echo e($edit ? 'تعديل' : 'إضافة جديد'); ?>

                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="currentColor" />
                                    <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="currentColor" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card border mb-5">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">All <?php echo e($taxonomy); ?></span>
                    </h3>
                </div>

                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4" style="direction: ltr;text-align:left">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 rounded-start">#</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = \App\Models\Term::where('taxonomy', $taxonomy)->where('parent', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('admin.terms.items.table', ['term' => $term, 'depth' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/terms/list.blade.php ENDPATH**/ ?>
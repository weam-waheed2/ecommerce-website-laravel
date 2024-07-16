
<?php $__env->startSection('title', $post_type == 'product' ? 'المنتجات' : ($post_type == 'post' ? 'المقالات' : 'الصفحات')); ?>
<?php
    $i = 1;
    $status = [
        'publish'   => 'success',
        'draft'     => 'warning',
        'trash'     => 'danger'
    ];
?>
<?php $__env->startSection('content'); ?>
    <style>
        .row-actions{
            position: relative;
            left: -9999em;
        }
        .post-index-tr:hover .row-actions{
            position: static;
        }
      </style>  
        <?php $__currentLoopData = \App\Models\Post::where('post_title', 'LIKE', "%Egypt Itinerary%")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            [category img="<?php echo e($short->post_image); ?>" link="<?php echo e($short->url()); ?>" title="<?php echo e($short->post_title); ?>"]
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <div class="row">
        <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8"><?php echo e($post_type == 'product' ? 'المنتجات' : ($post_type == 'post' ? 'المقالات' : 'الصفحات')); ?></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                        لوحة التحكم
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <?php echo e($post_type == 'product' ? 'المنتجات' : ($post_type == 'post' ? 'المقالات' : 'الصفحات')); ?>

                                </li>
                            </ol>
                            <div class="mt-3">
                                <a href="<?php echo e(url('admin/posts/'.$post_type.'/add')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    اضافة <?php echo e($post_type == 'product' ? 'منتج' : ($post_type == 'post' ? 'مقاله' : 'صفحه')); ?>

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
                            <a href="<?php echo e(url('admin/posts/'. $post_type .'/')); ?>">All <?php echo e($post_type); ?> <?php echo e(\App\Models\Post::where('post_type', $post_type)->count()); ?> |</a> |
                            <a href="<?php echo e(url('admin/posts/'. $post_type .'/?status=draft')); ?>">Draft (<?php echo e(\App\Models\Post::where('post_type', $post_type)->where('post_status', 'draft')->count()); ?>)</a> |
                            <a href="<?php echo e(url('admin/posts/'. $post_type .'/?status=trash')); ?>">Trash (<?php echo e(\App\Models\Post::where('post_type', $post_type)->where('post_status', 'trash')->count()); ?>)</a>
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
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="post-index-tr">
                                    <td>
                                        <div class="d-flex align-items-center mb-8">
                                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex-grow-1">
                                            <a href="<?php echo e(url('admin/posts/edit/' . $post->ID)); ?>" class="text-gray-800 text-hover-primary fw-bolder fs-4">
                                                <?php echo e($i); ?> - <?php echo e($post->post_title); ?>

                                                <?php if($post->post_status !== 'publish'): ?>
                                                    <span class="p-2 bg-<?php echo e($status[$post->post_status]); ?> border border-light rounded-pill text-white"><?php echo e($post->post_status); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $post->Categories()->where('taxonomy', $post_type . '_category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e($request->fullUrlWithQuery(['category_ID' => $cat->ID])); ?>"><?php echo e($cat->name); ?>, </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $post->Categories()->where('taxonomy', 'product_brand'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e($request->fullUrlWithQuery(['category_ID' => $cat->ID])); ?>"><?php echo e($cat->name); ?>, </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    
                                    <td>
                                        <a href="<?php echo e(url('admin/posts/edit/' . $post->ID)); ?>" class="btn btn-success btn-sm text-white">Edit</a>
                                    </td>
                                    <td>
                                        <?php if($post->post_status == 'trash'): ?>
                                            <a href="<?php echo e(url('admin/posts/permanently-remove/' . $post->ID)); ?>" class="btn btn-danger btn-sm text-white">Permanently Remove</a>
                                        <?php else: ?>
                                            <a href="<?php echo e(url('admin/posts/trash/' . $post->ID)); ?>" class="btn btn-danger btn-sm text-white">Trash</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e($post->url()); ?>" rel="bookmark" target="_blank" class="btn btn-primary btn-sm text-white">View</a>
                                    </td>
                                </tr>
                                <?php ($i++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/posts/list.blade.php ENDPATH**/ ?>
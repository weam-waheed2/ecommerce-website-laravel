<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('elements.seo', ['seo' => $post->seo()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-header breadcrumb-wrap">
        <div class="container" style="max-width: 1610px;">
            <?php echo $__env->make('elements.breadcrumb', ['post' => $post, 'position' => 0, 'is_parent' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <h1 class="mb-15">
                        <?php echo e($post->post_title); ?>

                    </h1>
                </div>
            </div>
        </div>
    </div>

    


    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <?php echo \Vedmant\LaravelShortcodes\Facades\Shortcodes::render($post->post_content); ?>

            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="banner-img">
                    <div class="banner-text">
                         <h4>Safana Brand</h4>
                        <div class="title">Brand in Siam Ocean</div>
                        <a class="btn btn-xs" href="<?php echo e(\App\Models\Post::find(7)->url()); ?>">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="banner-img">
                    <div class="banner-text">
                         <h4>Fiorella Brand</h4>
                        <div class="title">Brand in Siam Ocean</div>
                        <a class="btn btn-xs" href="<?php echo e(\App\Models\Post::find(8)->url()); ?>">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3><span style="color: #00984d;">Featured</span> Categories</h3>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
            </div>
            <div class="carausel-6-columns-cover position-relative">
                <div class="carausel-6-columns" id="carausel-6-columns">
                    <?php $__currentLoopData = App\Models\Term::where('taxonomy','product_category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-2 mx-1 <?php echo e($term->bg); ?> wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href='<?php echo e($term->url()); ?>'><img src="<?php echo e(asset('assets/imgs/' . $term->image)); ?>" alt="<?php echo e($term->name); ?>" /></a>
                        </figure>
                        <h6><a href='<?php echo e($term->url()); ?>'><?php echo e($term->name); ?></a></h6>
                        <span><?php echo e($term->count()); ?> items</span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container faq">
        <?php if ($__env->exists('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])) echo $__env->make('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/templates/private-product.blade.php ENDPATH**/ ?>
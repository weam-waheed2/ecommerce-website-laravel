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
    <section class="row align-items-center mb-50">
        <div class="col-lg-4">
            <img src="<?php echo e(asset('assets/imgs/slider/inspector.png')); ?>" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
        </div>
        <div class="col-lg-8">
            <div class="pl-25">
                <?php echo \Vedmant\LaravelShortcodes\Facades\Shortcodes::render($post->post_content); ?>

                
            </div>
        </div>
    </section>
</div>

<div class="container mb-50">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-24 m-auto">
            <div class="featured-card">
                <img src="<?php echo e(asset('assets/imgs/theme/icons/vision.png')); ?>" alt="">
                <h4>Our Vision</h4>
                <p>Achieving excellence in delivering our products with specifications and quality that satisfy both customers and end consumers, and are compliant with local and international quality standards, entails developing our production and marketing teams. Additionally, it involves utilizing the best raw materials for our products.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-24 m-auto">
            <div class="featured-card">
                <img src="<?php echo e(asset('assets/imgs/theme/icons/mission.png')); ?>" alt="">
                <h4>Our Message</h4>
                <p>At Siam Ocean, we are committed to providing the highest quality products according to the required standards and in compliance with international and local specifications. We hold full credibility in all our dealings with customers, ensuring that our products meet their expectations.</p>
            </div>
        </div>
        <hr class="mt-15">
    </div>
</div>

<div class="container">
    <div class="row product-grid-4">
        <div class="col-xl-12">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Our Popular Products</h3>
            </div>
        </div>
        <?php $__currentLoopData = \App\Models\Post::where('post_type', 'product')->where('post_status', 'publish')->limit(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('elements.product-list', ['post' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="container faq">
    <?php if ($__env->exists('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])) echo $__env->make('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/templates/about.blade.php ENDPATH**/ ?>
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

    <div class="container faq">
      <?php if ($__env->exists('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])) echo $__env->make('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/single-page.blade.php ENDPATH**/ ?>
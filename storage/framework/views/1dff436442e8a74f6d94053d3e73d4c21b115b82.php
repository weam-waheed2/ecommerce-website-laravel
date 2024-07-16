<?php if(isset($posts) && !isset($post)): ?>
<div class="container">
    <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('elements.product-list', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php elseif(isset($post)): ?>

    <div class="<?php echo e(isset($col) ? $col : 'col-lg-4 col-12 col-sm-6'); ?> tour-list-item"  <?php echo isset($i) && $i > 19 ? 'style="display: none;"' : 'display: grid'; ?>

        data-terms="<?php echo e(implode(',', $post->Categories()->pluck('ID')->toArray())); ?>">
        <div class="product-cart-wrap mb-30 shadow-sm <?php echo e(!isset($i) ? 'wow animate__animated animate__fadeInUp' : ''); ?>" data-wow-delay="0">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href='<?php echo e($post->url()); ?>'>
                        <img class="default-img" src="<?php echo e($post->image()); ?>" alt="" />
                    </a>
                </div>
                <div class="product-action-1">
                    <a aria-label="View" class="action-btn" href='<?php echo e($post->url()); ?>'><i class="fi-rs-eye"></i></a>
                </div>
                <div class="product-badges product-badges-position product-badges-mrg">
                    <span class="hot"></span>
                </div>
            </div>
            <div class="product-content-wrap">
                <div class="product-category">
                    Net Weight : 
                    <div class="badge bg-light border text-dark mx-2" style="direction: ltr"><?php echo e($post->meta('data') ? json_decode($post->meta('data'), true)['weight'] : ''); ?></div>
                </div>
                <h2><a href='<?php echo e($post->url()); ?>' id="title-product"><?php echo e(\Vedmant\LaravelShortcodes\Facades\Shortcodes::render($post->post_title)); ?></a></h2>
                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 100%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-small text-muted">By <a href='/vendor-details-1'>Siam Ocean</a></span>
                </div>
                <div class="product-card-bottom">
                    <div class="add-cart">
                        <a class='add' href='<?php echo e($post->url()); ?>'>View </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/elements/product-list.blade.php ENDPATH**/ ?>
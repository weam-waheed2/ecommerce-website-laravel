<div class="breadcrumb">
    <div class="container">
        <div itemscope="" itemtype="http://schema.org/BreadcrumbList" class="p-0 ms-0">
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="ms-0">
                <a itemprop="item" href="<?php echo e(url('/')); ?>" itemprop="name"><i class="fi-rs-home mr-5"></i>Home </a>
                <meta itemprop="position" content="1">
            </span>
            <?php if($post['post_type'] == 'page' && !empty($post['post_parent'])): ?>
                <?php $__currentLoopData = $post->ParentList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($parent)): ?>
                        <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo e($parent->url()); ?>"><span itemprop="name"><?php echo e($parent->post_title); ?></span></a>
                            <meta itemprop="position" content="1">
                        </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php $__currentLoopData = $post->CategoryList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($category)): ?>
                        <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo e($category->url()); ?>"><span itemprop="name"><?php echo e($category->name); ?></span></a>
                            <meta itemprop="position" content="1">
                        </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <span class="breadcrumb_last"><?php echo e($post['post_title']); ?></span>
        </div>
    </div>
</div>

<?php /**PATH C:\Users\user\Desktop\projects\products-site\app\resources\views/elements/breadcrumb.blade.php ENDPATH**/ ?>
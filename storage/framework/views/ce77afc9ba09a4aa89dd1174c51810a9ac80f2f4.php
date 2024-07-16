<?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option <?php echo e($term->ID == $selected ? 'selected' : ''); ?> value="<?php echo e($term->ID); ?>"><?php echo e(str_repeat('—', $depth)); ?> <?php echo e($term->name); ?></option>
    <?php if(count($term->childs())): ?>
        <?php echo $__env->make('admin.terms.items.select',['terms' => $term->childs(), 'depth' => $depth + 1, 'selected' => $selected], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/terms/items/select.blade.php ENDPATH**/ ?>
<?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-3 justify-content-start" data-taxonomy="<?php echo e($term->taxonomy); ?>">
        <input class="form-check-input" <?php echo e(in_array($term->ID, $checked) ? 'checked' : ''); ?> type="checkbox" value="<?php echo e($term->ID); ?>" name="terms[]"/>
        <span class="form-check-label fs-3 text-gray-700"><?php echo e(str_repeat('—', $depth)); ?> <?php echo e($term->name); ?></span>
    </label>
    <?php if(count($term->childs())): ?>
        <?php echo $__env->make('admin.terms.items.checkbox',['terms' => $term->childs(), 'depth' => $depth + 1, 'checked' => $checked], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/terms/items/checkbox.blade.php ENDPATH**/ ?>
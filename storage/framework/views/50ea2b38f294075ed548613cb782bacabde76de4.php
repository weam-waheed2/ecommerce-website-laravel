<tr>
    <td>
        <div class="d-flex align-items-center mb-8">
            <span class="bullet bullet-vertical h-40px bg-success"></span>
            <div class="flex-grow-1 ms-3">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-4"><?php echo e(str_repeat('—', $depth)); ?> <?php echo e($term->name); ?></a>
            </div>
        </div>
    </td>
    <td>
        <a href="<?php echo e(url('admin/terms/edit/' . $term->ID)); ?>" class="btn btn-success btn-sm text-white">Edit</a>
    </td>
    <td>
    <a href="<?php echo e(url('admin/terms/delete/' . $term->ID)); ?>" class="btn btn-danger btn-sm text-white">Delete</a>
    </td>
</tr>
<?php if(count($term->childs())): ?>
    <?php $__currentLoopData = $term->childs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('admin.terms.items.table',['term' => $child, 'depth' => $depth + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/admin/terms/items/table.blade.php ENDPATH**/ ?>
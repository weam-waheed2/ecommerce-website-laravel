<?php if(!empty($data) && is_array($data = json_decode($data, 1))): ?>
    <?php ($data = $data); ?>
<?php endif; ?>


<div class="mb-4">
    <label class="mb-4">Product Weight</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo e(isset($data['weight']) && !empty($data['weight']) ? $data['weight'] : ''); ?>" name="meta[data][weight]">
</div>
<div class="mb-4">
    <label class="mb-4">Unit Per Case</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo e(isset($data['case']) && !empty($data['case']) ? $data['case'] : ''); ?>" name="meta[data][case]">
</div>
<div class="mb-4">
    <label class="mb-4">Unit Per Container</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo e(isset($data['container']) && !empty($data['container']) ? $data['container'] : ''); ?>" name="meta[data][container]">
</div><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/posts/meta/data-product.blade.php ENDPATH**/ ?>
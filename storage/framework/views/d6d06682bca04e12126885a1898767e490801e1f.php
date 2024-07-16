<?php ($social = \App\Models\Option::get('social')); ?>
<?php if($social): ?>
    <?php ($social = json_decode($social,1)); ?>
<?php endif; ?>
<form method="POST">
    <?php echo csrf_field(); ?>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Facebook</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][facebook]" value="<?php echo e(@$social['facebook']); ?>"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Twitter</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][twitter]" value="<?php echo e(@$social['twitter']); ?>"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Instagram</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][instagram]" value="<?php echo e(@$social['instagram']); ?>"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Youtube</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][youtube]" value="<?php echo e(@$social['youtube']); ?>"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Pinterest</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][pinterest]" value="<?php echo e(@$social['pinterest']); ?>"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Linkedin</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][linkedin]" value="<?php echo e(@$social['linkedin']); ?>"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Tripadvisor</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][tripadvisor]" value="<?php echo e(@$social['tripadvisor']); ?>"/>
    </div>
    <div class="mb-5">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>
<?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/settings/items/social.blade.php ENDPATH**/ ?>
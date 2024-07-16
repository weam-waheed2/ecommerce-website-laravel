<?php if(!empty($seo) && is_array($seo = json_decode($seo, 1))): ?>
    <?php ($seo = $seo); ?>
<?php endif; ?>


<div class="mb-4">
    <label class="mb-4">Main Keyword</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo isset($seo['keyword']) && !empty($seo['keyword']) ? htmlentities($seo['keyword']) : ''; ?>" name="meta[seo][keyword]">
</div>
<div class="mb-4">
    <label class="mb-4">Seo Title</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo isset($seo['title']) && !empty($seo['title']) ? htmlentities($seo['title']) : ''; ?>" name="meta[seo][title]">
</div>
<div class="mb-4">
    <label class="mb-4">Meta Description</label>
    <textarea data-kt-autosize="true" class="form-control form-control-solid" name="meta[seo][description]"><?php echo isset($seo['description']) && !empty($seo['description']) ? $seo['description'] : ''; ?></textarea>
</div>
<div class="mb-4">
    <label class="mb-4">Meta Keywords</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo isset($seo['meta_keywords']) && !empty($seo['meta_keywords']) ? htmlentities($seo['meta_keywords']) : ''; ?>" name="meta[seo][meta_keywords]">
</div>

<div class="mb-4">
    <label class="mb-4">Canonical</label>
    <input type="url" class="form-control form-control-solid" value="<?php echo isset($seo['canonical']) && !empty($seo['canonical']) ? htmlentities($seo['canonical']) : ''; ?>" name="meta[seo][canonical]">
</div>

<div class="mb-4">
    <label class="mb-4">Facebook Title</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo isset($seo['facebook_title']) && !empty($seo['facebook_title']) ? htmlentities($seo['facebook_title']) : ''; ?>" name="meta[seo][facebook_title]">
</div>
<div class="mb-4">
    <label class="mb-4">Facebook Description</label>
    <textarea data-kt-autosize="true" class="form-control form-control-solid" name="meta[seo][facebook_description]"><?php echo isset($seo['facebook_description']) && !empty($seo['facebook_description']) ? $seo['facebook_description'] : ''; ?></textarea>
</div>


<div class="mb-4">
    <label class="mb-4">Twitter Title</label>
    <input type="text" class="form-control form-control-solid" value="<?php echo isset($seo['twitter_title']) && !empty($seo['twitter_title']) ? htmlentities($seo['twitter_title']) : ''; ?>" name="meta[seo][twitter_title]">
</div>
<div class="mb-4">
    <label class="mb-4">Twitter Description</label>
    <textarea data-kt-autosize="true" class="form-control form-control-solid" name="meta[seo][twitter_description]"><?php echo isset($seo['twitter_description']) && !empty($seo['twitter_description']) ? $seo['twitter_description'] : ''; ?></textarea>
</div>

<?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/posts/meta/seo.blade.php ENDPATH**/ ?>
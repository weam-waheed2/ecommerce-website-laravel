<?php if(isset($seo) && is_array($seo)): ?>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="en" />
    <meta name="googlebot" content="follow" />
    <meta name="robots" content="index, follow">
    <meta name="robots" content="max-image-preview:large">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1">

    <title><?php echo $seo['title']; ?></title>
    <meta name="description" content="<?php echo $seo['description']; ?>"/>
    <meta name="keywords" content="<?php echo $seo['keywords']; ?>"/>

    <?php if(!empty($seo['canonical'])): ?>
        <link rel="canonical" href="<?php echo $seo['canonical']; ?>"/>
        <meta property="og:url" content="<?php echo e($seo['canonical']); ?>" />
    <?php endif; ?>

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="<?php echo e(isset($seo['twitter:description']) && !empty($seo['twitter:description']) ? $seo['twitter:description'] : $seo['description']); ?>"/>
    <meta name="twitter:title" content="<?php echo isset($seo['twitter:title']) && !empty($seo['twitter:title']) ? $seo['twitter:title'] : $seo['title']; ?>" />
    <meta name="twitter:image" content="<?php echo $seo['image']; ?>" />
    <meta name="twitter:creator" content="@TripsInEgypt1" />

    <?php if(isset($seo['og:type'])): ?>
    <meta property="og:type" content="<?php echo $seo['og:type']; ?>"/>
    <?php endif; ?>

    <meta property="og:title" content="<?php echo e(isset($seo['og:title']) ? $seo['og:title'] : $seo['title']); ?>" />
    <meta property="og:description" content="<?php echo e(isset($seo['og:description']) ? $seo['og:description'] : $seo['description']); ?>" />

    <meta property="og:site_name" content="<?php echo e(\App\Models\Option::get('site_title')); ?>" />
    <meta property="og:image" content="<?php echo $seo['image']; ?>" />

<?php endif; ?>
<?php /**PATH C:\Users\user\Desktop\projects\products-site\app\resources\views/elements/seo.blade.php ENDPATH**/ ?>
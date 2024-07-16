

<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('elements.seo', ['seo' => $post->seo()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php
    $faqs = [
        [
            'title' => 'Questions About Siam Ocean',
            'items' => [
                [
                    'question' => 'What is Siam Ocean?',
                    'answer' =>
                        'Siame Ocean Food Industries is one of the specialized companies in producing a variety of high-quality food products that meet the needs of both the local and international markets.',
                ],
                [
                    'question' => 'What Makes Us Different?',
                    'answer' => 'The company keeps pace with the latest advancements in the food industry to meet customer needs. It constantly researches the highest quality standards to ensure that its products are the hallmark of both the local and international markets.'
                ],
            ],
        ],

    ];

    $only_faq_items = [];
    foreach ($faqs as $faq_item) {
        foreach ($faq_item['items'] as $faq) {
            $only_faq_items[] = $faq;
        }
    }

?>

<?php $__env->startSection('content'); ?>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
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

    <div class="container my-5">
        <?php echo compress(\Vedmant\LaravelShortcodes\Facades\Shortcodes::render(gx_autop($post->post_content))); ?>


        <div class="row">
            <div class="col-xl-10 m-auto">
                <?php ($i = 1); ?>
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-45">
                    <h2 class="text-center"><?php echo e($faq_item['title']); ?></h2>
                </div>
                
                <div class="accordion my-3" id="accordionPanelsStayOpenExample">
                    <?php $__currentLoopData = $faq_item['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="accordion-item my-3">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-<?php echo e($i); ?>" aria-expanded="true"
                                aria-controls="panelsStayOpen-<?php echo e($i); ?>" style="font-weight: 700">
                                <?php echo e($faq['question']); ?>

                            </button>
                        </h2>
                        <div id="panelsStayOpen-<?php echo e($i); ?>" class="accordion-collapse collapse <?php echo e($i == 1 ? 'show' : ''); ?>"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <?php echo compress(gx_autop($faq['answer'])); ?>

                            </div>
                        </div>
                    </div>
                    <?php ($i++); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>


    <script type="application/ld+json">
    <?php echo json_encode([
            '@context'      => 'https://schema.org',
            '@type'         => 'FAQPage',
            'mainEntity'    => array_map(function ($v) {
                return [
                    '@type'             => 'Question',
                    'name'              => $v['question'],
                    'acceptedAnswer'    => ['@type' => 'Answer', 'text' => strip_tags($v['answer'])]
                ];
            }, $only_faq_items)
        ]); ?>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/templates/faq.blade.php ENDPATH**/ ?>
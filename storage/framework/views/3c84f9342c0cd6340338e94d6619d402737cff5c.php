
<?php $__env->startSection('title', ucfirst($item) . ' - الاعدادات'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8"> الاعدادات</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                    لوحة التحكم
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                الاعدادات
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-10 border">
        <div class="card-body pt-0 pb-0">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x fs-5 fw-bolder">
                <?php $__currentLoopData = ['main', 'social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 mb-3 <?php echo e($nav == $item ? 'active' : ''); ?>" href="<?php echo e(url('admin/settings/' . $nav)); ?>"><?php echo e(ucfirst($nav)); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<form method="POST">
    <?php echo csrf_field(); ?>
    <div class="card border mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0" style="direction: ltr;text-align:left">
            <?php echo $__env->make('admin.settings.items.' . $item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>
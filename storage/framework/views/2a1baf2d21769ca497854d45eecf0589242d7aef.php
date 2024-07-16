
<?php $__env->startSection('title', 'تحويل الروابط'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8">تحويل الروابط</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                        لوحة التحكم
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    تحويل الروابط
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 mt-3">
                        <?php if($edit): ?>
                        <div class="card-toolbar">
                            <a href="<?php echo e(url('admin/redirects')); ?>" class="btn btn-info">الرجوع</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card border mb-5">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1"><?php echo e($edit ? 'تعديل' : 'اضافه جديد'); ?></span>
                    </h3>
                    
                </div>
                <div class="card-body py-3">
                    <div class="mb-0">
                        <form method="POST">
                            <?php echo csrf_field(); ?>
                            <?php if($edit): ?>
                                <input type="hidden" name="redirect[ID]" value="<?php echo e($redirect->ID); ?>">
                            <?php endif; ?>
                            <div class="row gx-10 mb-3">
                                <div class="col-lg-12">
                                    <label class="form-label fs-3 fw-bolder text-gray-700 mb-3">من :</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-solid" placeholder="From" name="redirect[from]" value="<?php echo e($edit ? $redirect->from : ''); ?>"/>
                                    </div>

                                    <label class="form-label fs-3 fw-bolder text-gray-700 mb-3">إلى :</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-solid" placeholder="To" name="redirect[to]" value="<?php echo e($edit ? $redirect->to : ''); ?>"/>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php if(!$edit): ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card border mb-5">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">الكل : <?php echo e(\App\Models\Redirect::get()->count()); ?></span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4" style="direction: ltr;text-align:left">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="w-50">From</th>
                                <th class="w-40">To</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = \App\Models\Redirect::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $redirect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="w-50">
                                        <?php echo e($redirect->from); ?>

                                    </td>
                                    <td class="w-40">
                                        <?php echo e($redirect->to); ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(url('admin/redirects/edit/' . $redirect->ID)); ?>" class="btn btn-primary btn-sm px-4">Edit</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(url('admin/redirects/delete/' . $redirect->ID)); ?>" class="btn btn-danger btn-sm px-4 me-2">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/redirects/list.blade.php ENDPATH**/ ?>
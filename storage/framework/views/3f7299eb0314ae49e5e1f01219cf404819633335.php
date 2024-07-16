
<?php $__env->startSection('title', 'تواصل معنا'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8">تواصل معنا</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                        لوحة التحكم
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    تواصل معنا
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card border mb-5">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">الكل : <?php echo e(\App\Models\Request::count()); ?></span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4" style="direction: ltr;text-align:left">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th>Form Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Message</th>
                                <th>Sent At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = \App\Models\Request::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($Request->form_name); ?></td>
                                    <td><?php echo e($Request->name); ?></td>
                                    <td>
                                        <?php echo e($Request->email); ?>

                                    </td>
                                    <td><?php echo e($Request->phone); ?></td>
                                    <td><?php echo e($Request->country); ?></td>
                                    <td><?php echo e($Request->note); ?></td>
                                    <td><?php echo e($Request->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/requests/list.blade.php ENDPATH**/ ?>
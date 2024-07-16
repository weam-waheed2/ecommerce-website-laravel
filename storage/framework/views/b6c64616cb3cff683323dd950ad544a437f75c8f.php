
<?php $__env->startSection('title', 'المستخدمين'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">المستخدمين</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                    لوحة التحكم
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                المستخدمين
                            </li>
                        </ol>
                        <div class="mt-3">
                            <a href="<?php echo e(url('admin/users/add')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>
                                اضافة مستخدم جديد
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card mb-5">
            <div class="card-header border-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">الكل : <?php echo e(\App\Models\User::count()); ?></span>
                </h3>
                
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table align-middle gs-0 gy-4" style="direction: ltr;text-align:left">
                        <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 min-w-300px rounded-start">#</th>
                            <th class="min-w-125px">Email</th>
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = \App\Models\User::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="symbol">
                                        <span class="symbol-label bg-light">
                                            <img src="<?php echo e(asset('dashboard/images/profile/user-1.jpg')); ?>" class="rounded-circle" width="50" height="50" alt="user" />
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-dark text-hover-primary d-block mb-1 fs-4"><?php echo e($user->email); ?></span>
                                </td>
                                <td>
                                    <span class="text-dark text-hover-primary d-block mb-1 fs-4"><?php echo e($user->name); ?></span>
                                </td>
                                <td>
                                    <a href="<?php echo e(url('admin/users/edit/' . $user->id)); ?>" class="btn btn-success btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                                    <a href="<?php echo e(url('admin/users/delete/' . $user->id)); ?>" class="btn btn-danger btn-color-white btn-active-color-white btn-sm px-4 me-2">Delete</a>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/users/list.blade.php ENDPATH**/ ?>
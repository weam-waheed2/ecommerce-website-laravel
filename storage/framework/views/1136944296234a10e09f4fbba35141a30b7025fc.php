
<?php $__env->startSection('title', $edit ? 'تعديل' : 'اضافة مستخدم جديد'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8"><?php echo e($edit ? 'تعديل' : 'اضافة مستخدم جديد'); ?></h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/home')); ?>">
                                    لوحة التحكم
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?php echo e(url('admin/users')); ?>">
                                    المستخدمين
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <?php echo e($edit ? 'تعديل' : 'اضافة مستخدم جديد'); ?>

                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card border" style="direction: ltr;text-align:left">
            <div class="card-body">
                <form method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if($edit): ?>
                        <input type="hidden" name="user[ID]" value="<?php echo e($user->id); ?>">
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="contact-name" class="form-label">Name</label>
                                <input type="text" id="contact-name" class="form-control" placeholder="Enter Contact Name" name="user[name]" value="<?php echo e($edit ? $user->name : ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="contact-email" class="form-label">Email</label>
                                <input type="email" id="contact-email" class="form-control" placeholder="Enter Contact Email" name="user[email]" value="<?php echo e($edit ? $user->email : ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="contact-email" class="form-label">Password</label>
                                <input type="password" id="contact-password" class="form-control" placeholder="Enter Contact Password" name="user[password]">
                            </div>
                            
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success waves-effect waves-light"><i class="fe-check-circle me-1"></i> <?php echo e($edit ? 'Update' : 'Create'); ?></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div> 
        </div> 
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/users/add.blade.php ENDPATH**/ ?>
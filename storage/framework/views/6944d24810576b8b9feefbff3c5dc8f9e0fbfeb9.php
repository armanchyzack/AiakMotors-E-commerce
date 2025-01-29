<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Manage Coupons</h2>
    <a href="<?php echo e(route('discount.code.all')); ?>" class="btn btn-primary mb-3">Create New Coupon</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Coupon Code</th>
                <th>Total Usage</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $couponUsageData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(++$key); ?></td>
                <td><?php echo e($usage->user->name); ?></td>
                <td><?php echo e($usage->coupon->code); ?></td>
                <td><?php echo e($usage->total_usage); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\Discount\cupon_user.blade.php ENDPATH**/ ?>
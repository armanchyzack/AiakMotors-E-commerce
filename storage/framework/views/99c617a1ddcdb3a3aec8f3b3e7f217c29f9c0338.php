<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Manage Coupons</h2>
    <a href="<?php echo e(route('discount.code.view')); ?>" class="btn btn-primary mb-3">Create New Coupon</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Discount</th>
                <th>Section</th>
                <th>Status</th>
                <th>Usage Limit</th>
                <th>Totall Limit</th>
                <th>Valid From</th>
                <th>Valid Until</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($coupon->code); ?></td>
                    <td><?php echo e($coupon->discount); ?></td>
                    <td><?php echo e(ucfirst($coupon->section)); ?></td>
                    <td><?php echo e(ucfirst($coupon->status)); ?></td>
                    <td><?php echo e($coupon->usage_limit_per_user); ?></td>
                    <td> <?php echo e($coupon->usage_limit_total); ?></td>
                    <td><?php echo e($coupon->valid_from->format('Y-m-d H:i')); ?></td>
                    <td><?php echo e($coupon->valid_until->format('Y-m-d H:i')); ?></td>
                    <td>
                        <a href="<?php echo e(route('discount.code.edit', $coupon)); ?>" class="btn btn-warning">Edit</a>
                        <form action="<?php echo e(route('discount.code.delete', $coupon)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\Discount\all_discount.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Delivered Orders (Sold Items)</h2>
    </div>
    <div class="card-body row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Date Shipped</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$key); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->phone); ?></td>
                        <td><?php echo e($item->address); ?></td>
                        <td><?php echo e($item->total); ?></td>
                        <td><?php echo e($item->created_at->format('Y-m-d H:i:s')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php echo e($orders->links()); ?>

        </div>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if(session('warning')): ?>
    <div class="alert alert-warning"><?php echo e(session('warning')); ?></div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/OrderList/sold.blade.php ENDPATH**/ ?>
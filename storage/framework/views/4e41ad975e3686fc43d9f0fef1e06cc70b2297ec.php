<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Order Table</h2>
    </div>
    <div class="card-body row">
        <h2>Confirmed Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Total</th>
                <th>Date Confirmed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $confirmedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(++$key); ?></td>
                    <td><?php echo e($order->name); ?></td>
                    <td><?php echo e($order->phone); ?></td>
                    <td><?php echo e($order->address); ?></td>
                    <td><?php echo e($order->total); ?></td>
                    <td><?php echo e($order->created_at->format('Y-m-d H:i:s')); ?></td>
                    <td>
                        <form action="<?php echo e(route('orders.ship-confirmed', $order->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary">Ship</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if(session('warning')): ?>
    <div class="alert alert-warning"><?php echo e(session('warning')); ?></div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\OrderList\confirm.blade.php ENDPATH**/ ?>
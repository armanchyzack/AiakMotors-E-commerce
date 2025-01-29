<?php $__env->startSection('content'); ?>

<style>
    @media (max-width: 576px) {
    table {
        font-size: 12px;
    }
    .badge {
        font-size: 10px;
    }

}
table.table.table-striped {
    color: #ffd700 !important;
}
td {
    color: #ffd700 !important;
}
hr{
    color: #ffd700
}
h1{
    color: #ffd700
}
.alert-info {
    color: #ffd700;
     background-color: inherit;
    border-color: #ffd700;
}
</style>
<div class="">
    <h1 class="text-center">Your Order List:</h1>
    <hr/>
    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-info">You have no orders yet.</div>
    <?php else: ?>
        <!-- Responsive Table -->
        <div class="table-responsive col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->id); ?></td>
                            <td><?php echo e($order->name); ?></td>
                            <td><?php echo e($order->phone); ?></td>
                            <td><?php echo e($order->address); ?></td>
                            <td>$<?php echo e(number_format($order->total, 2)); ?></td>
                            <td><?php echo e($order->payment_method); ?></td>
                            <td>
                                <span class="badge bg-<?php echo e($order->status === 'shipped' ? 'success' : 'warning'); ?>">
                                    <?php echo e(ucfirst($order->status)); ?>

                                </span>
                            </td>
                            <td><?php echo e($order->created_at->format('d M, Y')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\Profile\orderlist.blade.php ENDPATH**/ ?>
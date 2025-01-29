<?php $__env->startSection('content'); ?>
    <h2>Confirmed Orders</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Product Names</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->user ? $order->user->name : 'User not found'); ?></td>
                    <td><?php echo e($order->product_names); ?></td>
                    <td><?php echo e($order->discounted_total); ?></td>
                    <td><?php echo e($order->status); ?></td>
                    <td>
                        <!-- Status selection with Bootstrap styling -->
                        <form action="<?php echo e(route('orders.update.status', $order->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>

                            <select name="status" class="form-select form-select-sm">
                                <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="approved" <?php echo e($order->status == 'approved' ? 'selected' : ''); ?>>Approved</option>
                                <option value="delivered" <?php echo e($order->status == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                            </select>

                            <button type="submit" class="btn btn-primary btn-sm mt-2">Update Status</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/OrderList/confirm.blade.php ENDPATH**/ ?>
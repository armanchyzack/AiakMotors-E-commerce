<?php $__env->startSection('content'); ?>
<h2>My Orders</h2>

<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="order">
        <p><strong>Order ID:</strong> <?php echo e($order->id); ?></p>
        <p><strong>Name:</strong> <?php echo e($order->name); ?></p>
        <p><strong>Phone:</strong> <?php echo e($order->phone); ?></p>
        <p><strong>Address:</strong> <?php echo e($order->address); ?></p>
        <p><strong>Total:</strong> <?php echo e($order->total); ?></p>
        <p><strong>Status:</strong> <?php echo e($order->status); ?></p>
        <p><strong>Payment Method:</strong> <?php echo e($order->payment_method); ?></p>

        <h5>Order Items:</h5>
        <ul>
            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <strong>Item Name:</strong> <?php echo e($item->product_name); ?> <br>
                    <strong>Quantity:</strong> <?php echo e($item->quantity); ?> <br>
                    <strong>Price:</strong> <?php echo e($item->price); ?> <br>
                    <strong>Total:</strong> <?php echo e($item->quantity * $item->price); ?> <br>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Pagination Links -->
<div class="pagination">
    <?php echo e($orders->links()); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/Profile/my_order.blade.php ENDPATH**/ ?>
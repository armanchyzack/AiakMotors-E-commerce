<?php $__env->startSection('content'); ?>
    <!--login form-->
   <!-- resources/views/frontend/order_list.blade.php -->

<h2>My Orders</h2>
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="order">
        <p>Order ID: <?php echo e($order->id); ?></p>
        <p>Name: <?php echo e($order->name); ?></p>
        <p>Phone: <?php echo e($order->phone); ?></p>
        <p>Address: <?php echo e($order->address); ?></p>
        <p>Total: <?php echo e($order->total); ?></p>
        <p>Status: <?php echo e($order->status); ?></p>
        <p>Payment Method: <?php echo e($order->payment_method); ?></p>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\Profile\my_order.blade.php ENDPATH**/ ?>
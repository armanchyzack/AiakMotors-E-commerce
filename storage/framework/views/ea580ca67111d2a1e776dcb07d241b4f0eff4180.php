<?php $__env->startSection('content'); ?>
<style>
    div {
    color: #ffd700 !important;
}
</style>
    <!-- resources/views/frontend/order_form.blade.php -->
<div class="container">
    <div class="card">
        <div class="invoice">
            <h1 class="text-center color">Invoice</h1>
            <hr/>
        <div class="d-flex justify-content-between align-items-center">
            <div style="color">Subtotal</div>
            <div>
                <strong class="total-amount color" data-original-total="<?php echo e($subtotal); ?>">
                    <span class="me-1"><i class=" color fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                    <?php echo e($subtotal); ?>

                </strong>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>Discount</div>
            <div>
                <strong class="total-amount" data-original-total="<?php echo e($discount); ?>">
                    <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                    <?php echo e($discount); ?>

                </strong>
            </div>
        </div>
        <hr/>
        <div class="d-flex justify-content-between align-items-center">
            <div>Total</div>
            <div>
                <strong class="total-amount" data-original-total="<?php echo e($total); ?>">
                    <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                    <?php echo e($total); ?>

                </strong>
            </div>
        </div>
        </div>
        <h1 class="mt-3 text-center">Order Details</h1>
        <form action="<?php echo e(route('order')); ?>" method="GET">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo e(old('phone')); ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address" required><?php echo e(old('address')); ?></textarea>
            </div>
            <input type="text" name="total" hidden value="<?php echo e($total); ?>">
            <button type="submit" class="btn btn-primary mt-4">Place Order (Cash on Delivery)</button>
        </form>




    </div>
</div>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\order.blade.php ENDPATH**/ ?>
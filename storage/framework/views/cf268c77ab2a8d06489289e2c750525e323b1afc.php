<?php $__env->startSection('content'); ?>
<style>
    div {
        color: #ffd700 !important;
    }
</style>

<div class="container">
    <div class="card">

        <h1 class="mt-3 text-center">Order Details</h1>
        <form action="<?php echo e(route('order')); ?>" method="GET">
            <?php echo csrf_field(); ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Order Summary</h4>
                    <hr>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cart-item">
                        <!-- Accessing the product name through the accessory relationship -->
                        <h5><?php echo e($cart->accessory->name); ?></h5> <!-- Accessory name -->
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Order Total -->
                    <div class="d-flex justify-content-between">
                        <strong>Subtotal:</strong>
                        <span>
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo e($subtotal); ?>

                        </span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>Discount:</strong>
                        <span>
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo e($discount); ?>

                        </span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>Total:</strong>
                        <span>
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo e($total); ?>

                        </span>
                    </div>
                    <input type="hidden" name="product_names[]" value="<?php echo e($cart->accessory->name); ?>">
                    <input type="hidden" name="subtotal" value="<?php echo e($subtotal); ?>">
                    <input type="hidden" name="discount" value="0">
                    <input type="hidden" name="total" value="<?php echo e($subtotal); ?>">
                </div>
            </div>

            <!-- Customer Information -->
            <div class="card">
                <div class="card-body">
                    <h4>Billing Details</h4>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="customer_name" id="name" value="<?php echo e(old('customer_name')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="customer_phone" id="phone" value="<?php echo e(old('customer_phone')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="customer_address" id="address" required><?php echo e(old('customer_address')); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Place Order</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/order.blade.php ENDPATH**/ ?>
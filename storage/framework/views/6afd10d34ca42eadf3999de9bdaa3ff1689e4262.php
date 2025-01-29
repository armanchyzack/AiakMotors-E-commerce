<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Create Coupon</h2>
    <form action="<?php echo e(route('discount.code.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="code">Coupon Code</label>
            <input type="text" name="code" id="code" class="form-control" placeholder="Enter coupon code" required>
        </div>

        <div class="form-group">
            <label for="discount">Discount Percentage</label>
            <input type="number" name="discount" id="discount" class="form-control" placeholder="Enter discount percentage" required min="0" max="100">
            <small class="form-text text-muted">Enter a value between 0 and 100.</small>
        </div>

        <div class="form-group">
            <label for="section">Target Section</label>
            <select name="section" id="section" class="form-control" required>
                <option value="accessory">Accessory</option>
                <option value="car">Car</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="usage_limit_per_user">Usage Limit Per User</label>
            <input type="number" name="usage_limit_per_user" id="usage_limit_per_user" class="form-control" placeholder="Enter usage limit per user" required min="1">
        </div>

        <div class="form-group">
            <label for="usage_limit_total">Total Usage Limit</label>
            <input type="number" name="usage_limit_total" id="usage_limit_total" class="form-control" placeholder="Enter total usage limit" required min="1">
        </div>

        <div class="form-group">
            <label for="valid_from">Valid From</label>
            <input type="datetime-local" name="valid_from" id="valid_from" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="valid_until">Valid Until</label>
            <input type="datetime-local" name="valid_until" id="valid_until" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Coupon</button>
        <a href="<?php echo e(route('discount.code.all')); ?>" class="btn btn-secondary">Back to Coupons List</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/Discount/add_discount_code.blade.php ENDPATH**/ ?>
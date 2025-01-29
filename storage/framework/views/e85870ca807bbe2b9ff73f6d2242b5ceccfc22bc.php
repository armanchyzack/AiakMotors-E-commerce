<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Add New Service</h1>
    <form action="<?php echo e(route('service.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" name="name" class="form-control" id="name" required >
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\service\index.blade.php ENDPATH**/ ?>
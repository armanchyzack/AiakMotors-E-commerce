<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Details</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Edit Detail</h5>
        <hr>
        <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <form action="<?php echo e(route('details.update', $detail->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>



        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo e(old('title', $detail->title)); ?>" required class="form-control">
            <span class="text-danger">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color: red;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" id="summernote" required><?php echo e(old('description', $detail->description)); ?></textarea>
            <span class="text-danger">
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color: red;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
        </div>









        <button type="submit" class="btn btn-warning">Update Detail</button>
    </form>
    </div>
</div>
<?php $__env->startPush('customJs'); ?>
    <script>
        $(document).ready(function() {
  $('#summernote').summernote();
});
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/WheelSlice/Details/edit.blade.php ENDPATH**/ ?>
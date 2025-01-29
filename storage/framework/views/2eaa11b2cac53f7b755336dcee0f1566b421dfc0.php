<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Footer</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add Footer</h5>
        <hr>
      <form action="<?php echo e(route('footer.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3 col-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="summernote" style="height: 100px" name="details"></textarea>

            <span class="text-danger">
              <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <?php echo e($message); ?>

              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\Footer\index.blade.php ENDPATH**/ ?>
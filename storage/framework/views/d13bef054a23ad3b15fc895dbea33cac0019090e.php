<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Spine Wheel</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add Spine Wheel text</h5>
        <hr>
      <form action="<?php echo e(route('spinewheel.store')); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <div class="mb-3">
          <label class="form-label">Prize One</label>
          <input type="text" name="prize_one" class="form-control">
          <span class="text-danger">
            <?php $__errorArgs = ['prize_one'];
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
        <div class="mb-3">
            <label class="form-label">Prize Two</label>
            <input type="text" name="prize_two" class="form-control">
            <span class="text-danger">
              <?php $__errorArgs = ['prize_two'];
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
          <div class="mb-3">
            <label class="form-label">Prize Three</label>
            <input type="text" name="prize_three" class="form-control" >
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['prize_three'];
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
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/SpinWheel/index.blade.php ENDPATH**/ ?>
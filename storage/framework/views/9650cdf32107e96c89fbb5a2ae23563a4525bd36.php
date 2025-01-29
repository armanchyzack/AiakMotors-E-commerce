<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Spine Wheel Slice</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add Spine Wheel Slice text</h5>
        <hr>
      <form action="<?php echo e(route('wheel.slice.store')); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <div class="mb-3">
          <label class="form-label">Slice One</label>
          <input type="text" name="One" class="form-control">
          <span class="text-danger">
            <?php $__errorArgs = ['One'];
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
            <label class="form-label">Slice Two</label>
            <input type="text" name="Two" class="form-control">
            <span class="text-danger">
              <?php $__errorArgs = ['Two'];
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
            <label class="form-label">Slice Three</label>
            <input type="text" name="Three" class="form-control" >
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['Three'];
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
            <label class="form-label">Slice four</label>
            <input type="text" name="four" class="form-control" >
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['four'];
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
            <label class="form-label">Slice five</label>
            <input type="text" name="five" class="form-control" >
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['five'];
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
            <label class="form-label">Slice six</label>
            <input type="text" name="six" class="form-control" >
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['six'];
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
            <label class="form-label">Slice seven</label>
            <input type="text" name="seven" class="form-control" >
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['seven'];
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
            <label class="form-label">Slice eight</label>
            <input type="text" name="eight" class="form-control" >
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['eight'];
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

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/WheelSlice/add.blade.php ENDPATH**/ ?>
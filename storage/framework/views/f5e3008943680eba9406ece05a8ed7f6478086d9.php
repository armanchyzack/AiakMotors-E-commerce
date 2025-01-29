<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Social</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title text-bg-warning p-1">Edit Social Media</h5>
        <hr>
      <form action="<?php echo e(route('social.update', $socials->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PUT"); ?>
        <div class="mb-3">
          <label class="form-label">Facebook Link</label>
          <input type="text" name="fb_link" class="form-control" value="<?php echo e($socials->facebook); ?>">
          <span class="text-danger">
            <?php $__errorArgs = ['fb_link'];
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
            <label class="form-label">Messanger Link</label>
            <input type="text" name="msg_link" class="form-control"value="<?php echo e($socials->messanger); ?>" >
            <span class="text-danger">
              <?php $__errorArgs = ['msg_link'];
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
            <label class="form-label">WhatsApp Link</label>
            <input type="text" name="wts_link" class="form-control" placeholder="1836666666" value="<?php echo e($socials->whatsapp); ?>">
            <span>Input the number with out 0</span>
            <br>
            <span class="text-danger">
              <?php $__errorArgs = ['wts_link'];
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
        <button type="submit" class="btn btn-warning">Submit</button>
      </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/SocialMedia/edit.blade.php ENDPATH**/ ?>
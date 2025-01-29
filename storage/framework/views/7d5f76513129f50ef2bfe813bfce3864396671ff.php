<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Marquery</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Update marquery text</h5>
        <hr>
      <form action="<?php echo e(route('marquery.update', $marquery->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PUT"); ?>
        <div class="mb-3 col-12">
            <label class="form-label">Description</label>
            <input class="form-control"  style="height: 100px" placeholder="<?php echo e($marquery->details); ?>" name="details"></input>

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
        <button type="submit" class="btn btn-warning">Update</button>
      </form>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if(session('warning')): ?>
    <div class="alert alert-warning"><?php echo e(session('warning')); ?></div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\Marquery\edit.blade.php ENDPATH**/ ?>
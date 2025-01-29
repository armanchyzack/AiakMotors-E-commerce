<?php $__env->startSection('content'); ?>
<style>
img {
    height: 100px;
    width: 150px;
}
</style>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Nav Item</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title warning">Edit Menu</h5>
        <span class="text-end mb-3"><a href="<?php echo e(route('menu.all')); ?>" class="btn btn-success btn-sm">All  Menu</a></span>
        <hr>
      <form action="<?php echo e(route('menu.update', $menus->id)); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3 ">
          <label class="form-label">Menu Name</label>
          <input type="text" name="title" class="form-control" value="<?php echo e($menus->title); ?>">
          <span class="text-danger">
            <?php $__errorArgs = ['title'];
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
        <label class="form-label">Menu slug</label>
          <input type="text" name="slug" class="form-control" value="<?php echo e($menus->slug); ?>">
          <span class="text-danger">
            <?php $__errorArgs = ['slug'];
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
        <button type="submit" class="btn btn-warning mt-3">Update</button>
      </form>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\Nav\edit_nav.blade.php ENDPATH**/ ?>
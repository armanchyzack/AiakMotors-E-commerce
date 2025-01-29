<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Edit Spine Wheel Slice (Sticky)</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Edit Spine Wheel Slice Text</h5>
        <hr>
        <form action="<?php echo e(route('wheel.slice.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Slice One -->
            <div class="mb-3">
                <label class="form-label">Slice One</label>
                <input type="text" name="One" class="form-control" value="<?php echo e(old('One', $wheelSlice->slice_one)); ?>">
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

            <!-- Slice Two -->
            <div class="mb-3">
                <label class="form-label">Slice Two</label>
                <input type="text" name="Two" class="form-control" value="<?php echo e(old('Two', $wheelSlice->slice_two)); ?>">
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

            <!-- Slice Three -->
            <div class="mb-3">
                <label class="form-label">Slice Three</label>
                <input type="text" name="Three" class="form-control" value="<?php echo e(old('Three', $wheelSlice->slice_three)); ?>">
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

            <!-- Slice Four -->
            <div class="mb-3">
                <label class="form-label">Slice Four</label>
                <input type="text" name="four" class="form-control" value="<?php echo e(old('four', $wheelSlice->slice_four)); ?>">
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

            <!-- Slice Five -->
            <div class="mb-3">
                <label class="form-label">Slice Five</label>
                <input type="text" name="five" class="form-control" value="<?php echo e(old('five', $wheelSlice->slice_five)); ?>">
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

            <!-- Slice Six -->
            <div class="mb-3">
                <label class="form-label">Slice Six</label>
                <input type="text" name="six" class="form-control" value="<?php echo e(old('six', $wheelSlice->slice_six)); ?>">
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

            <!-- Slice Seven -->
            <div class="mb-3">
                <label class="form-label">Slice Seven</label>
                <input type="text" name="seven" class="form-control" value="<?php echo e(old('seven', $wheelSlice->slice_seven)); ?>">
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

            <!-- Slice Eight -->
            <div class="mb-3">
                <label class="form-label">Slice Eight</label>
                <input type="text" name="eight" class="form-control" value="<?php echo e(old('eight', $wheelSlice->slice_eight)); ?>">
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

            <button type="submit" class="btn btn-warning w-100">Update</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/WheelSlice/edit.blade.php ENDPATH**/ ?>
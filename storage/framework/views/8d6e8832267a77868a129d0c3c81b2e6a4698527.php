<?php $__env->startSection('content'); ?>
    <!-- Profile Update Form -->
    <div class="container mt-3">
        <div class="box">

            <div class="card" style="border: 5px solid #ffd700; border-radius: 5%;">
                <div class="card-header text-bg" style="color: #ffd700">
                    <h1><?php echo e(__('Update Profile')); ?></h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <!-- Name Field -->
                        <div class="row mb-3">
                            <label for="name" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end"><?php echo e(__('Name')); ?></label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name', Auth::user()->name)); ?>" required autocomplete="name" placeholder="Enter your name">

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="row mb-3">
                            <label for="email" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end"><?php echo e(__('Email Address')); ?></label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email', Auth::user()->email)); ?>" required autocomplete="email" placeholder="Enter your email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="row mb-3">
                            <label for="password" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end"><?php echo e(__('Password')); ?></label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Enter new password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="row mb-3">
                            <label for="password_confirmation" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end"><?php echo e(__('Confirm Password')); ?></label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update Profile')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/auth/profile.blade.php ENDPATH**/ ?>
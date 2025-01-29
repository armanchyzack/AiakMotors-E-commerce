<?php $__env->startSection('content'); ?>
    <!--login form-->
    <div class="container mt-3">
        <div class="box">

          <div class="card" style="border: 5px solid #ffd700; border-radius: 5%;">
            <div class="card-header text-bg" style="color: #ffd700"><h1><?php echo e(__('Login')); ?></h1></div>

            <div class="card-body">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="row mb-3">
                        <label for="email" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end"><?php echo e(__('Email Address')); ?></label>
                        <div class="col-md-6"  style="border: 1px solid #ffd700">
                            <input id="email" aria-label="Email address" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="hi">

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

                    <div class="row mb-3">
                        <label for="password" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end"><?php echo e(__('Password')); ?></label>

                        <div class="col-md-6" style="border: 1px solid #ffd700;">
                            <input id="password" type="password" class=" custom-input  form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

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

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border: 1px solid #ffd700"  type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="remember" style="color: #ffd700" >
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Login')); ?>

                            </button>

                            <?php if(Route::has('password.request')): ?>
                                <a class=" btn-sm text-sm nav-link" style="color: #ffd700" href="<?php echo e(route('user.password.forget', ['token' => $token ?? 'default_token'] )); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
      </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\auth\login.blade.php ENDPATH**/ ?>
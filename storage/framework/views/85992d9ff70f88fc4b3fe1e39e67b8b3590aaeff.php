<?php $__env->startSection('content'); ?>
<style>
    .btnn{
        border: 1px solid #ffd700;
        background: inherit;
        color: #ffd700;
    }
    .btnn:hover{
        background: rgb(107, 107, 105);
        color:#ffd700;
    }
</style>
    <!--login form-->
    <div class="container mt-3">
        <div class="box">

          <div class="card">
            <div class="card-header">
                <h1 style="color: #ffd700">welcome to my website <?php echo e(Str::ucfirst(Auth::user()->name)); ?></h1>
                <div class="card">
                    <h2 style="color: #ffd700"><?php echo e(Str::ucfirst(Auth::user()->name)); ?></h2>
                    <h3 style="color: #ffd700"><?php echo e((Auth::user()->email)); ?></h3>
                    <p style="color: #ffd700">cuppon Code: <span>uchdgaf</span></p>
                    <p><button>Contact</button></p>
                    <p><button>Edit Profile</button></p>
                    <p><a class="btnn btn" href="<?php echo e(route('order.list')); ?>">My Orders</a></p>




                    <?php if($latestSpin): ?>
                    <?php
                        $isExpired = now()->greaterThan($latestSpin->expires_at);
                    ?>

                    <div class="prize-info">
                        <?php if($isExpired): ?>
                            <p>Your prize has expired.</p>
                        <?php else: ?>
                            <p>Congratulations, you won <?php echo e($latestSpin->prize); ?>! Your prize expires on <?php echo e($latestSpin->expires_at->toFormattedDateString()); ?>.</p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p>You have not won any prizes yet.</p>
                <?php endif; ?>
                  </div>
            </div>
        </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\Profile\user_dashboard.blade.php ENDPATH**/ ?>
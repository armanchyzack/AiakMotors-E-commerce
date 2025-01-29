<?php $__env->startSection('sidenav'); ?>
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="<?php echo e(route('car')); ?>" class="d-flex" style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('accessory')); ?>" class="d-flex" style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('service')); ?>" class="d-flex" style="color: #ffd700">Service <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('spinner')); ?>" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('product'); ?>
9
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<style>
    .value {
    font-size: 0.6em;
}
</style>
    <div class="container">
        <h1 class="text-bg" style="color: #ffd700"> Spine The wheel and win a prize. </h1>
        <p class="text-center" style="color: #ffd700"> Spine the wheel on in a mounth</p>
    </div>


    <main class="mt-3">
        <input id="spin-button" type="checkbox" />
        <div class="wheel">
            <!-- Loop through $wheelslice collection and display slice_one -->
            <?php $__currentLoopData = $wheelslice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="slice" style="--i: <?php echo e($loop->iteration); ?>">
                    <p class="value text">
                        <?php echo e($slice->slice_one); ?>  <!-- Access slice_one field -->
                    </p>
                </div>
                <div class="slice" style="--i: 2">
                    <p class="value"><?php echo e($slice->slice_two); ?> </p>
                </div>
                <div class="slice" style="--i: 3">
                    <p class="value"><?php echo e($slice->slice_three); ?></p>
                </div>
                <div class="slice" style="--i: 4">
                    <p class="value"><?php echo e($slice->slice_four); ?></p>
                </div>
                <div class="slice" style="--i: 5">
                    <p class="value"><?php echo e($slice->slice_five); ?></p>
                </div>
                <div class="slice" style="--i: 6">
                    <p class="value"><?php echo e($slice->slice_six); ?></p>
                </div>
                <div class="slice" style="--i: 7">
                    <p class="value"><?php echo e($slice->slice_seven); ?></p>
                </div>
                <div class="slice" style="--i: 8">
                    <p class="value"><?php echo e($slice->slice_eight); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>

    <section>
        <a href="<?php echo e(route('spinner.details')); ?>" class="btn nav-link mt-3 w-50 m-auto" style="border: 2px solid #ffd700; background:inherit;">More Details</a>
    </section>




    <?php $__env->startPush('customJs'); ?>
        <script>
          document.getElementById('spin-button').addEventListener('click', async () => {
    try {
        // Disable the spin button while spinning
        document.getElementById('spin-button').disabled = true;

        const response = await fetch('/spin', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            },
        });

        // Redirect to the profile page regardless of the spin result
        window.location.href = 'user/profile';
    } catch (error) {
        console.error('Error:', error);
        window.location.href = 'user/profile';
    }
});
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/spinerdetails.blade.php ENDPATH**/ ?>
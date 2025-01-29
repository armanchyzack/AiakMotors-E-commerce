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
<div class="card-group carde ">
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class=" container card col-lg-4" style="border-radius: 5%">
            <img src="<?php echo e(asset('storage/'.$service->image)); ?>" class="card-img-top" alt="<?php echo e($service->name); ?>">
            <div class="card-body">
                <h5 class="card-title"> <?php echo e(Str::ucfirst( $service->name)); ?></h5>
                <h6 class="text-white mt-1 text-bg-light"><?php echo e($service->price); ?><span ><i
                    class=" ms-1 fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <div class="mt-2 buttonn">
                    <a  href="#social" class="btn btn-primary add-to-cart btn-light me-2">Contact Us </a>
                </div>
            </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\service.blade.php ENDPATH**/ ?>
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
        <a href="<?php echo e(route('our.shop.details')); ?>" class="d-flex" style="color: #ffd700">About Us<span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('product'); ?>
9
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h2 class="text-center" style="color: #ffd700;">About Us</h2>

        <?php if($companyInfo): ?>
            <div class="row">
                <div class="col-12">
                    <h4 style="color: #ffd700;">Our Story</h4>
                    <p style="color: #fff;">
                        <?php echo e($companyInfo->details); ?>

                    </p>
                </div>
            </div>

            <div class="mt-5">
                <h4 style="color: #ffd700;">Contact Information</h4>
                <p style="color: #fff;">
                    <strong>Phone Number:</strong> <?php echo e($companyInfo->phone_number); ?><br>
                    <strong>Email:</strong> <a href="mailto:<?php echo e($companyInfo->email); ?>" style="color: #ffd700;"><?php echo e($companyInfo->email); ?></a><br>
                    <strong>Address:</strong> <?php echo e($companyInfo->address); ?><br>
                    
                        <?php echo e($companyInfo->address_map_link); ?>


                </p>
            </div>

            <div class="mt-5">
                <h4 style="color: #ffd700;">Visit Us</h4>
                <div id="google-map" style="width: 100%; height: 400px;"></div>
            </div>
        <?php else: ?>
            <p style="color: #fff;">No company information available.</p>
        <?php endif; ?>
    </div>

    <?php $__env->startPush('customJs'); ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAP_API_KEY&callback=initMap" async defer></script>

        <script>
            function initMap() {
                // Use the coordinates from the company's map link (assumed to be in 'lat,lng' format)
                var location = {
                    lat: parseFloat('<?php echo e(explode(",", $companyInfo->address_map_link)[0]); ?>'),
                    lng: parseFloat('<?php echo e(explode(",", $companyInfo->address_map_link)[1]); ?>')
                };

                var map = new google.maps.Map(document.getElementById("google-map"), {
                    zoom: 15,
                    center: location,
                });

                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "Your Company",
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/ourshop.blade.php ENDPATH**/ ?>
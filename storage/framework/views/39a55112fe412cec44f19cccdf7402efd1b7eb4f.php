<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="text-center">Company Information</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(isset($companyInfo) ? route('company.info.update', $companyInfo) : route('company.info.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($companyInfo)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo e(old('phone_number', $companyInfo->phone_number ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email', $companyInfo->email ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" required><?php echo e(old('details', $companyInfo->details ?? '')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address', $companyInfo->address ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="address_map_link" class="form-label">Google Map Address Link</label>
            <input type="text" class="form-control" id="address_map_link" name="address_map_link" value="<?php echo e(old('address_map_link', $companyInfo->address_map_link ?? '')); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(isset($companyInfo) ? 'Update' : 'Save'); ?></button>
    </form>

    <div class="mt-5 mb-3">
        <h4>Visit Us</h4>
        <?php if(isset($companyInfo) && $companyInfo->address_map_link): ?>
            <div id="google-map" style="width: 100%; height: 400px;"></div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->startPush('customJs'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAP_API_KEY&callback=initMap" async defer></script>
    <script>
        function initMap() {
            <?php if(isset($companyInfo) && $companyInfo->address_map_link): ?>
                var location = { lat: parseFloat('<?php echo e($companyInfo->address_map_link); ?>'.split(',')[0]), lng: parseFloat('<?php echo e($companyInfo->address_map_link); ?>'.split(',')[1]) };
                var map = new google.maps.Map(document.getElementById("google-map"), {
                    zoom: 15,
                    center: location,
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "Your Company",
                });
            <?php endif; ?>
        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/CompanyInfo/add.blade.php ENDPATH**/ ?>
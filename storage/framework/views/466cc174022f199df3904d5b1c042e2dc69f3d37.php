<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php if(session()->has('deletesuccess')): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo e(session('deletesuccess')); ?>

            </div>
        <?php endif; ?>

        <?php if(session()->has('success')): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card-header">
            <h2 class="text-center">Manage Car Gallery Images</h2>
        </div>

        <div class="card-body">
            <h4>Current Gallery Images</h4>
            <div class="row">
                <?php $__currentLoopData = $car->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 mb-3">
                        <div class="image-card">
                            <img src="<?php echo e($image->image_url); ?>" alt="<?php echo e($image->image); ?>" class="img-thumbnail">
                            <!-- Delete Image Form -->
                            <form action="<?php echo e(route('product.gallary.image.delete', $image->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Car Image Upload Form -->
            <form action="<?php echo e(route('product.gallary.image.upload', $car->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label class="form-label" for="car_images">Upload New Car Images</label>
                    <input type="file" class="form-control" id="car_images" name="car_images[]" multiple accept="image/*">
                </div>

                <div id="image_preview_container" class="image-preview-container">
                    <!-- Image previews will be appended here -->
                </div>

                <button type="submit" class="btn btn-primary mt-3">Upload Images</button>
            </form>
        </div>
    </div>

    <?php $__env->startPush('customJs'); ?>
        <script>
            // Handle image preview before uploading
            document.getElementById('car_images').addEventListener('change', function(event) {
                var files = event.target.files;
                var previewContainer = document.getElementById('image_preview_container');
                previewContainer.innerHTML = ''; // Clear previous previews

                Array.from(files).forEach(function(file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imgPreview = document.createElement('div');
                        imgPreview.classList.add('image-preview');
                        imgPreview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" style="width: 100px; height: 100px;">`;
                        previewContainer.appendChild(imgPreview);
                    };
                    reader.readAsDataURL(file);
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/Product/gallary_img.blade.php ENDPATH**/ ?>
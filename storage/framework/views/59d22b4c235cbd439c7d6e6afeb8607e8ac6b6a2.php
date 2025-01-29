<?php $__env->startSection('content'); ?>
    <style>
        .image-preview-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
}

.image-preview {
    position: relative;
    width: 100px;
    height: 100px;
    border: 1px solid #ddd;
    overflow: hidden;
}

.image-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-preview .delete-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background: red;
    color: white;
    border: none;
    cursor: pointer;
    padding: 2px 6px;
    font-size: 12px;
}
    </style>








<div class="card">
    <div class="card-header">
        <h2 class="text-center">Product</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Product's Gallary Image</h5>
        <span class="col-6 text-end"><a href="" class="btn btn-success btn-sm">All  Car's</a></span>
        <hr>
      <form action="" method="POST" enctype="multipart/form-data" class="row">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label class="form-label" for="car_images">Car Images</label>
            <img src=".." alt="..">
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="car_images">Car Images</label>
            <input type="file" class="form-control" id="car_images" name="car_images[]" multiple accept="image/*">
        </div>

        <div id="image_preview_container" class="image-preview-container">
            <!-- Image previews will be appended here -->
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>

<?php if(session()->has('deletesuccess')): ?>
    <div class="alert alert-danger mt-3" role="alert">
        <?php echo e(session('deletesuccess')); ?>

</div>
</div>
<?php endif; ?>
<?php $__env->startPush('customJs'); ?>
    <script>
        (document).ready(function () {
    // Trigger when file input changes
    $('#car_images').on('change', function () {
        // Get the selected files
        let files = this.files;
        $('#image_preview_container').empty(); // Clear previous previews

        // Loop through each file and display preview
        $.each(files, function (index, file) {
            let reader = new FileReader();

            reader.onload = function (e) {
                let preview = `
                    <div class="image-preview" data-index="${index}">
                        <img src="${e.target.result}" alt="Product Image">
                        <button class="delete-btn" onclick="removeImage(${index})">x</button>
                    </div>
                `;
                $('#image_preview_container').append(preview);
            };
            reader.readAsDataURL(file);
        });
    });
});

// Delete image preview function
function removeImage(index) {
    // Remove the specific preview element by data-index
    $(`.image-preview[data-index="${index}"]`).remove();

    // Optionally, clear the file input for re-adding if needed:
    $('#car_images').val('');
}



    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\Product\gallary_img.blade.php ENDPATH**/ ?>
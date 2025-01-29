<?php $__env->startSection('content'); ?>
<style>
img {
    height: 100px;
    width: 150px;
}
</style>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">LOGO</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add a Logo</h5>
        <hr>
      <form action="<?php echo e(route('logo.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Website Logo</label>
            <input type="file" name="logo" class="form-control" id="file-input">
            <span class="text-danger">
                <?php $__errorArgs = ['logo'];
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
        <div class="mb-3 col-lg-6">
            <div id="preview-container">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>

<?php $__env->startPush('customJs'); ?>
<script>
    //?   no relode slug genarate same to same as title

    let title = $('input[name="title"]')
            let slug = $('input[name="slug"]')
            title.keyup(function(){
                let value=$(this).val().toLowerCase().split(' ').join('-')
                slug.val(value)
            })



 // image preview

 $(document).ready(function() {
                $("#file-input").on("change", function() {
                    var files = $(this)[0].files;
                    $("#preview-container").empty();
                    if (files.length > 0) {
                        for (var i = 0; i < files.length; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<div class='preview'><img src='" + e.target.result +
                                    "'><button class='delete'>Delete</button></div>").appendTo(
                                    "#preview-container");
                            };
                            reader.readAsDataURL(files[i]);
                        }
                    }
                });


                $("#preview-container").on("click", ".delete", function() {
                    $(this).parent(".preview").remove();
                    $("#file-input").val(""); // Clear input value if needed
                });
            });

</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/Nav/logo.blade.php ENDPATH**/ ?>
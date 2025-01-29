<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
      <h2 class="text-center">Car</h2>
    </div>
    <div class="card-body row">
      <h5 class="card-title col-6">All Cars</h5>
        <span class="col-6 text-end"><a href="<?php echo e(route('product.view')); ?>" class="btn btn-success btn-sm">Add Car</a></span>
        <hr>
      <div class="table-responsive">
        <table class="display table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Discount Price</th>
                <th scope="">Edit</th>
                <th scope="">Delete</th>

              </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                  <th scope="row"><?php echo e(++$index); ?></th>
                  <td style="height: 2rem; width:1rem"><img style="width: 100%; height:100%" src="<?php echo e($car->image_url); ?>" alt=""></td>
                  <td>
                    <?php echo e($car->category->title); ?>

                  </td>
                  <td><?php echo e($car->name); ?></td>
                  <td><?php echo e($car->price); ?></td>

                  <td>
                    <?php if($car->status == 0): ?>
                    <a href="<?php echo e(route('product.status.update', $car->id)); ?> " btn-sm btn-danger> <i class="fa-solid fa-toggle-off h5" style="color: #ac1025;"></i></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('product.status.update', $car->id)); ?>" btn btn-sm btn-success> <i class="fa-solid fa-toggle-on h5" style="color: #63E6BE;"></i></a>
                    <?php endif; ?>



                  </td>

                  <td class="parent_class " id="expanded_employee" data-id=""><a href="<?php echo e(route('product.edit', $car->id)); ?>"><i class='fas fa-edit' style='font-size:1rem'></i></a></td>
                  <td class="text-right deleteBtn">
                    <button class="btn btn-sm" onclick="confirmDelete(<?php echo e($car->id); ?>)">
                        <i class='fas fa-trash' style='font-size:1rem;color:red'></i>
                    </button>
                    <a href="#"  class="btn btn-sm deleteBtn"></a>
                    <form action="<?php echo e(route('product.delete', $car->id)); ?>" id="delete-form-<?php echo e($car->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>

                    </form>

                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

      </div>

    </div>
  </div>
  <div class="col-4 float-end card-header">
    <?php if(session()->has('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('warning')): ?>
    <div class="alert alert-warning mt-3" role="alert">
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('deletesuccess')): ?>
    <div class="alert alert-danger mt-3" role="alert">
        <?php echo e(session('deletesuccess')); ?>

</div>
</div>
<?php endif; ?>
<?php $__env->startPush('customJs'); ?>
<script>

function confirmDelete(carID) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action will delete the product and its images!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform form submission to delete product
            document.getElementById(`delete-form-${carID}`).submit();
        }
    })
}

    $("document").ready(function() {
               setTimeout(function() {
                   $("div.alert").remove();
               }, 2000);
            })
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\Product\all.blade.php ENDPATH**/ ?>
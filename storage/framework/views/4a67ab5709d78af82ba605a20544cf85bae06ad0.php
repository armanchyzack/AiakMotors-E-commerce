<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">All Services</h1>
    <a href="<?php echo e(route('service.view')); ?>" class="btn btn-success mb-3">Add Service</a>

    <!-- Table for displaying services -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($service->name); ?></td>
                        <td><?php echo e($service->price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i></td>
                        <td>
                            <img src="<?php echo e(asset('storage/'.$service->image)); ?>" alt="service image" style="width: 100px; height: 60px; object-fit: cover;">
                        </td>
                        <td>
                            <a href="<?php echo e(route('service.edit', $service->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('service.delete', $service->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Backend\service\all.blade.php ENDPATH**/ ?>
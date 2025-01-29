<?php $__env->startSection('sidenav'); ?>
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="<?php echo e(route('car')); ?>" class="d-flex" style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="<?php echo e(route('accessory')); ?>" class="d-flex" style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="<?php echo e(route('service')); ?>" class="d-flex" style="color: #ffd700">Service <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="<?php echo e(route('spinner')); ?>" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="<?php echo e(route('our.shop.details')); ?>" class="d-flex" style="color: #ffd700">About Us<span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('catefilter'); ?>
<div class="row">
    <div class="col-6">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a class="dropdown-item active" href="<?php echo e(route('category', $cate->slug)); ?>"><?php echo e(Str::ucfirst($cate->title)); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" id="priceFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: inherit; border: 2px solid #ffd700; color: #ffd700;">
                Price Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="priceFilterDropdown">
                <li><a class="dropdown-item" href="<?php echo e(route('accessory', ['price' => 'high_to_low'])); ?>" style="color: #ffd700;">High to Low</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('accessory', ['price' => 'low_to_high'])); ?>" style="color: #ffd700;">Low to High</a></li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('product'); ?>
9
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2  class="text-white">Search Results for "<?php echo e(Str::ucfirst( $query)); ?>"</h2>

    <?php if($cars->isEmpty() && $accessories->isEmpty()): ?>
        <p  style="color: #ffd700;">No products found matching your search.</p>
    <?php else: ?>
        <div class="row">
            <!-- Cars Results -->
            <?php if($cars->isNotEmpty()): ?>
                <div class="col-12">
                    <h3>Cars</h3>
                    <div class="row">
                        <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="card">
                                    <img src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="<?php echo e($car->name); ?>" class="card-img-top" />
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($car->name); ?></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="card-text">Price: <?php echo e($car->price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                            <a href="<?php echo e(route('item.show', ['type' => 'car', 'id' => $car->id])); ?>" class="btn btn-warning btn-sm">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Pagination for Cars -->
                    <div class="d-flex justify-content-center">
                        <?php echo e($cars->appends(['query' => $query])->links()); ?>

                    </div>
                </div>
            <?php endif; ?>

            <!-- Accessories Results -->
            <?php if($accessories->isNotEmpty()): ?>
                <div class="col-12 mt-4">
                    <h3>Accessories</h3>
                    <div class="row">
                        <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="card">
                                    <img src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="<?php echo e($accessory->name); ?>" class="card-img-top" />
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($accessory->name); ?></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php if($accessory->discount_price): ?>
                                                <span class="text-muted text-decoration-line-through"><?php echo e($accessory->price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                                <span class="text-success"><?php echo e($accessory->discount_price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                            <?php else: ?>
                                                <span><?php echo e($accessory->price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('item.show', ['type' => 'accessory', 'id' => $accessory->id])); ?>" class="btn btn-warning btn-sm">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($accessories->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/search_results.blade.php ENDPATH**/ ?>
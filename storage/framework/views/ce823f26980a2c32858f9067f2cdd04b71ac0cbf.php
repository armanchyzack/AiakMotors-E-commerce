<?php $__env->startSection('sidenav'); ?>
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="<?php echo e(route('car')); ?>" class="d-flex"   style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('accessory')); ?>" class="d-flex"  style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('service')); ?>" class="d-flex"  style="color: #ffd700">Service <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('spinner')); ?>" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('our.shop.details')); ?>" class="d-flex" style="color: #ffd700">About Us<span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('catefilter'); ?>
<div class="row">
    <div class="col-6">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100"
                    type="button"
                    id="priceFilterDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="background-color: inherit; border: 2px solid #ffd700; color: #ffd700;">
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
<style>
    #quantity {
            position: absolute;
            top: 20px;
            right: 15px;
            background: black;
            color: #ffd700;
            padding: 0.3rem 0.5rem;
            border-radius: 20px;
            font-size: 0.85rem;
        }
</style>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
    <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col">

        <a href="<?php echo e(route('item.show', ['type' => 'accessory', 'id' => $accessory->id])); ?>" class="text-decoration-none">
            <div class="card h-100">
                <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="<?php echo e($accessory->name); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(Str::ucfirst($accessory->name)); ?></h5>
                    <div id="quantity">
                        <span>
                            <?php if($accessory->stock === 'In Stock'): ?>
                                Available Now
                            <?php elseif($accessory->stock  === 'Out of Stock'): ?>
                                Currently Unavailable
                            <?php elseif($accessory->stock  === 'Limited Stock'): ?>
                                Hurry! Limited Stock
                            <?php endif; ?>
                        </span>
                    </div>
                    <?php if($accessory->discount_price): ?>
                        <h6 class="text-white mt-1 text-bg-light text-decoration-line-through">
                            <?php echo e($accessory->price); ?>

                            <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                        </h6>
                    <?php else: ?>
                        <h6 class="text-white mt-1 text-bg-light">
                            <?php echo e($accessory->price); ?>

                            <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                        </h6>
                    <?php endif; ?>
                    <?php if($accessory->discount_price): ?>
                        <h6 class="text-white mt-1 text-bg-light">
                            <?php echo e($accessory->discount_price); ?>

                            <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                        </h6>
                    <?php endif; ?>
                    <div class="d-flex mt-2 btn-group" >
                        <a href="<?php echo e(route('cart.add', $accessory->id)); ?>" id="contactbtn" class="btn add-to-cart me-2 <?php echo e($accessory->stock === 'Out of Stock' ? 'disabled' : ''); ?>">
                           <i class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i>
                        </a>
                        <form action="<?php echo e(route('checkout.form')); ?>" method="GET">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="subtotal" id="checkout-subtotal" value="<?php echo e($accessory->discount_price && $accessory->discount_valid_time > now() ? $accessory->discount_price : $accessory->price); ?>">
                            <input type="hidden" name="discount" id="checkout-discount" value="0">
                            <input type="hidden" name="total" id="checkout-total" value="<?php echo e($accessory->discount_price && $accessory->discount_valid_time > now() ? $accessory->discount_price : $accessory->price); ?>">
                            <button type="submit" class="btn btn-sm">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-3">
    <?php echo e($accessories->links('pagination::bootstrap-5')); ?>

</div>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/accessory.blade.php ENDPATH**/ ?>
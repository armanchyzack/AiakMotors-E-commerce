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
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Price Filter
            </button>
            <select id="sortOrder" class="dropdown-menu dropdown-menu-dark">
                <option value="high_to_low" class="btn" type="submit">High to Low</option>
                <option value="low_to_high" class="btn">Low to High</option>
            </select>
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

<div class="container">
    <h2 class="text-center" style="color:#ffd700;">Category: <?php echo e(Str::ucfirst($category->title)); ?></h2>

    <!-- Display Cars -->
    <div class="row">
        <h3>Products</h3>
        <?php $__currentLoopData = $paginatedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="card">
                    <img src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?cs=srgb&dl=pexels-mikebirdy-170811.jpg&fm=jpg" class="card-img-top" alt="<?php echo e($product->name); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <div id="quantity">
                            <span>
                                <?php if($product->stock === 'In Stock'): ?>
                                    Available Now
                                <?php elseif($product->stock  === 'Out of Stock'): ?>
                                    Currently Unavailable
                                <?php elseif($product->stock  === 'Limited Stock'): ?>
                                    Hurry! Limited Stock
                                <?php endif; ?>
                            </span>
                        </div>
                        <p class="card-text"><?php echo e(Str::limit($product->description, 100)); ?></p>
                        <p class="card-text">Price: <?php echo e($product->price); ?> <span><i class="fa-solid fa-bangladeshi-taka-sign"></i></span></p>
                        <!-- View Details -->
                        <a href="<?php echo e(route('item.show', ['type' => $product instanceof Car ? 'car' : 'accessory', 'id' => $product->id])); ?>" id="contactbtn" class="btn">View Details</a>

                        <?php if('type' == 'accessory'): ?>{
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
                        }
                     <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($paginatedItems->links('pagination::bootstrap-5')); ?>

    </div>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/cateory_product.blade.php ENDPATH**/ ?>
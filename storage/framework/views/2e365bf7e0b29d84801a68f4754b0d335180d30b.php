<?php $__env->startSection('product'); ?>
    12
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        #related img {
            height: 22vh;
        }

        .prductimg img.card-img-top {
            height: 22vh;
        }

        .breadcrumb {
            display: flex;
            list-style: none;
            padding: 0.75rem 1rem;
            background-color: rgba(170, 182, 7, 0.7);
            backdrop-filter: saturate(180%) blur(10px);
            border-radius: 0.5rem;
        }

        .breadcrumb-item {
            margin-right: 5px;
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #fff;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: #ffd700;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: white;
            content: var(--bs-breadcrumb-divider, "/");
        }

        .carousel img {
            max-height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .card-body h5 {
            color: #ffd700;
        }

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

        .btn {
            border-radius: 20px;
        }

        #relaed .card-img, .card-img-top {
    height: 18vh !important;
    margin: auto;
}
    </style>

    <!-- Breadcrumb -->
    <div class="container p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($crumb['url']): ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo e($crumb['url']); ?>"><?php echo e($crumb['name']); ?></a>
                        </li>
                    <?php else: ?>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo e($crumb['name']); ?>

                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </nav>

        <!-- Product Details -->
        <?php if($type === 'car' || $type === 'accessory'): ?>
            <div class="card col-12 mt-3 mx-auto" style="max-width: 800px;">
                <?php if($type === 'car'): ?>
                    <!-- Carousel -->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if($item && count($image) > 0): ?>
                                <div class="carousel-item active">
                                    <img src="https://www.gemoo-resource.com/tools/img/image_urlgenerator_step2@2x.png" class="d-block w-100" alt="...">
                                </div>
                                <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo e($img->image_url); ?>" class="d-block w-100" alt="...">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo e($item->image_url); ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                <?php else: ?>
                    <img src="https://www.gemoo-resource.com/tools/img/image_urlgenerator_step2@2x.png" class="d-block w-100" alt="<?php echo e($item->name); ?>">
                <?php endif; ?>

                <div class="card-body">
                    <h5 class="card-title"><?php echo e(Str::ucfirst($item->name)); ?></h5>
                    <div id="quantity">
                        <span>
                            <?php if($item->stock === 'In Stock'): ?>
                                Available Now
                            <?php elseif($item->stock  === 'Out of Stock'): ?>
                                Currently Unavailable
                            <?php elseif($item->stock  === 'Limited Stock'): ?>
                                Hurry! Limited Stock
                            <?php endif; ?>
                        </span>
                    </div>
                    <h6 class="text-white mt-1 text-bg-light">
                        <?php if($item->discount_price): ?>
                            <span class="text-decoration-line-through"><?php echo e($item->price); ?> <i
                                    class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                            <span class="ms-2"><?php echo e($item->discount_price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                        <?php else: ?>
                            <?php echo e($item->price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        <?php endif; ?>
                    </h6>
                    <p class="mt-3" style="color: #ffd700;"><?php echo $item->description; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <?php if($type === 'accessory'): ?>
                            <form action="<?php echo e(route('checkout.form')); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="subtotal" value="<?php echo e($item->discount_price ?? $item->price); ?>">
                                <button type="submit" class="btn btn-warning">Buy Now</button>
                            </form>
                        <?php endif; ?>

                        <?php if($type == 'car'): ?>
                            <a href="#social" class="text-start" style="color: #ffd700;">Contact us:</a>
                            <p class="text-end" style="color: #ffd700;" id="phoneNumber" onclick="copyAndCall()">+01888888888</p>
                        <?php elseif($type == 'accessory'): ?>

                            <a href="<?php echo e(route('cart.add', $item->id)); ?>" style="background: inherit; color:#ffd700;" class="btn add-to-cart btn-warning <?php echo e($item->stock === 'Out of Stock' ? 'disabled' : ''); ?>">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </a>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Related Products -->
        <div class="mt-5">
            <h3 class="text-center" style="color: #ffd700;">Related Products</h3>
            <hr>
            <div class="row">
                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="card h-100" id="related">
                            <a href="<?php echo e(route('item.show', ['type' => $type, 'id' => $related->id])); ?>">
                                <img src="https://www.gemoo-resource.com/tools/img/image_urlgenerator_step2@2x.png" class="card-img-top" alt="<?php echo e($related->name); ?>">
                            </a>
                            <div class="card-body text-center">
                                <h6 style="color: #ffd700;"><?php echo e($related->name); ?></h6>
                                <p class="text-white mb-0 d-flex text-center justify-content-between">
                                    <?php if($related->discount_price): ?>
                                        <span class="text-decoration-line-through"><?php echo e($related->price); ?> <i
                                                class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                        <span class="ms-2"><?php echo e($related->discount_price); ?> <i
                                                class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                    <?php else: ?>
                                        <?php echo e($related->price); ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->startPush('customJs'); ?>
    <script>
        function copyAndCall() {
            // Step 1: Copy the number to the clipboard
            const phoneNumber = document.getElementById("phoneNumber").textContent;

            navigator.clipboard.writeText(phoneNumber).then(() => {
                alert("Phone number copied to clipboard!");

                // Step 2: Initiate a call using the phone's call app (works on mobile)
                window.location.href = `tel:${phoneNumber}`;
            }).catch(err => {
                console.error('Error copying text: ', err);
            });
        }
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/product_view.blade.php ENDPATH**/ ?>
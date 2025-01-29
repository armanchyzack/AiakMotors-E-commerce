<?php $__env->startSection('product'); ?>
12
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        #related img{
            height: 22vh;
        }

        .prductimg img.card-img-top {
            height: 22vh;
        }

        img#relatedProductImg {
            height: 20vh;
            width: 70%;
            align-items: center;
        }
        .VwiC3b.yXK7lf.p4wth.r025kc.hJNv6b.Hdw6tb {
    color: #ffd700 !important;
}
div#quantity {
    position: absolute;
    top: 19px;
    right: 15px;
    background: black;
    border-radius: 24%;

}
.breadcrumb {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    background-color: rgba(170, 182, 7, 0.7);
	backdrop-filter: saturate(180%) blur(10px);
    padding-left: 1rem;
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
    </style>


<nav aria-label="breadcrumb " style="">
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
    <?php if($type === 'car'): ?>
        <div class="card col-12 mt-3 m-auto" style="border-radius: 5%">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner prductimg">
                    <?php if(!$item && count($image) > 0): ?>
                        <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                                <img src="<?php echo e($img->image_url); ?>" class="card-img-top" alt="...">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="carousel-item active">
                            <img src="<?php echo e($item->image_url); ?>" class="card-img-top" alt="...">
                        </div>
                        <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item">
                                <img src="<?php echo e($img->image_url); ?>" class="card-img-top" alt="...">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>





            <div class="card-body">
                <h5 class="card-title"><?php echo e(Str::ucfirst($item->name)); ?></h5>
                <?php if($item->discount_price): ?>
                    <h6 class="text-white mt-1 text-bg-light text-decoration-line-through"><?php echo e($item->price); ?> <span><i
                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <?php else: ?>
                    <h6 class="text-white mt-1 text-bg-light"><?php echo e($item->price); ?> <span><i
                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <?php endif; ?>
                <?php if($item->discount_price): ?>
                    <h6 class="text-white mt-1 text-bg-light"><?php echo e($item->discount_price); ?> <span><i
                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <?php endif; ?>
                <div class="d-flex mt-2 buttonn" style="justify-content: space-between;">
                    <p class="" style="color: #ffd700; margin-right:3rem; cursor: pointer;" onclick="copyNumber()">+01889861211</p>
                    <a href="#social" class="btn btn-sm mb-3">Contact Us</a>
                </div>
                <small class="text-sm-center" style="color: #ffd700"><?php echo $item->description; ?></small>

            </div>
        </div>
    <?php elseif($type === 'accessory'): ?>
        <div class="card col-12 mt-3" style="border-radius: 5%">
            <img src="<?php echo e($item->image_url); ?>" alt="...">

            <div class="card-body">
                <h5 class="card-title"><?php echo e(Str::ucfirst($item->name)); ?></h5>
                <div style="color: #ffd700" id="quantity">Limited Stock</div>
            <?php if($item->discount_price): ?>
                <h6 class="text-white mt-1 text-bg-light text-decoration-line-through"><?php echo e($item->price); ?> <span><i
                            class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
            <?php else: ?>
                <h6 class="text-white mt-1 text-bg-light"><?php echo e($item->price); ?> <span><i
                            class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
            <?php endif; ?>
            <?php if($item->discount_price): ?>
                <h6 class="text-white mt-1 text-bg-light"><?php echo e($item->discount_price); ?> <span><i
                            class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
            <?php endif; ?>

                <small class="text-sm-center" style="color: #ffd700"><?php echo $item->description; ?></small>
                <div class="d-flex mt-2 buttonn">
                    <a t class="btn btn-light me-2"><i class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i></a>
                    <a href="" class="btn btn-sm">Buy Now</a>
                </div>
            </div>
        </div>
    <?php endif; ?>









    <hr style="color: #ffd700">
    <h1 style="color: #ffd700; text-align:center;">Realated Product</h1>
    <hr style="color: #ffd700; font-size:2px">
    <div class="card col-12 h-16 m-auto text-center" style="border-radius: 5%">
        <div id="relatedCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="related">
                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                    <img class="d-block w-100" src="<?php echo e($related->image_url); ?>" alt="Related product image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($related->name); ?></h5>
                        <!-- Price logic -->
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#relatedCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#relatedCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>


    </div>
    <hr style="color: #ffd700">
    <h1 style="color: #ffd700; text-align:center;">Comment</h1>
    <hr style="color: #ffd700; font-size:2px">
    <!-- Carousel wrapper -->
    <div class="card col-12 h-16 m-auto text-center" style="border-radius: 5%">
        <div id="commentCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h5 class="mb-3" style="color: #ffd700"><?php echo e(Str::ucfirst($comment->user->name)); ?></h5>
                            <p  style="color: #ffd700" >
                                <i class="fas fa-quote-left pe-2" style="color: #ffd700"></i><?php echo e($comment->content); ?>

                                <i class="fas fa-quote-right pe-2" style="color: #ffd700"></i>
                            </p>
                            <small style="color: #ffd700"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#commentCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#commentCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>


    <?php if(Auth::check()): ?>
    <!-- Carousel wrapper -->
    <hr style="color: #ffd700">
    <h1 style="color: #ffd700; text-align:center;">Add a Comment Below</h1>
    <hr style="color: #ffd700; font-size:2px">
    <div class="card col-12 h-16 m-auto text-center" style="border-radius: 5%">
        <div class="container">
            <form action="<?php echo e(route('comments.store')); ?>"  method="POST">
                <?php echo csrf_field(); ?>
              <div class="form-group">
                <textarea style="border:2px solid #ffd700" class="form-control status-box" name="content" rows="3" placeholder="Enter your comment here..."></textarea>
              </div>
              <input type="hidden" name="product_id" value="<?php echo e($item->id); ?>">
              <button type="submit" class="btn mt-2">Submit</button>
            </form>
          </div>
    </div>

    <?php else: ?>
    <p style="color: #ffd700" class="text-center m-3">Please <a class="nav-link" href="<?php echo e(route('user.login')); ?>">log in</a> to comment.</p>
<?php endif; ?>



<?php $__env->startPush('customJs'); ?>
<script>
    function copyNumber() {
      // Create a temporary input element to hold the number
      const tempInput = document.createElement('input');
      tempInput.value = '+01889861211'; // The number to be copied
      document.body.appendChild(tempInput);

      // Select the text in the input
      tempInput.select();
      tempInput.setSelectionRange(0, 99999); // For mobile devices

      // Copy the selected text
      document.execCommand('copy');

      // Remove the temporary input element
      document.body.removeChild(tempInput);

      // Optional: Alert or notify the user
      alert('Phone number copied: ' + tempInput.value);
    }




  </script>
<?php $__env->stopPush(); ?>














<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\product_view.blade.php ENDPATH**/ ?>
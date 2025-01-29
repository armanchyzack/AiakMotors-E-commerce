<?php $__env->startSection('content'); ?>

<style>
    @media (max-width: 576px) {
        table {
            font-size: 12px;
        }
        .badge {
            font-size: 10px;
        }
        .order-item p {
            font-size: 12px;
        }
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #2d2d2d;
    }
    .table-striped tbody tr:nth-of-type(even) {
        background-color: #1f1f1f;
    }
    table.table.table-striped {
        color: #ffd700 !important;
    }
    td {
        color: #ffd700 !important;
    }
    hr {
        color: #ffd700;
    }
    h1 {
        color: #ffd700;
    }
    .alert-info {
        color: #ffd700;
        background-color: inherit;
        border-color: #ffd700;
    }
    .order-item {
        margin-bottom: 10px;
    }
    .order-item p {
        margin: 0;
    }
</style>

<div class="container my-5">
    <h1 class="text-center mb-4">Your Order List:</h1>
    <hr/>

    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-info text-center">You have no orders yet.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>৳<?php echo e(number_format($order->total, 2)); ?></td>
                            </td>
                            <td><?php echo e($order->created_at->format('d M, Y')); ?></td>
                            <td>
                                <?php if($order->product_names): ?>
                                    <p><?php echo e($order->product_names); ?></p>
                                <?php else: ?>
                                    <p>No product names available.</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>





        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/Profile/orderlist.blade.php ENDPATH**/ ?>
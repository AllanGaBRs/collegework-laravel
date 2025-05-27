<?php $__env->startSection('content'); ?>
<style>
    .product-image {
        max-width: 200px;
        max-height: 100px;
        border-radius: 8px;
        object-fit: cover;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .product-image:hover {
        transform: scale(1.8);
        z-index: 10;
        position: relative;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4">Products</h2>
    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary mb-3">
        Add New Product
    </a>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Supplier</th>
                <th>Image</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($product->name); ?></td>
                <td>$ <?php echo e(number_format($product->price, 2, '.', ',')); ?></td>
                <td><?php echo e($product->supplier->name ?? 'N/A'); ?></td>
                <td>
                    <?php if($product->image): ?>
                    <img src="data:image/jpeg;base64,<?php echo e(base64_encode($product->image)); ?>" alt="Imagem do produto" class="product-image">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                    <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="text-center">No products found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\allan\college-laravel-crud-main\resources\views/products/index.blade.php ENDPATH**/ ?>
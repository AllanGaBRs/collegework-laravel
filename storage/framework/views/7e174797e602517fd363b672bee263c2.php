<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Edit Product</h2>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Product Name:</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="<?php echo e(old('name', $product->name)); ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input
                type="number"
                name="price"
                id="price"
                step="0.01"
                class="form-control"
                value="<?php echo e(old('price', $product->price)); ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier:</label>
            <select
                name="supplier_id"
                id="supplier_id"
                class="form-select"
                required>
                <option value="">-- Select Supplier --</option>
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($supplier->id); ?>"
                    <?php echo e(old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : ''); ?>>
                    <?php echo e($supplier->name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Product Image:</label>
            <input
                type="file"
                name="image"
                id="image"
                class="form-control"
                accept="image/*">
            <?php if($product->image): ?>
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Current Image:</label>
                <img src="data:image/jpeg;base64,<?php echo e(base64_encode($product->image)); ?>" alt="Current Product Image" style="max-width: 200px; border-radius: 6px; margin-bottom: 10px;">
            </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">Back to Products</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\collegework-laravel-main\resources\views/products/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Create Product</h2>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="mb-3">
        <label for="name" class="form-label">Product Name:</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control"
            value="<?php echo e(old('name')); ?>" 
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
            value="<?php echo e(old('price')); ?>" 
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
                    <?php echo e(old('supplier_id') == $supplier->id ? 'selected' : ''); ?>>
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
    </div>

    <button type="submit" class="btn btn-success me-2">Create</button>
    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">Back to Products</a>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\collegework-laravel-main\resources\views/products/create.blade.php ENDPATH**/ ?>
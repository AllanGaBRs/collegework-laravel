<?php $__env->startSection('content'); ?>
<h2>Create Product</h2>

<?php if($errors->any()): ?>
<div style="background-color: #f8d7da; color: #842029; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
    <ul style="margin: 0; padding-left: 20px;">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<form action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data" method="POST" style="max-width: 400px;">
    <?php echo csrf_field(); ?>

    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Product Name:</label>
        <input
            type="text"
            name="name"
            id="name"
            value="<?php echo e(old('name')); ?>"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">Price:</label>
        <input
            type="number"
            name="price"
            id="price"
            step="0.01"
            value="<?php echo e(old('price')); ?>"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 20px;">
        <label for="supplier_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Supplier:</label>
        <select
            name="supplier_id"
            id="supplier_id"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">-- Select Supplier --</option>
            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($supplier->id); ?>" <?php echo e(old('supplier_id') == $supplier->id ? 'selected' : ''); ?>>
                <?php echo e($supplier->name); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">Product Image:</label>
            <input
                type="file"
                name="image"
                id="image"
                accept="image/*"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
    </div>

    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border:none; border-radius: 4px; cursor: pointer;">
        Create
    </button>

    <a href="<?php echo e(route('products.index')); ?>" style="margin-left: 15px; color: #555; text-decoration: underline;">
        Back to Products
    </a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\collegework-laravel-main\resources\views/products/create.blade.php ENDPATH**/ ?>
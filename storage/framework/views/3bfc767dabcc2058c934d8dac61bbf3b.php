<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Image Upload</h2>
        <form action="<?php echo e(url('/avatar/upload')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image_path">Image</label>
                <input type="file" name="image_path" id="image_path" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        <hr>

        <h2>Uploaded Images</h2>
        <div class="row">
            <?php $__currentLoopData = $avatars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avatar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo e(Storage::url(  $avatar->image_path )); ?>" alt="<?php echo e($avatar->title); ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($avatar->title); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\PhpstormProjects\PAK\resources\views/avatar/all.blade.php ENDPATH**/ ?>
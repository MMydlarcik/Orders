

<?php $__env->startSection('content'); ?>
    <form method="post" action="<?php echo e(route('login.perform')); ?>">
        
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <?php echo $__env->make('layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group col-md-4 col-md-offset-4">
            <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            <?php if($errors->has('username')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('username')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group col-md-4 col-md-offset-4">
            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            <?php if($errors->has('password')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>

        <button class="w-30 btn btn-lg btn-primary" type="submit">Login</button>
        
        <?php echo $__env->make('auth.partials.copy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\orders\resources\views/auth/login.blade.php ENDPATH**/ ?>
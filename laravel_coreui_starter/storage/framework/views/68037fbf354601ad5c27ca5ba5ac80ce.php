

<?php $__env->startSection('content'); ?>
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                  <?php echo csrf_field(); ?>
                  <h1>Login</h1>
                  <p class="text-body-secondary">Sign in to your account</p>

                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="cil-user"></i></span>
                    <input class="form-control" type="email" name="email" placeholder="Email" required autofocus>
                  </div>

                  <div class="input-group mb-4">
                    <span class="input-group-text"><i class="cil-lock-locked"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-end">
                      <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>" class="btn btn-link px-0">Forgot password?</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="card text-white bg-primary py-5" style="width: 44%">
              <div class="card-body text-center">
                <h2>Sign up</h2>
                <p>New to the app? Create your account to access the dashboard.</p>
                <a href="<?php echo e(route('register')); ?>" class="btn btn-primary mt-3 active">Register now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/resources/views/auth/login.blade.php ENDPATH**/ ?>
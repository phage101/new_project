

<?php $__env->startSection('content'); ?>
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4 mb-0">
              <div class="card-body">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                  <?php echo csrf_field(); ?>
                  <h1>Register</h1>
                  <p class="text-body-secondary">Create your account</p>

                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="cil-user"></i></span>
                    <input class="form-control" type="text" name="name" placeholder="Name" required>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="cil-envelope-open"></i></span>
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="cil-lock-locked"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                  </div>

                  <div class="input-group mb-4">
                    <span class="input-group-text"><i class="cil-lock-locked"></i></span>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Repeat password" required>
                  </div>

                  <button class="btn btn-success w-100" type="submit">Create Account</button>
                </form>
              </div>
            </div>

            <div class="card text-white bg-primary py-5" style="width: 44%">
              <div class="card-body text-center">
                <h2>Welcome back</h2>
                <p>Already have an account? Sign in and continue where you left off.</p>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mt-3 active">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/resources/views/auth/register.blade.php ENDPATH**/ ?>
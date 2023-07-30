<?= $this->extend('auth/template'); ?>

<?= $this->Section('content'); ?>
<div class="col-lg-6 mt-5 p-3 text-center">
    <img src="<?php base_url() ?>/img/logosmk.png" width="200px" height="200px" style="align: center;" alt="text" class="">
    <h2 class="mt-3">SISPP</h2>
    <p class="mt-3" style="font-weight: bold; font-size:20px;">Sistem Informasi Pembayaran SPP</p>

</div>

<div class="col-lg-6">
    <div class="container  p-5 bg-success text-white">
        <h2 class="text-center p-2">LOGIN</h2>
        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="<?= route_to('login') ?>" method="post">
            <?= csrf_field() ?>

            <?php if ($config->validFields === ['email']) : ?>
                <div class="form-group">
                    <label for="login"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="form-group mb-3">
                    <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="password"><?= lang('Auth.password') ?></label>
                <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>

            <?php if ($config->allowRemembering) : ?>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <?= lang('Auth.rememberMe') ?>
                    </label>
                </div>
            <?php endif; ?>

            <br>

            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
        </form>


        <?php if ($config->allowRegistration) : ?>
            <p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
        <?php endif; ?>
        <?php if ($config->activeResetter) : ?>
            <p class="mt-3 text-white"><a href="<?= route_to('forgot') ?>" class="text-white" style='font-size:20px; text-decoration:none;'>Lupa Password ?</a></p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endsection(); ?>
<?= $this->extend('auth/template'); ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="">

            <div class="card">
                <h2 class="card-header bg-info">Lupa Password ?</h2>
                <div class="card-body">


                    <form action="<?= url_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mt-2 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="masukkan email ">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
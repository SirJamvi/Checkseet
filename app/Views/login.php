<?= $this->extend('layout/templ-home'); ?>

<?= $this->extend('layout/templ-home'); ?>

<?= $this->section('content'); ?>
<main>

<?= $this->include('layout/navbar'); ?>

<link rel="stylesheet" href="assets/css/daterangepicker.css">
<link rel="stylesheet" href="assets/css/global.css">

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Log in</h3>
                    <form name="login" action="<?php echo base_url();?>login" method="POST">
                    <?= csrf_field(); ?>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="empid" name="empid" class="form-control form-control-lg" placeholder="Employee Id"/>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                        </div>
                        <div>
                            <p>Untuk password, sementara masih sama dengan Emp ID</p>
                        </div>

                        <!-- Checkbox -->
                        <!-- <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                            <label class="form-check-label" for="form1Example3"> Remember password </label>
                        </div> -->

                        <div class="mb-3 row">
                            <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('message'); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>

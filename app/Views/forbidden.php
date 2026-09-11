
<?= $this->extend('layout/templ-home'); ?>

<?= $this->section('content'); ?>
<main>

    <div class="bg-dark text-white py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-2 text-center">
                    <p>
                        <i class="fa fa-exclamation-triange fa-5x">Status Code: 403</i>
                    </p>
                </div>
                <div class="col-md-10">
                    <h3>OOPSS Sorry</h3>
                    <p>
                        You dont have access due to security reasons.
                    </p>
                </div>
                <a href="javascript:history.back()" class="btn btn-danger">Go Back</a>
            </div>
        </div>
    </div>
  
</main>
<?= $this->endSection(); ?>
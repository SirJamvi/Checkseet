<form action="<?= base_url('machine/update') ?>" method="POST">
    <?= csrf_field(); ?>
    <!-- Hidden ID untuk acuan update data -->
    <input type="hidden" name="id" value="<?= $machine['id'] ?>">
    
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label font-weight-bold">Process Code</label>
        <div class="col-sm-9">
            <input type="text" name="process_code" class="form-control" value="<?= $machine['process_code'] ?>" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label font-weight-bold">Nama Mesin</label>
        <div class="col-sm-9">
            <input type="text" name="machine_name" class="form-control" value="<?= $machine['machine_name'] ?>" required>
            <small class="text-muted">*Sistem akan mengubahnya menjadi huruf kapital secara otomatis.</small>
        </div>
    </div>

    <div class="modal-footer mt-4 pb-0 pe-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan perubahan data mesin ini?');">Update Data</button>
    </div>
</form>
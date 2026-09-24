<?= $this->extend('layout/templ-home'); ?>

<?= $this->section('content'); ?>
<main>
    <?= $this->include('layout/navbar'); ?>

    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <link rel="stylesheet" href="assets/css/global.css">

    <div class="container-fluid">
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold">Machine Data</h3>
            </div>
            <div class="card-body">
                <!-- Tombol Add Machine memanggil Modal Input -->
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInput">
                    <i class="fas fa-plus"></i> Add Machine
                </button>
                
                <!-- Tabel Data Machine -->
                <table class="table table-striped table-responsive mt-3" id="table-machine" style="width:100%">
                    <thead align="center">
                        <tr>
                            <th>No.</th>
                            <th>Process Code</th>
                            <th>Machine Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($alldata as $index => $machine): ?>
                            <tr>
                                <td class="text-center align-middle"><?= $index + 1; ?></td>
                                <td class="align-middle"><?= $machine['process_code']; ?></td>
                                <td class="align-middle"><?= $machine['machine_name']; ?></td>
                                <td class="text-center align-middle">
                                    <!-- Tombol Edit (Biru) memanggil Modal Edit via AJAX -->
                                    <button type="button" data-bs-target="#modalEdit" data-bs-toggle="modal" class="btn btn-primary btn-sm edit-button" data-id="<?= $machine['id']; ?>">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <!-- Tombol Delete (Merah) memanggil AJAX Hapus -->
                                    <button type="button" class="btn btn-danger btn-sm delete-button" data-id="<?= $machine['id']; ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL INPUT MACHINE BARU -->
    <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalInputLabel"><i class="fas fa-server"></i> Registrasi Mesin Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('machine/save') ?>" method="POST">
                        <?= csrf_field(); ?>
                        
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label font-weight-bold">1. Device</label>
                            <div class="col-sm-9">
                                <select id="device" class="form-select" required>
                                    <option value="">-- Pilih Device --</option>
                                    <?php foreach ($devices as $d): ?>
                                        <option value="<?= $d['code'] ?>"><?= $d['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label font-weight-bold">2. Tipe</label>
                            <div class="col-sm-9">
                                <select id="type" class="form-select" disabled required>
                                    <option value="">Pilih device terlebih dahulu</option>
                                    <option value="production">Production</option>
                                    <option value="startup">Startup</option>
                                    <option value="foregoing">Foregoing</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label font-weight-bold">3. Process</label>
                            <div class="col-sm-9">
                                <select id="process_code" name="process_code" class="form-select" disabled required>
                                    <option value="">Pilih tipe terlebih dahulu</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label font-weight-bold">4. Nama Mesin</label>
                            <div class="col-sm-9">
                                <input type="text" name="machine_name" class="form-control" placeholder="Contoh : FFDB 2.14" required>
                                <small class="text-muted">*Sistem akan mengubahnya menjadi huruf kapital otomatis.</small>
                            </div>
                        </div>

                        <div class="modal-footer mt-4 pb-0 pe-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan data mesin baru ini?');">Submit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT MACHINE (Kosong, diisi oleh AJAX) -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalEditLabel"><i class="fa-regular fa-pen-to-square"></i> Edit Data Mesin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-edit">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Memuat data dari server...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sistem Notifikasi Bawaan (Tersembunyi) -->
    <?php if (session()->getFlashdata('message')): ?>
        <p id="msgsuccess" class="invisible"><?= session()->getFlashdata('message') ?></p>
    <?php else: ?>
        <p id="msgsuccess" class="invisible">Kosong</p>
    <?php endif; ?>

</main>

<!-- Load Library JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/dataTable.js"></script>
<script src="assets/js/dataTables.bootstrap4.js"></script>

<script>
$(document).ready(function() {
    // 1. Inisialisasi DataTables
    $('#table-machine').DataTable();

    // 2. Trigger Notifikasi dari Flashdata
    if($('#msgsuccess').html() !== "Kosong"){
        alert($('#msgsuccess').html());
    }

    // 3. Fungsi AJAX Cascading Dropdown untuk Form Input
    function loadProcesses() {
        var deviceCode = $('#device').val();
        var docType = $('#type').val();
        var processSelect = $('#process_code');

        processSelect.empty().append('<option value="">Memuat data...</option>').prop('disabled', true);

        if (deviceCode !== '' && docType !== '') {
            $.ajax({
                url: "<?= base_url('machine/get-processes') ?>",
                type: "GET",
                data: { device_code: deviceCode, type: docType },
                dataType: "JSON",
                success: function(response) {
                    processSelect.empty();
                    if(response.length > 0) {
                        processSelect.append('<option value="">-- Pilih Process --</option>');
                        $.each(response, function(index, item) {
                            processSelect.append('<option value="' + item.process_code + '">' + item.name + ' (' + item.process_code + ')</option>');
                        });
                        processSelect.prop('disabled', false);
                    } else {
                        processSelect.append('<option value="">Tidak ada process untuk kriteria ini</option>');
                    }
                },
                error: function() {
                    alert("Gagal mengambil data proses dari server!");
                }
            });
        } else {
            processSelect.empty().append('<option value="">Pilih tipe terlebih dahulu</option>');
        }
    }

    // Trigger saat Dropdown Device berubah
    $('#device').change(function() {
        if ($(this).val() !== '') {
            $('#type').prop('disabled', false);
        } else {
            $('#type').val('').prop('disabled', true);
        }
        loadProcesses();
    });

    // Trigger saat Dropdown Tipe berubah
    $('#type').change(function() {
        loadProcesses();
    });

    // 4. AJAX Load Form Edit ke dalam Modal
    $('#modalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var id = button.data('id'); 
        var modal = $(this);
        
        // Tampilkan loading spinner sebelum data masuk
        modal.find('#modal-body-edit').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Memuat data dari server...</p></div>');

        $.ajax({
            url: "<?= base_url('machine/edit/') ?>" + id, 
            dataType: 'html',
            success: function(data) {
                modal.find('#modal-body-edit').html(data);
            },
            error: function() {
                modal.find('#modal-body-edit').html('<p class="text-danger text-center py-4">Gagal memuat data. Periksa koneksi atau server.</p>');
            }
        });
    });

    // 5. AJAX Hapus Data (Delete)
    $('#table-machine').on('click', '.delete-button', function() {
        var id = $(this).data('id');
        if (confirm('Yakin ingin menghapus mesin ini dari database secara permanen?')) {
            $.ajax({
                url: '<?= base_url("machine/") ?>' + id,
                type: 'DELETE',
                success: function(result) {
                    alert('Data mesin berhasil dihapus!');
                    location.reload(); // Reload halaman untuk update DataTables
                },
                error: function() {
                    alert('Terjadi kesalahan saat mencoba menghapus data.');
                }
            });
        }
    });
});
</script>
<?= $this->endSection(); ?>
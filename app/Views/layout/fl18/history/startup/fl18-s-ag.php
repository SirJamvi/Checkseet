<?php require_once(dirname( __FILE__ ). '/'.'../../../fillHistory.php'); ?>
<div class="table-responsive mt-3" id="fl18-s-ag">
<input type="hidden" id="cnt-table" value="1">
    <?= csrf_field(); ?>
    <table class="table table-bordered table-hover" id="table1">
        <thead align="center">
            <tr>
                <th colspan="<?= 7 + count($alldata) ?>" scope="col"><?php echo nl2br("AG PASTE HARDENING OVEN"); ?></th>
            </tr>
            <tr>
                <th class="input-form" scope="col" rowspan="2">No</th>
                <th class="input-form" scope="col" rowspan="2">Date</th>
                <th class="input-form" scope="col" colspan="4">Start Up Check Item</th>
                <th class="input-form" scope="col" rowspan="2">Note</th>
                <th class="input-form" scope="col" rowspan="2">Status Approval</th>
                <th class="input-form" scope="col" rowspan="2">Operator</th>
                <th class="input-form" scope="col" rowspan="2">Time</th>
            </tr>
            <tr>
                <th class="input-form">A</th>
                <th class="input-form">B</th>
                <th class="input-form">C</th>
                <th class="input-form">D</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($alldata) && is_array($alldata) && count($alldata) > 0) { ?>
                <?php foreach ($alldata as $key => $data) { ?>
                    <tr>
                        <td colspan="col"><?= $key + 1; ?></td>
                        <td colspan="col"><?= date('d/m/Y', strtotime($data['created_at'])); ?></td>
                        <td colspan="col"><?= fillHistory($data['par001'], 150, 160); ?></td>
                        <td colspan="col"><?= fillHistory($data['par002'],25,35); ?></td>
                        <td colspan="col"><?= htmlspecialchars($data['par003']); ?></td>
                        <td colspan="col"><?= htmlspecialchars($data['par004']); ?></td>
                        <td colspan="col"><?= htmlspecialchars($data['par005']); ?></td>
                        <td colspan="col"><?= htmlspecialchars($data['status']); ?></td>
                        <td colspan="col"><?= $data['role'] ? htmlspecialchars($data[$data['role']]) : ''; ?></td>
                        <td colspan="col"><?= date('H:i', strtotime($data['updated_at'])); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="<?= 7 + count($alldata) ?>">No data available</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        console.log("ready 2");
    });
</script>
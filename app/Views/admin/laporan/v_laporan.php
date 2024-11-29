<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('content'); ?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(<?= base_url() ?>/assets/img/illustrations/corner-4.png);">
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <h5 class="mb-0">Laporan Pengaduan Layanan di Lingkungan Pemerintah Kabupaten Toba</h5>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col">
                <a class="btn btn-danger" href="<?php echo site_url('admin2045/laporan/exportPdf') ?>"><i class="fas fa-file-pdf"></i> Export PDF</a>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row list">
            <div class="col">

                <table id="news_table" width="100%" class="table mb-0 table-striped table-dashboard data-table border-bottom border-200">
                    <thead class="bg-200">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Jenis Layanan</th>
                            <th>Tempat Layanan</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php
                            $i = 1;
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td style="white-space: normal; word-wrap: break-word; text-align: justify;"><?= $row['nik'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['no_hp'] ?></td>
                                    <td><?= $row['pendidikan'] ?></td>
                                    <td><?= $row['pekerjaan'] ?></td>
                                    <td><?= $row['jenis_layanan'] ?></td>
                                    <td><?= $row['tempat_layanan'] ?></td>
                                    <td>
                                        <button onclick="detaildata('<?= $row['nik'] ?>', '<?= $row['created_at'] ?>')" class="btn btn-sm btn-falcon-warning mb-1" title="Lihat Detail"><i class="fas fa-eye"></i></button>&nbsp;
                                        <button onclick="deletedata('<?= $row['nik'] ?>', '<?= $row['created_at'] ?>')" class="btn btn-sm btn-falcon-danger mb-1" title="Hapus Data"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="30">Tidak ada data yang tersedia</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?php $this->section('script') ?>
<script>
    function dataindex() {
        $('#news_table').DataTable({
            'processing': true,
            'serverSide': false,
            'scrollX': true,
            'searchDelay': 350,
            'responsive': false,
            'lengthChange': true,
            'autoWidth': true,
            'language': {
                'emptyTable': 'Belum ada data'
            },
            'destroy': true
        });
    }

    $(document).ready(function() {
        $('#news_table').DataTable().columns.adjust();
        setTimeout(function() {
            dataindex();
        }, 100);
    });

    function detaildata(nik, createdAt) {
        $.get("<?= site_url('admin2045/laporan/detail') ?>/" + nik + "/" + createdAt, function(data, status) {
            $("#detail_data").html(data);
            $('#detail').modal('toggle');
        });
    }

    function deletedata(nik, createdAt) {
        $('#alert_modal').modal('show');
        $("#click_yes").off("click").on("click", function() {
            $.ajax({
                type: 'DELETE',
                url: "<?= site_url('admin2045/laporan/delete') ?>/" + nik + "/" + createdAt,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#alert_modal').modal('hide');
                    showToast('success', response.message);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    showToastError(error, xhr.responseJSON);
                }
            });
        });
    }
</script>
<?php $this->endSection(); ?>
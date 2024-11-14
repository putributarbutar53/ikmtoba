<!-- home.php -->
<?php $this->extend('admin/layout/main') ?>

<?php $this->section('content') ?>
<!-- Page content goes here -->

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(<?= base_url() ?>assets/img/illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="mb-0">Dashboard</h3>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center justify-content-between">
            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Rating Pengunjung</h5>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="container">
            <div class="row">
                <!-- Rating 5 -->
                <div class="col-12 d-flex align-items-center">
                    <div class="raty" data-options='{"readOnly":true,"score":5}'></div>
                    <span class="ml-2">
                        <span id="rating-5-count">
                            <?= isset($ratingCounts[5]) ? $ratingCounts[5] : 0 ?>
                        </span> orang
                    </span>
                </div>
                <!-- Rating 4 -->
                <div class="col-12 d-flex align-items-center">
                    <div class="raty" data-options='{"readOnly":true,"score":4}'></div>
                    <span class="ml-2">
                        <span id="rating-4-count">
                            <?= isset($ratingCounts[4]) ? $ratingCounts[4] : 0 ?>
                        </span> orang
                    </span>
                </div>
                <!-- Rating 3 -->
                <div class="col-12 d-flex align-items-center">
                    <div class="raty" data-options='{"readOnly":true,"score":3}'></div>
                    <span class="ml-2">
                        <span id="rating-3-count">
                            <?= isset($ratingCounts[3]) ? $ratingCounts[3] : 0 ?>
                        </span> orang
                    </span>
                </div>
                <!-- Rating 2 -->
                <div class="col-12 d-flex align-items-center">
                    <div class="raty" data-options='{"readOnly":true,"score":2}'></div>
                    <span class="ml-2">
                        <span id="rating-2-count">
                            <?= isset($ratingCounts[2]) ? $ratingCounts[2] : 0 ?>
                        </span> orang
                    </span>
                </div>
                <!-- Rating 1 -->
                <div class="col-12 d-flex align-items-center">
                    <div class="raty" data-options='{"readOnly":true,"score":1}'></div>
                    <span class="ml-2">
                        <span id="rating-1-count">
                            <?= isset($ratingCounts[1]) ? $ratingCounts[1] : 0 ?>
                        </span> orang
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center justify-content-between">
            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Account</h5>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="container">
            <div class="row">
                <div class="col-sm"><a href="<?= site_url('admin2045/dashboard') ?>"><img src="<?= base_url() ?>assets/icon/1797890_62.png" /></a><br />Dashboard</div>
                <?php if (session()->get('admin_role') == 'superadmin') { ?>
                    <div class="col-sm"><a href="<?= site_url('admin2045/admin') ?>"><img src="<?= base_url() ?>assets/icon/1797890_86.png" /></a><br />Admin</div>
                <?php } ?>
                <div class="col-sm"><a href="<?= site_url('admin2045/profile') ?>"><img src="<?= base_url() ?>assets/icon/1797890_22.png" /></a><br />Profile</div>
                <div class="col-sm"><a href="<?= site_url('admin2045/logout') ?>"><img src="<?= base_url() ?>assets/icon/1797890_46.png" /></a><br />Logout</div>
            </div>
        </div>
    </div>
</div>
<?php $this->endsection() ?>
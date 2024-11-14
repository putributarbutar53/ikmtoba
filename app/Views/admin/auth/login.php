<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pages Login | Admin</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>favicons/site.webmanifest">
    <meta name="theme-color" content="#ffffff">

    <script src="<?php echo base_url() ?>assets/js/config.navbar-vertical.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="<?php echo base_url() ?>assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/theme.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Custom background design */
        body {
            background-image: url('<?= base_url() ?>assets/img/gambar.jpg'); /* Path gambar Anda */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            height: 100%;
            position: relative;
            color: #fff;
        }

        /* Center the card and give it some shadow */
        .card {
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            background-color: #ffffff;
        }

        .main {
            z-index: 1;
            position: relative;
        }

        /* Button custom styling */
        .btn-warning {
            background-color: #f76b1c;
            border: none;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-warning:hover {
            background-color: #f5a623;
            transform: scale(1.05);
        }

        /* Form input styling */
        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .form-group input {
            padding-left: 35px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        /* Text and link color */
        h5,
        .fs--1 {
            color: #fff;
        }

        /* Input focus effect */
        .form-group input:focus {
            border-color: #f76b1c;
            box-shadow: 0 2px 10px rgba(247, 107, 28, 0.3);
        }

    </style>
</head>

<body>

    <!-- Main Content -->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <!-- Image included inside the card -->
                            <img src="<?= base_url() ?>assets/img/gambar.jpg" alt="Login Image" class="img-fluid mb-4" style="max-height: 200px; width: 100%; object-fit: cover;">

                            <?php
                            $session = \Config\Services::session();
                            if ($session->getFlashdata('warning')) {
                            ?>
                                <?php
                                foreach ($session->getFlashdata('warning') as $val) {
                                ?><div class="alert alert-warning alert-dismissible mb-1 fade show" role="alert"><?= $val ?>
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                                    </div>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            if ($session->getFlashdata('success')) {
                            ?>
                                <div class="alert alert-success"><?php echo $session->getFlashdata('success') ?></div>
                            <?php
                            }
                            ?>
                            <div class="row text-left justify-content-between align-items-center mb-2">
                                <div class="col-auto">
                                    <h5>Log in</h5>
                                </div>
                            </div>
                            <form method="POST" action="<?php echo site_url('admin2045/login') ?>">
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <input class="form-control" type="text" name="username" placeholder="Username" value="<?php if ($session->getFlashdata('username')) echo $session->getFlashdata('username') ?>" />
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-lock"></i>
                                    <input class="form-control" type="password" name="password" placeholder="Password" />
                                </div>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="basic-checkbox" name="remember_me" value="1" />
                                            <label class="custom-control-label" for="basic-checkbox">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-auto"><a class="fs--1" href="<?php echo site_url('admin2045/forgotpassword') ?>">Forgot Password?</a></div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning btn-block mt-3" type="submit" name="submit"><i class="fas fa-sign-in-alt"></i> Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/@fortawesome/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/stickyfilljs/stickyfill.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/sticky-kit/sticky-kit.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/is_js/is.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/lodash/lodash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/theme.js"></script>

</body>

</html>

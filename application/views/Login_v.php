<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seamotech</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sh_toaster.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css')?>" />
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sh_toaster.js')?>"></script>
    <script>
        var BASE_URL = '<?php echo base_url()?>';
    </script>
</head>

<body>
    <div class="sh-toast-container" id="shToastContainerTop"></div>
    <div class="sh-toast-container" id="shToastContainerBottom"></div>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="login_c" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="assets/img/dark-logo.png" width="300" alt="">
                                </a>
                                <div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">User name</label>
                                        <input type="text" class="form-control" id="username" placeholder="User name"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" id="login-btn">Sign
                                        In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/pages/login.js"></script>
</body>

</html>
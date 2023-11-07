<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seamotech</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sh_toaster.css')?>" />
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <style>
        #login-btn{
            border-radius: 4px;
            background: #0D2E61;
            width: 100%;
            color: white;
            text-transform: uppercase;
            border: none;
            height: 50px;
            font-weight: 500;
            letter-spacing: 1.6px;
            font-size: 16px;
        }
    </style>
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sh_toaster.js')?>"></script>
    <script>
    var BASE_URL = '<?php echo base_url()?>';
    </script>
</head>

<body>
    <div class="sh-toast-container" id="shToastContainerTop"></div>
    <div class="sh-toast-container" id="shToastContainerBottom"></div>
    <div class="bg-white min-vh-100 d-flex justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3">
                <div class="card p-4 shadow">
                    <a href="login_c" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <img src="assets/img/dark-logo.png" width="300" alt="">
                    </a>
                    <div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <button id="login-btn">Sign In</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="assets/js/pages/login.js"></script>
</body>

</html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sh_toaster.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/simplebar.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tabler-icons.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/modal.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css')?>" />
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sh_toaster.js')?>"></script>
    <script src="<?php echo base_url('assets/js/apexcharts.min.js')?>"></script>
    <script>
        var BASE_URL = '<?php echo base_url()?>';
    </script>
</head>
<body>
    <div class="waitting-screen" style="display:none">
        <div class="loader"></div>
    </div>
    <div class="sh-toast-container" id="shToastContainerTop"></div>
    <div class="sh-toast-container" id="shToastContainerBottom"></div>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url()?>" class="text-nowrap logo-img">
                        <img src="<?php echo base_url('assets/img/dark-logo.png')?>" width="220" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <?php if($_SESSION['role'] == 1) {?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('token')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Token</span>
                            </a>
                        </li>
                        <?php }?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">FEATURES</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('leads')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Leads</span>
                            </a>
                        </li>
                        <?php if($_SESSION['role'] == 1) {?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('integration')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-list-details"></i>
                                </span>
                                <span class="hide-menu">Integration</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('coldleades')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-text"></i>
                                </span>
                                <span class="hide-menu">Cold leads</span>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end" style="padding-right:23px; background:#2a3447">
                            <div class="btn btn-primary" id="logout_btn" style="border-radius:0">Logout(<?php echo $_SESSION['uname']?>)</div>
                        </ul>
                    </div>
                </nav>
            </header>
            <div id="crm-modal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span id="crm-close">&times;</span>
                        <h3 id="modal_title"></h3>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="modal_body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <?php include ($page)?>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/sidebarmenu.js')?>"></script>
    <script src="<?php echo base_url('assets/js/app.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/simplebar.js')?>"></script>
    <script src="<?php echo base_url('assets/js/modal.js')?>"></script>
    </script>
</body>
</html>
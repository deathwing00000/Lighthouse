<main>
    <aside class="left-aside">
        <div class="ms-3">
            <img src="<?php echo app_cdn_path; ?>img/logo.svg" >
        </div>
        <div class="main-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin">
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#layers"/>
                        </svg>
                        <div class="ms-12">Dashboard</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-approvals">
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#check-circle"/>
                        </svg>
                        <div class="ms-12">Approvals</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-ntt">
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#move"/>
                        </svg>
                        <div class="ms-12">Send NTTs</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-stewards">
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#user"/>
                        </svg>
                        <div class="ms-12">Stewards</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-integrations">
                        <!-- <img src="img/icon-integrations.svg">  -->
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#terminal"/>
                        </svg>
                        <div class="ms-12">Integrations</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-settings">
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#settings"/>
                        </svg>
                        <div class="ms-12">Settings</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="user-nav dropup">
            <div class="dropdown">
                <button class="btn btn-white dropdown-toggle d-flex align-items-center p-0 border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="non-avator me-3"></div>
                    <div class="me-2 fs-5">0xd91c...4507</div>
                </button>
                <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="dropdown-item" href="#">
                            <svg class="feather">
                                <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#refresh-ccw"/>
                            </svg>
                            <div class="ms-12">Disconnect</div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <svg class="feather">
                                <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#log-out"/>
                            </svg>
                            <div class="ms-12">Change Wallet</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

    <section class="admin-body-section">

        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center justify-content-center h-100 border rounded">
                                <img src="<?php echo app_cdn_path; ?>img/img-empty.svg" width="208">
                                <div class="fs-2 fw-semibold mt-20">Welcome to your dashboard!</div>
                                <div class="fw-medium text-muted mt-4">To get started, please distribute some NTTs.</div>
                                <a role="button" class="btn btn-primary mt-18" href="admin-rewards.html">Reward a new member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="<?php echo app_cdn_path; ?>img/logo-circle.svg" height="90">
                <div class="fs-2 fw-semibold mt-15">MyDAO Admin Center</div>
                <div class="fw-medium mt-3">To get started please connect a whitelisted wallet</div>
                <button type="button" class="btn btn-primary mt-20 px-10">Connect Wallet</button>
                <div class="text-danger fw-medium mt-20">This wallet does not have access to MyDAO. <br>
                    Please connect with a whitelisted wallet.</div>
            </div>
        </div>
    </div>
</div>
<?php include_once app_root . '/templates/foot.php'; ?>
<script>
    feather.replace()
</script>
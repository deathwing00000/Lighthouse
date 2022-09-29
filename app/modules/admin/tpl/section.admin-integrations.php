<main>
    <?php require_once 'partial/admin-leftmenu.php'; ?>
    <section class="admin-body-section">
        <div class="container-fluid h-100">
            <?php
            if($__page->user->ntt_consent_bar != 1){
                include_once app_root ."/admin/tpl/partial/ntt-consent-bar.php";
            } ?>
            <div class="row h-100">
                <div class="col h-100">
                    <div class="card shadow mb-12">
                        <div class="card-body p-xl-20">
                            <div class="display-5 fw-medium">Lighthouse integrations</div>
                            <div class="text-muted mt-1">Integrate with third party data sources and applications using
                                pre-built connectors or APIs
                            </div>
                            <!--
                            <form class="mt-10 col-xxl-10">
                                <div class="fs-2 fw-medium mt-14" id="Interactions">Interactions</div>
                                <div class="fw-medium">Capture interactions from community members across apps, dapps
                                    and blockchains
                                </div>
                                <div class="row mt-10">
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-discord.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Discord</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Configure
                                                    moderation, leveling, twitch alerts, and much more.
                                                </div>
                                            </div>
                                            <div class="border-top card-body text-end">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:</sapn>
                                                        MEE6
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                        Soon!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-github.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">GitHub</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Measure
                                                    contributor impact of your favourite open-source GitHub repository.
                                                </div>
                                            </div>
                                            <div class="border-top card-body text-end">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:</sapn>
                                                        Stargaze
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                        Soon!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-realms.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Realms - SPL Governance</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input" checked>
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Create a DAO,
                                                    manage members, vote on proposals, and allocate funds to your
                                                    treasury on Solana.
                                                </div>
                                            </div>
                                            <div class="border-top card-body text-end">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:</sapn>
                                                        Realms
                                                    </div>
                                                    <a href="realms-settings" class="fw-medium text-decoration-none text-blue-stone">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <a class="card add-card border-dashed rounded-3 mb-12 text-decoration-none justify-content-center"
                                           role="button" data-bs-toggle="modal" data-bs-target="#modalInteraction">
                                            <div class="d-flex align-items-center flex-column">
                                                <img src="<?php echo app_cdn_path; ?>img/icon-add.png">
                                                <div class="fw-medium mt-4">New Interaction</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="fs-2 fw-medium mt-14" id="Identity">Identity</div>
                                <div class="fw-medium">Enable identity verification to increase security, trust and
                                    transparency in your community
                                </div>
                                <div class="row mt-10">
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-grape.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Grape protocol</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Direct proof
                                                    of "Skin in the Game" for every community member.
                                                </div>
                                            </div>
                                            <div class="border-top card-body text-end">
                                                <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                    Soon!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-civic.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Civic pass</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">An integrated
                                                    permissioning tool that helps businesses control access to their
                                                    dApps.
                                                </div>
                                            </div>
                                            <div class="border-top card-body text-end">
                                                <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                    Soon!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-iden.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Iden3</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">
                                                    Next-generation private access control based on self-sovereign
                                                    identity, designed using zkSNARKs.
                                                </div>
                                            </div>
                                            <div class="border-top card-body text-end">
                                                <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                    Soon!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <a class="card add-card border-dashed rounded-3 mb-12 text-decoration-none justify-content-center"
                                           role="button" data-bs-toggle="modal" data-bs-target="#modalProtocol">
                                            <div class="d-flex align-items-center flex-column">
                                                <img src="<?php echo app_cdn_path; ?>img/icon-add.png">
                                                <div class="fw-medium mt-4">New Identity provider</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="fs-2 fw-medium mt-14" id="Apps">Apps</div>
                                <div class="fw-medium">Activate and expand your decentralized community</div>
                                <div class="row mt-10">
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-governance.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Governance NTTs</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">These
                                                    non-transferable tokens are automatically awarded and revoked based
                                                    on a member's percentile.
                                                </div>
                                            </div>
                                            <div class="border-top card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:</sapn>
                                                        Lighthouse
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-primary"
                                                       data-bs-toggle="modal" data-bs-target="#SetupNTTsModal">Setup
                                                        NTTs</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-ntts.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Reputation NTTs</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Mint and
                                                    distribute non-transferrable tokens to your community.
                                                </div>
                                            </div>
                                            <div class="border-top card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:</sapn>
                                                        Lighthouse
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                        Soon!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-evolving.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Evolving reputation NFT</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Create an NFT
                                                    that evolves based on contribution to your community.
                                                </div>
                                            </div>
                                            <div class="border-top card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:
                                                        </sapn><?php echo ($__page->blockchain == 'SOLANA') ? 'Cardinal' : 'OpenSea'; ?>
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                        Soon!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-goal.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Goal based NFT badges</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Issue NFT
                                                    badges when a community member reaches a particular goal or
                                                    milestone.
                                                </div>
                                            </div>
                                            <div class="border-top card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:
                                                        </sapn><?php echo ($__page->blockchain == 'SOLANA') ? 'Cardinal' : 'POAP'; ?>
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                        Soon!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-streams.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Token streams</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Periodically
                                                    stream tokens to your community, based on active participation.
                                                </div>
                                            </div>
                                            <div class="border-top card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:
                                                        </sapn><?php echo ($__page->blockchain == 'SOLANA') ? 'Streamflow' : 'SuperFluid'; ?>
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                        Soon!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card border rounded-3 mb-12">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-7">
                                                    <div class="card-logo me-8">
                                                        <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-token.png">
                                                    </div>
                                                    <div class="fs-4 fw-semibold pe-2">Token payments</div>
                                                    <div class="ms-auto">
                                                        <label class="switch">
                                                            <input type="checkbox" class="form-switch-input">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fw-medium lh-lg two-lines-wrap text-gray-700">Airdrop tokens
                                                    to your community based on active participation.
                                                </div>
                                            </div>
                                            <div class="border-top card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="fw-medium">
                                                        <sapn class="text-gray-700">Developed by:
                                                        </sapn><?php echo ($__page->blockchain == 'SOLANA') ? 'Streamflow' : 'SuperFluid'; ?>
                                                    </div>
                                                    <a href="#" class="fw-medium text-decoration-none text-blue-stone">Coming
                                                        Soon!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <a class="card add-card border-dashed rounded-3 mb-12 text-decoration-none justify-content-center"
                                           role="button" data-bs-toggle="modal" data-bs-target="#modalNewApp">
                                            <div class="d-flex align-items-center flex-column">
                                                <img src="<?php echo app_cdn_path; ?>img/icon-add.png">
                                                <div class="fw-medium mt-4">New App</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </form>
                            -->
                        </div>
                    </div>

                    <div class="card shadow mb-12">
                        <div class="card-header px-xl-20 py-xl-6 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="h3 mb-0">Contribution Sources</div>
                                <div class="ms-auto">
                                    <div class="dropdown dropdown-add">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Add
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modalAddContribution">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-realms.png" width="40" height="40">
                                                    <div class="ms-5 h4 mb-0">Realms</div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-squads.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Squads</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-realms.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Treasury</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-github.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Github</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-discord.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Discord</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-member-wallets.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Member Wallets</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-xl-20">
                            <div class="d-flex justify-content-center">
                                <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-realms.png" width="50" height="50" class="me-3">
                                <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-squads.png" width="50" height="50" class="me-3">
                                <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-github.png" width="50" height="50" class="me-3">
                                <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-discord.png" width="50" height="50" class="me-3">
                                <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-member-wallets.png" width="50" height="50">
                            </div>
                            <div class="text-center h4 mb-0 mt-8 fw-medium">Integrate on-chain and off-chain contribution sources.</div>
                        </div>
                        <!-- Add block -->
                        <div class="card-body px-xl-20 pb-xl-20">
                            <div class="border rounded-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-7">
                                        <div class="card-logo me-8">
                                            <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-realms.png">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-semibold pe-3">Primary Realms account</div>
                                            <a class="text-primary text-decoration-none fw-medium" href="#">Configure > </a>
                                        </div>
                                        <div class="ms-auto">
                                        <label class="switch">
                                            <input type="checkbox" class="form-switch-input">
                                            <span class="slider"></span>
                                        </label>
                                        </div>
                                    </div>
                                    <ul class="list-card-tokan">
                                        <li class="list-card-tokan-item">
                                            <div class="fw-medium lh-lg text-gray-700">Pubkey</div>
                                            <div class="fw-semibold fs-lg">J5AmvzRXFCFgr8r2V2KzPJM5ygrEiA19gfqE9kaPra5L</div>
                                        </li>
                                        <li class="list-card-tokan-item">
                                            <div class="fw-medium lh-lg text-gray-700">Points per vote</div>
                                            <div class="fw-semibold fs-lg">10 $repTOKEN</div>
                                        </li>
                                        <li class="list-card-tokan-item">
                                            <div class="fw-medium lh-lg text-gray-700">Points per passed proposal</div>
                                            <div class="fw-semibold fs-lg">100 $repTOKEN</div>
                                        </li>
                                        <li class="list-card-tokan-item">
                                            <div class="fw-medium lh-lg text-gray-700">Points per created proposal</div>
                                            <div class="fw-semibold fs-lg">50 $repTOKEN</div>
                                        </li>
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                        <!-- -->
                    </div>

                    <div class="card shadow mb-12">
                        <div class="card-header px-xl-20 py-xl-6 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="h3 mb-0">Gated Access</div>
                                <div class="ms-auto">
                                    <div class="dropdown dropdown-add">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Add
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-token-based.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Token Based</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-nft-based.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">NFT Based</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-xl-20">
                            <div class="d-flex justify-content-center">
                                <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-token-based.png" width="50" height="50" class="me-3">
                                <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-nft-based.png" width="50" height="50">
                            </div>
                            <div class="text-center h4 mb-0 mt-8 fw-medium">Setup token-gated access to contributions.</div>
                        </div>
                    </div>

                    <div class="card shadow mb-12">
                        <div class="card-header px-xl-20 py-xl-6 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="h3 mb-0">Recognition</div>
                                <div class="ms-auto">
                                    <div class="dropdown dropdown-add">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Add
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-governance.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Governance NTTs </div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-civic.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Civic Pass</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-evolving.png" width="40" height="40">
                                                    <div class="ms-5">
                                                        <div class="h4 mb-0">Evolving Reputation NFTs</div>
                                                        <div class="text-success">Coming Soon!</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-xl-20 pb-xl-20">
                            <div class="border rounded-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-7">
                                        <div class="card-logo me-8">
                                            <img src="<?php echo app_cdn_path; ?>img/company-logo/icon-ntts.png">
                                        </div>
                                        <div class="fs-4 fw-semibold pe-2">Reputation NTTs</div>
                                        <div class="ms-auto">
                                        <label class="switch">
                                            <input type="checkbox" class="form-switch-input">
                                            <span class="slider"></span>
                                        </label>
                                        </div>
                                    </div>
                                    <div class="fw-medium lh-lg text-gray-700">Token name</div>
                                    <div class="fw-semibold fs-lg">$repTOKEN</div>
                                </div>                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
<!-- Modal Add Contribution Sources -->
<div class="modal fade" id="modalAddContribution" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-size-02">
        <div class="modal-content">
            <div class="modal-body p-10">
                <div class="fs-2 fw-semibold mb-22 mt-3">Add Contribution Sources</div>
                <div class="mb-12">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control form-control-lg" id="" placeholder="Primary Realms account">
                </div>
                <div class="mb-12">
                    <label for="" class="form-label">Public key</label>
                    <input type="text" class="form-control form-control-lg" id="" placeholder="J5AmvzRXFCFgr8r2V2KzPJM5ygrEiA19gfqE9kaPra5L">
                </div>
                <div class="mb-12">
                    <label for="" class="form-label">Points per vote</label>
                    <div class="input-group">                    
                        <input type="text" class="form-control form-control-lg" placeholder="100" aria-label="" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">$repToken</span>
                    </div>
                </div>
                <div class="mb-12">
                    <label for="" class="form-label">Points per passed proposal</label>
                    <div class="input-group">                    
                        <input type="text" class="form-control form-control-lg" placeholder="100" aria-label="" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">$repToken</span>
                    </div>
                </div>
                <div class="mb-12">
                    <label for="" class="form-label">Points per created proposal</label>
                    <div class="input-group">                    
                        <input type="text" class="form-control form-control-lg" placeholder="100" aria-label="" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">$repToken</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer pe-10">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                <a role="button" class="btn btn-primary" href="">ADD</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal From -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-size-02">
        <div class="modal-content">
            <div class="modal-body p-10">
                <div class="fs-2 fw-semibold mb-22 mt-3">Drop your contact details and we'll get in touch <br>
                    to set up your form.
                </div>
                <input type="text" class="form-control form-control-lg mb-16" id=""
                       placeholder="Email / Telegram / Discord handle">
            </div>
            <div class="modal-footer pe-10">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                <a role="button" class="btn btn-primary" href="integrations-form">SAVE</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Interaction -->
<div class="modal fade" id="modalInteraction" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-size-02">
        <div class="modal-content">
            <div class="modal-body">
                <div class="fs-2 fw-semibold">Add a new interaction</div>
                <div class="fs-4 fw-medium my-12">All interaction sources are currently added manually. Please leave
                    your contact details below.
                </div>
                <div class="mb-12">
                    <label for="" class="form-label">Interaction source</label>
                    <input type="text" class="form-control form-control-lg" id="" placeholder="My dapp">
                </div>
                <div class="">
                    <label for="" class="form-label">Email or Telegram address</label>
                    <input type="email" class="form-control form-control-lg" id="" placeholder="sushi@domain.com">
                </div>
            </div>
            <div class="modal-footer pe-10">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                <a role="button" class="btn btn-primary" href="integrations-form">Get in touch</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal protocol -->
<div class="modal fade" id="modalProtocol" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-size-02">
        <div class="modal-content">
            <div class="modal-body">
                <div class="fs-2 fw-semibold">Add a new Identity protocol</div>
                <div class="fs-4 fw-medium my-12">All Identity protocols are currently added manually. Please leave your
                    contact details below.
                </div>
                <div class="mb-12">
                    <label for="" class="form-label">Protocol name</label>
                    <input type="text" class="form-control form-control-lg" id="" placeholder="xyz ID">
                </div>
                <div class="">
                    <label for="" class="form-label">Email or Telegram address</label>
                    <input type="email" class="form-control form-control-lg" id="" placeholder="sushi@domain.com">
                </div>
            </div>
            <div class="modal-footer pe-10">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                <a role="button" class="btn btn-primary" href="integrations-form">Get in touch</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal New app -->
<div class="modal fade" id="modalNewApp" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-size-02">
        <div class="modal-content">
            <div class="modal-body">
                <div class="fs-2 fw-semibold">New app</div>
                <div class="fs-4 fw-medium my-12">All apps are currently added manually. Please leave your contact
                    details below.
                </div>
                <div class="mb-12">
                    <label for="" class="form-label">App name</label>
                    <input type="text" class="form-control form-control-lg" id="" placeholder="My app">
                </div>
                <div class="">
                    <label for="" class="form-label">Email or Telegram address</label>
                    <input type="email" class="form-control form-control-lg" id="" placeholder="sushi@domain.com">
                </div>
            </div>
            <div class="modal-footer pe-10">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                <a role="button" class="btn btn-primary" href="integrations-form">Get in touch</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Interaction -->
<div class="modal fade" id="" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-size-02">
        <div class="modal-content">
            <div class="modal-body p-10">
                <div class="fs-2 fw-semibold mb-22 mt-3">Drop your contact details and we'll get in touch<br>
                    to set up your integration.
                </div>
                <input type="text" class="form-control form-control-lg mb-16" id=""
                       placeholder="Email / Telegram / Discord handle">
            </div>
            <div class="modal-footer pe-10">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                <a role="button" class="btn btn-primary" href="integrations-form">SAVE</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Setup NTTs-->
<div class="modal fade" id="SetupNTTsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-size-02">
        <div class="modal-content">
            <div class="modal-body">
                <div class="fs-2 fw-semibold mb-15">Setup your Governance NTTs</div>
                <label for="" class="form-label">NTT name *</label>
                <div class="input-group">
                    <span class="input-group-text fw-medium" id="">gov</span>
                    <input type="text" id="" class="form-control form-control-lg" value="" aria-describedby="Help">
                </div>
                <div id="Help" class="form-text">* The NTT name cannot be modified after setup.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<?php include_once app_root . '/templates/admin-foot.php'; ?>
<script>
    $(document).on('change', '.form_activation', function(event) {
        //event.preventDefault();
        var status = (this.checked)?1:0;
        var form_id = $(this).data('fid');
        $.ajax({
            url: 'form-activation?fid='+form_id+'&status='+status,
            dataType: 'json'
        });
    });
</script>

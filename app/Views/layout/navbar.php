<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu ms-3">
        <div class="nav">
            <?php if (has_permission('beranda')) : ?>
                <a class="nav-link mt-4 " href="<?= base_url() ?>/home">
                    <i class="fas fa-home fa-xl me-2"></i>
                    Dashboard
                </a>
            <?php endif; ?>
            <?php if (has_permission('data-siswa')) : ?>

                <div class="sb-sidenav-menu-heading">Master Data</div>
                <a class="nav-link mt-4 " href="<?= base_url() ?>/user">
                    <i class="fas fa-users fa-xl me-2"></i>
                    User </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <i class="fas fa-user-graduate fa-xl me-2"></i>
                    Siswa
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
            <?php endif; ?>

            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <?php if (has_permission('data-siswa')) : ?>
                        <a class="nav-link" href="<?= base_url() ?>/siswa"><i class="far fa-circle me-2"></i>Data Siswa</a>
                    <?php endif; ?>
                    <?php if (has_permission('data-kelas')) : ?>
                        <a class="nav-link" href="<?= base_url() ?>/kelas"><i class="far fa-circle me-2"></i>Data Kelas</a>
                    <?php endif; ?>

                </nav>
            </div>

            <?php if (has_permission("data-spp")) : ?>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <i class="fa fa-money-bill fa-1x me-2"></i>
                    Keuangan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
            <?php endif; ?>

            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <?php if (has_permission("data-spp")) : ?>

                        <a class="nav-link " href="<?= base_url(); ?>/spp"> <i class="far fa-circle me-2"></i>Data SPP Pokok</a>
                    <?php endif; ?>
                    <?php if (has_permission("data-spp-bebas")) : ?>

                        <a class="nav-link " href="<?= base_url(); ?>/bebas"> <i class="far fa-circle me-2"></i>Data SPP Bebas</a>
                    <?php endif; ?>

                </nav>
            </div>
            <?php if (has_permission('cari-tagihan-bulanan')) : ?>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
                    <i class="fas fa-cash-register  fa-1x me-2"></i>
                    Transaksi <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
            <?php endif; ?>

            <div class="collapse" id="collapsePages1" aria-labelledby="heading" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <?php if (has_permission('data-tagihan')) : ?>

                        <a class="nav-link" href="<?= base_url() ?>/bebas_bayar"><i class="far fa-circle me-2"></i>Input Tagihan</a>
                    <?php endif; ?>
                    <?php if (has_permission('cari-tagihan-bulanan')) : ?>
                        <a class="nav-link " href="<?= base_url(); ?>/bayar"> <i class="far fa-circle me-2"></i>Bayar SPP</a>
                    <?php endif; ?>
                    <?php if (has_permission('data-bayar-bebas')) : ?>
                        <a class="nav-link " href="<?= base_url(); ?>/bebas_bayar/data_bayar"> <i class="far fa-circle me-2"></i>Bayar Bebas</a>
                    <?php endif; ?>
                </nav>
            </div>
            <?php if (has_permission('laporan-spp-bulanan')) : ?>

                <div class="sb-sidenav-menu-heading">Laporan</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesone" aria-expanded="false" aria-controls="collapsePagesone">
                    <i class="fas fa-chart-bar fa-1x me-2"></i>
                    Laporan <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
            <?php endif; ?>

            <div class="collapse" id="collapsePagesone" aria-labelledby="heading" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <?php if (has_permission('laporan-spp-bulanan')) : ?>

                        <a class="nav-link " href="<?= base_url(); ?>/tunggakan"> <i class="far fa-circle me-2"></i>SPP Pokok</a>
                    <?php endif; ?>
                    <?php if (has_permission('laporan spp bebas')) : ?>

                        <a class="nav-link " href="<?= base_url(); ?>/laporan/spp"> <i class="far fa-circle me-2"></i>SPP Bebas</a>
                    <?php endif; ?>
                    <?php if (has_permission('laporan siswa')) : ?>

                        <a class="nav-link " href="<?= base_url(); ?>/laporan/laporan_siswa"> <i class="far fa-circle me-2"></i>Per Siswa</a>
                    <?php endif; ?>

                </nav>
            </div>

            <!-- <?php if (has_permission('histori bayar')) : ?>
                <a class="nav-link  " href="<?= base_url() ?>/siswa/histori">
                    <i class="fas fa-history fa-xl me-2"></i>
                    Histori
                </a>
            <?php endif; ?> -->

        </div>
    </div>
</nav>
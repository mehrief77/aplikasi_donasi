<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a style="color: white;" href="#" class="brand-link navbar-dark">
        <img src="<?php echo base_url() ?>uploads/Donasi dan Donatur.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 17px;">Pengumpulan Donasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->

        <!-- Nav Item - Profile -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('donatur/Dashboard_d/') ?>">
                        <img src="<?= base_url('uploads/dashboard.png'); ?> " width="30px">
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('donatur/Dashboard_d/profile') ?>">
                        <img src="<?= base_url('uploads/online-profile.png'); ?> " width="30px">
                        <span>MyProfile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('donatur/Dashboard_d/edit') ?>">
                        <img src="<?= base_url('uploads/message.png'); ?> " width="30px">
                        <span>Edit Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('donatur/Dashboard_d/data_donasi') ?>">
                        <img src="<?= base_url('uploads/zakat.png'); ?> " width="30px">
                        <span>Data Donasi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url()   ?>auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);
?>

<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?=base_url() ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin Panel</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?= base_url('admin/dashboard'); ?>">
                <div class="parent-icon"><i class="bi bi-house-door"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/services'); ?>">
                <div class="parent-icon"><i class="bx bx-bar-chart-square"></i></div>
                <div class="menu-title">Services</div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/packages'); ?>">
                <div class="parent-icon"><i class="bi bi-book"></i></div>
                <div class="menu-title">Packages</div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/clients'); ?>">
                <div class="parent-icon"><i class="lni lni-users"></i></div>
                <div class="menu-title">Clients</div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/providers'); ?>">
                <div class="parent-icon"><i class="lni lni-users"></i></div>
                <div class="menu-title">Service Providers</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="bi bi-cart-check-fill"></i></div>
                <div class="menu-title">Bookings</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="bx bx-comment-detail"></i></div>
                <div class="menu-title">Reviews</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="lni lni-rupee"></i></div>
                <div class="menu-title">Payments</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="bi bi-envelope-fill"></i></div>
                <div class="menu-title">Enquiries</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="bi bi-envelope-fill"></i></div>
                <div class="menu-title">Contact Enquiries</div>
            </a>
        </li>



    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->

<script>
$("#<?= $cur_tab ?>").addClass('menu-open');
$("#<?= $cur_tab ?> > a").addClass('active');
</script>
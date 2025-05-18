<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter"><?= $fnv ?></span>
</a>
<!-- Dropdown - Alerts -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
    aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
        New Vendors
    </h6>
    <?php
        while($fsv=mysqli_fetch_array($sel_ans)){
    ?>
        <a class="dropdown-item d-flex align-items-center" href="vendor.php">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= $fsv['v_f_name'] ?></div>
                <!-- Spending Alert: We've noticed unusually high spending for your account. -->
            </div>
        </a>
        <?php } ?>
    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
</div>
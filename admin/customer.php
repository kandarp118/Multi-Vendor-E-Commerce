<?php
    session_start();
    if (isset($_SESSION['aunm'])) 
    {
        include("connection.php");
        include("header.php");
        include("sidebar.php");
        include("topbar.php");
?>
            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Customer</h1>
                        <!-- <button type="button" onClick="add()" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">
                            <i class="fas fa-cart-plus text-white"></i> Add Product</button> -->
                    </div>

                    <!-- Customer Table -->
                    <div class="card shadow my-3" id="customer_table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customer Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> No.</th>
                                            <th> Name</th>
                                            <th> Mobaile No.</th>
                                            <th> Email</th>
                                            <th> Password</th>
                                            <!-- <th> Address</th>
                                            <th> City</th>
                                            <th> Country</th>
                                            <th> About</th>
                                            <th> Iamge</th> -->
                                            <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include("connection.php");
                                            $sel_customer="SELECT * FROM customer";
                                            $sel_customer_ans=mysqli_query($c,$sel_customer);
                                            $n=1;
                                            while($fc=mysqli_fetch_array($sel_customer_ans)){
                                        ?>
                                        <tr>
                                            <td><?php echo $n; ?></td>
                                            <td><?php echo $fc['c_first_name'];?></td>
                                            <td><?php echo $fc['c_mobile_no'];?></td>
                                            <td><?php echo $fc['c_email'];?></td>
                                            <td><?php echo $fc['c_password'];?></td>
                                            <!-- <td><?php //echo $fc['c_address'];?></td>
                                            <td><?php //echo $fc['c_city']; ?></td>
                                            <td><?php //echo $fc['c_state']; ?></td>
                                            <td><?php //echo $fc['c_country']; ?></td>
                                            <td><img src="<?php //echo $fc['c_image']; ?>" alt="demo" width="100px" height="100px"></td> -->
                                            <td>
                                                <div class="d-flex justify-content-center border-0">
                                                <button type='button' id='' class='edit-btn btn btn-success d-flex mx-1'>Edit</button>
                                                <button type='button' id='' class='btn btn-danger d-flex mx-1' data-id='<?php echo $fbc['c_id']; ?>'>Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php   
                                            $n+=1;
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th> No.</th>
                                            <th> Name</th>
                                            <th> Mobaile No.</th>
                                            <th> Email</th>
                                            <th> Password</th>
                                            <!-- <th> Address</th>
                                            <th> City</th>
                                            <th> Country</th>
                                            <th> About</th>
                                            <th> Iamge</th> -->
                                            <th> Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    include("footer.php");
} else {
    echo "
    <script type='text/javascript'>
        window.location='admin-login.php';
    </script>"; 
}
?>
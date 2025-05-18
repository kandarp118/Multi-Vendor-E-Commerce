<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th> No.</th>
                <th> First Name</th>
                <th> Last Name</th>
                <th> Mobile No.</th>
                <th> Email</th>
                <th> Password</th>
                <th> Address</th>
                <th> Store Name</th>
                <th> Store About</th>
                <th> Image</th>
                <!-- <th> View Product</th> -->
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                $sel_vendor="SELECT * FROM vendor";
                $sel_vendor_ans=mysqli_query($c,$sel_vendor);
                $n=1;
                while($fv=mysqli_fetch_array($sel_vendor_ans)){
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $fv['v_f_name'];?></td>
                <td><?php echo $fv['v_l_name'];?></td>
                <td><?php echo $fv['v_mobile_no'];?></td>
                <td><?php echo $fv['v_email'];?></td>
                <td><?php echo $fv['v_password'];?></td>
                <td><?php echo $fv['v_address']; ?></td>
                <td><?php echo $fv['v_store_name']; ?></td>
                <td><?php echo $fv['v_store_about']; ?></td>
                <td><img src="<?= 'http://localhost/Akommerce/seller/img/vendor_img/'.$fv['v_image'] ?>" alt="demo" width="100px" height="100px"></td>
                <!-- <td>
                    <form action="product.php" method="post">
                        <input type="hidden" name="v_id" value="<?= $fv['v_id'] ?>">
                        <input type="submit" class="btn btn-primary" value="View">
                    </form>
                </td> -->
                <td>
                    <div class="d-flex justify-content-center border-0">
                        <?php
                            if ($fv['v_status'] == NULL) 
                            {
                                ?>
                                    <button type='button' id='approve_btn' class='edit-btn btn btn-success d-flex mx-1' data-v_id='<?= $fv['v_id'] ?>'>Approve</button>
                                    <button type='button' id='reject_btn' class='btn btn-danger d-flex mx-1' data-v_id='<?= $fv['v_id'] ?>'>Reject</button>
                                <?php
                            } 
                            else if ($fv['v_status'] == 1) 
                            {
                                ?>
                                    <button type='button' id='reject_btn' class='btn btn-danger d-flex mx-1' data-v_id='<?= $fv['v_id'] ?>'>Reject</button>
                                <?php   
                            } 
                            else if ($fv['v_status'] == 0)
                            {
                                ?>
                                    <button type='button' id='approve_btn' class='edit-btn btn btn-success d-flex mx-1' data-v_id='<?= $fv['v_id'] ?>'>Approve</button>
                                <?php
                            }
                            
                        ?>
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
                <th> User Name</th>
                <th> Mobile No.</th>
                <th> Email</th>
                <th> Password</th>
                <th> Address</th>
                <th> Store Name</th>
                <th> Store About</th>
                <th> Image</th>
                <th> Action</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
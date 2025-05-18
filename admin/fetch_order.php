<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th> No.</th>
                <th> Name</th>
                <th> MRP Price</th>
                <th> Quantity</th>
                <th> Total Price</th>
                <th> Customer Name</th>
                <th> Order No.</th>
                <th> Payment</th>
                <th> Address</th>
                <!-- <th> Delivered Date</th> -->
                <th> Action</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                include("connection.php");
                // $v_id = $_POST['v_id'];
                // if (isset($v_id)) {
                //     $sel_pro="SELECT * FROM product LEFT JOIN category ON category.ca_id=product.ca_id LEFT JOIN brand ON brand.b_id=product.b_id WHERE p_author='$v_id'";
                // } else {
                //     $sel_pro="SELECT * FROM product LEFT JOIN category ON category.ca_id=product.ca_id LEFT JOIN brand ON brand.b_id=product.b_id";   
                // }
                $sel_pro="SELECT * FROM orders LEFT JOIN order_master ON orders.o_id=order_master.o_id LEFT JOIN customer ON customer.c_id=orders.c_id";
                $sel_pro_ans=mysqli_query($c,$sel_pro);
                $n=1;
                while($fp=mysqli_fetch_array($sel_pro_ans)){
                ?>
                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $fp['p_name'];?></td>
                        <td><?php echo $fp['p_price'];?></td>
                        <td><?php echo $fp['p_quantity'];?></td>
                        <td><?php echo $fp['p_total'];?></td>
                        <td class="text-wrap"><?php echo $fp['c_first_name']." ".$fp['c_last_name'];?></td>
                        <td><?php echo "2024".$fp['o_id'].$fp['c_id'];?></td>
                        <td><?php echo $fp['payment_method'];?></td>
                        <td><?php echo $fp['c_address'].", ".$fp['c_city']." - ".$fp['c_pin_code'].", ".$fp['c_state'] ?></td>
                        <!-- <td><?php echo $fp['o_date']; ?></td> -->
                        <td> 
                            <?php
                                if ($fp['om_status'] == 1) { ?>
                                    <p class="btn btn-outline-success">Delivered</p>
                                <?php } 
                                    else if ($fp['om_status'] == NULL) {
                                    ?>
                                    <button type='button' id='place_btn' class='btn btn-outline-primary mx-1 font-weight-bold' data-o_id='<?= $fp['o_id'] ?>' data-om_id='<?= $fp['om_id'] ?>'>Panding <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span></button>        
                                    <?php
                                    } else { ?>
                                        <p class="btn btn-outline-Danger">Cancelled</p>  
                                <?php } ?>
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
                <th> MRP Price</th>
                <th> Quantity</th>
                <th> Total Price</th>
                <th> Customer Name</th>
                <th> Order No.</th>
                <th> Payment</th>
                <th> Address</th>
                <!-- <th> Delivered Date</th> -->
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
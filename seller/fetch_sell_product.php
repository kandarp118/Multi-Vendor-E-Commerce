<?php
include("connection.php");
session_start();  
?>
<div class="card-header py-3">
    <?php
        $sel_pro_query="SELECT COUNT(*) AS total FROM product WHERE p_author='".$_SESSION['seller']['v_id']."'";
        $sel_pro_ans=mysqli_query($c,$sel_pro_query);
        $tp=mysqli_fetch_assoc($sel_pro_ans);
    ?>
    <h6 class="m-0 font-weight-bold text-primary">Total Product : <?= $tp['total'] ?></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table text-center table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th> No.</th>
                    <th> Name</th>
                    <th> Quantity</th>
                    <th> Purchase Price</th>
                    <th> Selling Price</th>
                    <th> Description</th>
                    <th> Brand</th>
                    <th> Category</th>
                    <th> Image</th>
                    <th> Action</th>
                </tr>
            </thead>
            
            <tbody>
                <?php  
                    $sel_pro="SELECT * FROM product LEFT JOIN category ON category.ca_id=product.ca_id LEFT JOIN brand ON brand.b_id=product.b_id WHERE p_author='".$_SESSION['seller']['v_id']."'";
                    $sel_pro_ans=mysqli_query($c,$sel_pro);
                    $n=1;
                    while($fp=mysqli_fetch_array($sel_pro_ans)){
                    ?>
                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $fp['p_name'];?></td>
                            <td><?php echo $fp['p_qauntity'];?></td>
                            <td><?php echo $fp['p_purchase_price'];?></td>
                            <td><?php echo $fp['p_selling_price'];?></td>
                            <td class="text-wrap"><?php echo $fp['p_description'];?></td>
                            <td><?php echo $fp['b_name'];?></td>
                            <td><?php echo $fp['ca_name'];?></td>
                            <td> <?php $images_name = explode(',',$fp['p_image']);
                                foreach($images_name as $name)
                                {
                                    echo "<img src='../admin/img/pro_img/".$name."' width='50px' height='50px'>";
                                }
                            ?></td>
                            <td> 
                                <div class="d-flex justify-content-center border-0">
                                    <?php
                                        if ($fp['p_status'] == 1) { ?>
                                            <button type='button' id='editshow' class='edit-btn btn btn-success mx-1' 
                                                data-id='<?= $fp['p_id'] ?>' 
                                                data-name='<?= $fp['p_name'] ?>'
                                                data-p_prc='<?= $fp['p_purchase_price'] ?>'
                                                data-tax_rate='<?= $fp['p_tax_rate']?>'
                                                data-tax_amount='<?= $fp['p_tax_amount']?>'
                                                data-profit_amount='<?= $fp['p_profit_amount']?>'
                                                data-s_prc='<?= $fp['p_selling_price'] ?>'
                                                data-ca_id='<?= $fp['ca_id'] ?>'
                                                data-b_id='<?= $fp['b_id'] ?>'
                                                data-p_qun='<?= $fp['p_qauntity'] ?>'
                                                data-p_desc='<?= $fp['p_description'] ?>'
                                                data-p_img='<?= "http://localhost/Akommerce/admin/img/pro_img/".$fp['p_image']?>' 
                                                data-bs-toggle="modal" data-bs-target="#editProduct">Edit</button>
                                            <button type="button" id="product_del_btn" data-id="<?php echo $fp['p_id']; ?>" data-author="<?=$fp['p_author']?>" class='btn btn-danger d-flex mx-1'>Delete</button>
                                        <?php } elseif ($fp['p_status'] == NULL) {
                                                ?>
                                                <button id="pending" class="btn btn-outline-primary">Pending... <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span></button>
                                                <?php
                                        } else { ?>
                                                <button id="pending" class="btn btn-outline-danger">Rejected... <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span></button>
                                                <button type="button" id="product_del_btn" data-id="<?php echo $fp['p_id']; ?>" data-author="<?=$fp['p_author']?>" class='btn btn-danger d-flex mx-1'>Delete</button>
                                        <?php }
                                        
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
                <th> Quantity</th>
                <th> Purchase Price</th>
                <th> Selling Price</th>
                <th> Description</th>
                <th> Brand</th>
                <th> Category</th>
                <th> Image</th>
                <th> Action</th>
                </tr>
            </tfoot>
            
        </table>
    </div>
</div>





<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/datatables-demo.js"></script>                    
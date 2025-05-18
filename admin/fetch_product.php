<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                include("connection.php");
                // $v_id = $_POST['v_id'];
                // if (isset($v_id)) {
                //     $sel_pro="SELECT * FROM product LEFT JOIN category ON category.ca_id=product.ca_id LEFT JOIN brand ON brand.b_id=product.b_id WHERE p_author='$v_id'";
                // } else {
                //     $sel_pro="SELECT * FROM product LEFT JOIN category ON category.ca_id=product.ca_id LEFT JOIN brand ON brand.b_id=product.b_id";   
                // }
                $sel_pro="SELECT * FROM product LEFT JOIN category ON category.ca_id=product.ca_id LEFT JOIN brand ON brand.b_id=product.b_id";
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
                        <td> <img src="<?php echo "./img/pro_img/".$fp['p_image']; ?>" alt="demo" width="100px" height="100px"> <?php //echo $fp['p_image'];?></td>
                        <td> 
                            <?php
                                if ($fp['p_status'] == 1) { ?>
                                    <div class="d-flex justify-content-center border-0">
                                        <button type='button' id='reject_btn' class='btn btn-outline-danger d-flex mx-1 font-weight-bold' data-p_id='<?= $fp['p_id'] ?>' data-v_id="<?= $fp['p_author'] ?>">Reject</button>
                                        <button type='button' id='editshow' class='edit-btn btn btn-success mx-1' 
                                        data-id='<?= $fp['p_id'] ?>' 
                                        data-name='<?= $fp['p_name'] ?>'
                                        data-p_prc='<?= $fp['p_purchase_price'] ?>'
                                        data-s_prc='<?= $fp['p_selling_price'] ?>'
                                        data-ca_id='<?= $fp['ca_id'] ?>'
                                        data-b_id='<?= $fp['b_id'] ?>'
                                        data-p_qun='<?= $fp['p_qauntity'] ?>'
                                        data-p_desc='<?= $fp['p_description'] ?>'
                                        data-p_img='<?= "img/pro_img/".$fp['p_image']?>'>Edit</button>
                                        <button type="button" id="product_del_btn" data-p_id="<?= $fp[0] ?>" data-v_id="<?= $fp['p_author'] ?>" class='btn btn-danger d-flex mx-1'>Delete</button>
                                    </div>
                                <?php } 
                                    else if ($fp['p_status'] == NULL) {
                                    ?>
                                        <div class="d-flex justify-content-center border-0">
                                            <button type='button' id='approve_btn' class='btn btn-outline-success d-flex mx-1 font-weight-bold' data-p_id='<?= $fp['p_id'] ?>' data-v_id='<?= $fp['p_author'] ?>'>Approve</button>
                                            <button type='button' id='reject_btn' class='btn btn-outline-danger d-flex mx-1 font-weight-bold' data-p_id='<?= $fp['p_id'] ?>' data-v_id='<?= $fp['p_author'] ?>'>Reject</button>
                                        </div>

                                    
                                    <?php
                                    } else { ?>
                                        <div class="d-flex justify-content-center border-0">
                                            <button type="button" class="btn btn-outline-danger font-weight-semibold">Rejected... <span class="spinner-grow spinner-grow-sm mb-1" aria-hidden="true"></span></button>
                                            <button type="button" id="product_del_btn" data-p_id="<?= $fp[0] ?>" data-v_id="<?= $fp['p_author'] ?>" class='btn btn-danger d-flex mx-1'>Delete</button>
                                        </div>    
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

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
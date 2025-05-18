<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th> No.</th>
                <th> Name</th>
                <th> Category</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                $sel_brand="SELECT brand.*,category.ca_name FROM brand INNER JOIN category ON brand.ca_id=category.ca_id";
                $sel_brand_ans=mysqli_query($c,$sel_brand);
                $n=1;
                while($fb=mysqli_fetch_array($sel_brand_ans)){
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $fb['b_name'];?></td>
                <td><?php echo $fb['ca_name'];?></td>
                <td>
                    <div class="d-flex justify-content-center border-0">
                    <button type='button' id='editshow' class='edit-btn btn btn-success d-flex mx-1' data-id='<?php echo $fb[0]; ?>' data-ctegory='<?php echo $fb[1]; ?>' data-name='<?php echo $fb['b_name']; ?>'>Edit</button>
                    <button type='button' id='brand_del_btn' class='btn btn-danger d-flex mx-1' data-id='<?php echo $fb['b_id']; ?>'>Delete</button>
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
                <th> Category</th>
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
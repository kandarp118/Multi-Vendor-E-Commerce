<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th> No.</th>
                <th> Name</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                $sel_cat="SELECT * FROM category";
                $sel_cat_ans=mysqli_query($c,$sel_cat);
                $n=1;
                while($fca=mysqli_fetch_array($sel_cat_ans)){
            ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $fca[1];?></td>
                    <td> 
                        <div class="d-flex justify-content-center border-0">
                        <button type='button' id='editshow' class='edit-btn btn btn-success d-flex mx-1' data-id='<?php echo $fca[0]; ?>' data-name='<?php echo $fca[1]; ?>'>Edit</button>
                        <button id="category_del_btn" data-id="<?= $fca[0] ?>" class='btn btn-danger d-flex mx-1'>Delete</button>
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
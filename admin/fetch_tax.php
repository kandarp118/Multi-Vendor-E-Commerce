<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th> No.</th>
                <th> Tax Rate</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                $sel_tax="SELECT * FROM tax";
                $sel_tax_ans=mysqli_query($c,$sel_tax);
                $n=1;
                while($ftax=mysqli_fetch_array($sel_tax_ans)){
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $ftax['tax_rate'];?></td>
                <!-- <td><?php //echo $fb['ca_name'];?></td> -->
                <td>
                    <div class="d-flex justify-content-center border-0">
                    <button type='button' id='editshow' class='edit-btn btn btn-success d-flex mx-1' data-id='<?php echo $ftax[0]; ?>' data-rate='<?php echo $ftax['tax_rate']; ?>'>Edit</button>
                    <button type='button' id='tax_del_btn' class='btn btn-danger d-flex mx-1' data-id='<?php echo $ftax['tax_id']; ?>'>Delete</button>
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
                <th> TaxRate</th>
                <!-- <th> Category</th> -->
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
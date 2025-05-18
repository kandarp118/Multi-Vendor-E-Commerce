<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th> No.</th>
                <th> Title</th>
                <th> Description</th>
                <!-- <th> Link URL</th> -->
                <th> Image</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                $sel_slider_query="SELECT * FROM slider";
                $sel_slider_ans=mysqli_query($c,$sel_slider_query);
                $n=1;
                while($fs=mysqli_fetch_array($sel_slider_ans)){
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $fs['s_title'];?></td>
                <td><?php echo $fs['s_description'];?></td>
                <!-- <td><?php //echo $fs['s_link_url'];?></td> -->
                <td> <img src="<?php echo "img/slider_img/".$fs['s_image']; ?>" alt="demo" width="100px"></td>
                <td>
                    <div class="d-flex justify-content-center border-0">
                    <button type='button' id='editshow' class='edit-btn btn btn-success d-flex mx-1' data-s-id='<?php echo $fs['s_id']; ?>' data-s-title='<?php echo $fs['s_title']; ?>' data-s-desc='<?php echo $fs['s_description']; ?>' data-link-url='<?php echo $fs['s_link_url']; ?>' data-s-img='<?=$fs['s_image']?>'>Edit</button>
                    <button type='button' id='slider_del_btn' class='btn btn-danger d-flex mx-1' data-s-id='<?php echo $fs['s_id']; ?>'>Delete</button>
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
                <th> Title</th>
                <th> Description</th>
                <!-- <th> Link URL</th> -->
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
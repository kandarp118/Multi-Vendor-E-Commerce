<?php
include("connection.php");
session_start();

// Fetch cart items for the logged-in user
$c_id = mysqli_real_escape_string($c, $_SESSION['user']['c_id']);
$sel_cart_query = "SELECT * FROM orders WHERE c_id='$c_id'";

// Execute the query and check for errors
$sel_cart_ans = mysqli_query($c, $sel_cart_query);
if (!$sel_cart_ans) {
    die("Error in cart query: " . mysqli_error($c));
}



if (mysqli_num_rows($sel_cart_ans) > 0) {
?>
<div class="shadow table-responsive card border-0 py-3 px-4"> 
    <table class="table table-hover text-center mb-0">
        <thead class="bg-warning text-dark">
            <tr>
                <th>#</th>
                <th>Images</th>
                <th>Product</th>
                <th>MRP.</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Address</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <?php
            $c_id = $_SESSION['user']['c_id'];
            $sel_cart_query = "SELECT * FROM orders LEFT JOIN order_master ON orders.o_id=order_master.o_id LEFT JOIN customer ON customer.c_id=orders.c_id WHERE customer.c_id='$c_id'";
            $sel_cart_ans = mysqli_query($c, $sel_cart_query);
            $n=1;
            $total_amount = 0;
            while ($fpo = mysqli_fetch_array($sel_cart_ans)) {
                $total_amount += $fpo['p_total'];
            ?>
            <tr>
                <td class="align-middle"><?php echo "$n"; ?></td>
                <td class="align-middle"><img src="./admin/img/pro_img/<?= $fpo['p_image'] ?>" alt="" class="w-50"></td>
                <td class="align-middle" style="max-width: 350px;"><?= $fpo['p_name'] ?></td>
                <td class="align-middle text-start">&#8377;<?= $fpo['p_price'] ?></td>
                <td class="align-middle"><?= $fpo['p_quantity'] ?></td>
                <td class="align-middle">&#8377;<?= $fpo['p_total'] ?></td>
                <td class="align-middle text-start"><?= $fpo['c_address'].", ".$fpo['c_city']."-".$fpo['c_pin_code'].", ".$fpo['c_state']?></td>
                <!-- <td class="align-middle"><?= $fpo['o_date'] ?></td> -->
                <td class="align-middle">
                <?php
                if ($fpo['om_status'] == NULL)
                {
                  ?>
                    <div class="d-flex justify-content-center border-0">
                      <button type="button" id="pending" class="btn btn-outline-primary d-flex justify-content-center">pending  <span class="spinner-grow spinner-grow-sm mt-1 ms-2" aria-hidden="true"></span></button>
                      <button type="button" id="cancel_btn" class="ms-3 btn btn-outline-danger" data-o_id="<?= $fpo['o_id'] ?>" data-om_id="<?= $fpo['om_id'] ?>" >cancel</button>
                    </div>
                  <?php
                } else if ($fpo['om_status'] == 0) {
                      
                      ?>
                      <button type="button" class="btn btn-outline-danger">Cancelled</button>
                    <?php
                    } 
                    else if ($fpo['om_status'] == 1) 
                    {
                      ?>
                        <button type="button" class="btn btn-outline-success">Delivered</button>
                      <?php
                    }
                    else 
                    
                ?>  
                </td>
            </tr>
            <?php
            $n++;
            }
            ?>
        </tbody>
    </table>
    
</div>
<?php
}else {
?>
    <!-- <h1>Shopping Cart</h1>
    <hr> -->
    <div class="card shadow-lg border-0 p-5">
        <div class="text-center">
            <img src="img/empty_order.png" alt="" class="img-fuild w-25">
            <h3 class="fw-bold m-3">Your VECOM Order is empty.</h3>
            <h6 class="mt-0">Add order now.</h6>
            <a href="index.php" class="fw-bold btn btn-outline-primary my-2">Shop Now</a>
        </div>
    </div>
    
<?php
}
?>
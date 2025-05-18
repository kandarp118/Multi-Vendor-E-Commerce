<?php
include("connection.php");
session_start();

// Fetch cart items for the logged-in user
$c_id = mysqli_real_escape_string($c, $_SESSION['user']['c_id']);
$sel_cart_query = "SELECT * FROM cart WHERE c_id='$c_id'";

// Execute the query and check for errors
$sel_cart_ans = mysqli_query($c, $sel_cart_query);
if (!$sel_cart_ans) {
    die("Error in cart query: " . mysqli_error($c));
}



if (mysqli_num_rows($sel_cart_ans) > 0) {
?>
<div class="col-lg-12 mb-5">
<h1 class="fs-1 fw-bold">Shopping Cart</h1>
<hr>
    <div class="shadow table-responsive card border-0 py-3 px-4">
        <table class="table table-hover text-center mb-0">
            <thead class="bg-warning text-dark">
                <tr>
                    <th>#</th>
                    <th>image</th>
                    <th>Products</th>
                    <th class="text-start">Price</th>
                    <th>Quantity</th>
                    <th class="text-start">Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php
                $n=1;
                $total_amount = 0 ;
                while ($fcart = mysqli_fetch_array($sel_cart_ans)) {
                    $total_amount += $fcart['cart_total'];
                    // Retrieve the product ID from the cart
                    $p_id = mysqli_real_escape_string($c, $fcart['p_id']);
                    
                    // Fetch product quantity from the product table
                    $sel_pro_query = "SELECT * FROM product WHERE p_id='$p_id'";
                    $sel_pro_ans = mysqli_query($c, $sel_pro_query);
                    // if (!$sel_pro_ans) {
                    //     die("Error in product query: " . mysqli_error($c));
                    // }
                    
                    $fp = mysqli_fetch_array($sel_pro_ans);
                    
                    if ($fp) {
                        $max_quantity = $fp[3];
                    } else {
                        $max_quantity = 0;
                    }
                    $current_quantity = $fcart['pro_quantity'];
                ?>
                <tr>
                    <td class="align-middle"><?php echo "$n"; ?></td>
                    <td class="align-middle"> <img src="./admin/img/pro_img/<?= $fcart['pro_image'] ?>" class="w-50"></td>
                    <td class="align-middle">
                        
                        <?= $fcart['pro_name'] ?>
                    </td>
                    <td class="align-middle text-start">&#8377;<?= $fcart['pro_price'] ?></td>
                    <td class="align-middle">
                        <div class="input-group quantity mx-auto" style="width: 45px;">
                            <select name="quantity[<?= $fcart['cart_id'] ?>]" data-p_id="<?= $fcart['p_id'] ?>" data-cart_id="<?= $fcart['cart_id'] ?>" id="pro_qun_upd" class="form-control text-center">
                                <?php
                                for ($pqnum = 1; $pqnum <= $max_quantity; $pqnum++) {
                                    $selected = ($pqnum == $current_quantity) ? 'selected' : '';
                                    echo "<option value='$pqnum' $selected>$pqnum</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <td class="align-middle text-start">&#8377;<?= $fcart['cart_total'] ?></td>
                    <td class="align-middle">
                        <!-- <button class="btn btn-danger rounded-pill">Add to Wishlist</button>                     -->
                        <button data-cart_id="<?= $fcart['cart_id'] ?>" id="removeCartBtn" class="btn btn-outline-danger remove-cart-btn">Remove</button>
                    </td>

                </tr>
                <?php
                $n++;
                }
                ?>
            </tbody>
        </table>
        
    </div>
    <div class="p-2 mt-3 col-12 align-middle">
        <div class="rounded p-3 bg-white row justify-contant-around shadow align-middle">
            <div class="col-5 p-2 align-middle">
                <a class="fw-bold" href="index.php">Continue Shoping</a>
            </div>
            <div class="col-3 p-2 text-end align-middle">
                <h5 class="font-weight-bold">Total Amount  : &#8377;<?= $total=$total_amount ?></h5>   
            </div>
            <div class="col-4 p-1 text-end align-middle">
                <a href="checkout.php" class="btn btn-outline-warning fw-bold">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>

    

    <!-- <div class="p-2 card">
        <div class="card-header">
            Shoping Items <?php echo "$n"; ?>
        </div>
        <?php
            $n=1;
            while ($fcart = mysqli_fetch_array($sel_cart_ans)) {
                // Retrieve the product ID from the cart
                $p_id = mysqli_real_escape_string($c, $fcart['p_id']);
                
                // Fetch product quantity from the product table
                $sel_pro_query = "SELECT * FROM product WHERE p_id='$p_id'";
                $sel_pro_ans = mysqli_query($c, $sel_pro_query);
                if (!$sel_pro_ans) {
                    die("Error in product query: " . mysqli_error($c));
                }
                
                $fp = mysqli_fetch_array($sel_pro_ans);
                
                // Ensure $fp is not null and has the correct column name
                if ($fp) {
                    $max_quantity = $fp[3];
                } else {
                    $max_quantity = 0; // Handle the case where product is not found
                }

                $current_quantity = $fcart['pro_quantity'];
            ?>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="./admin/img/pro_img/<?= htmlspecialchars($fcart['pro_image']) ?>" alt="" style="width: 50px;">
                </div>
                <div class="col-4">
                    <h3 class="card-title">
                    <?= htmlspecialchars($fcart['pro_name']) ?>
                    </h3>
                    <h4>

                    </h4>
                </div>
                <div class="col-4">
                    <h5 class=""><?= htmlspecialchars($fcart['pro_price']) ?></h5>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <h3>Sub Total.</h3>
        </div>
    </div> -->
<?php
} }else {
?>
    <!-- <h1>Shopping Cart</h1>
    <hr> -->
    <div class="card shadow-lg border-0 p-5">
        <div class="text-center">
            <img src="img/empty.png" alt="" class="img-fuild w-25">
            <h3 class="fw-bold m-3">Your VECOM Cart is empty.</h3>
            <h6 class="mt-0">Add products to cart now.</h6>
            <a href="index.php" class="fw-bold btn btn-outline-primary my-2">Shop Now</a>
        </div>
    </div>
    
<?php
}
?>
<?php
    include("connection.php");
    include("header.php");
    include("menubar.php");
    // session_start();
    $c_id=$_SESSION['user']['c_id'];
    $sel_user="SELECT * FROM customer WHERE c_id='$c_id'";
    $sel_user_ans=mysqli_query($c,$sel_user);
    $fuser = mysqli_fetch_array($sel_user_ans); 
    $sel_cart_pro = "SELECT * FROM cart INNER JOIN product ON cart.p_id = product.p_id WHERE cart.c_id='$c_id'";
    $sel_ans=mysqli_query($c,$sel_cart_pro);
    $fcno = mysqli_num_rows($sel_ans);
?>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row mb-3">
            <h1 class="fs-1 fw-bold">Your Checkout</h1>
            <hr>
        </div>
        <div class="row">
            <main>
                <div class="row g-5">
                    <div class="col-md-6 col-lg-5 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-dark">Your cart</span>
                            <span class="badge bg-warning text-dark rounded-pill"><b><?= $fcno ?></b></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php
                                $sub_total = 0;
                                $poprice = 0;
                                $psprice = 0;
                                $discount = 0;
                                while($fc=mysqli_fetch_array($sel_ans)){
                            ?>
                            <li class="list-group-item d-flex justify-content-around lh-sm">
                                    <div class="my-4 me-3 col-3 align-middle">
                                <img src="./admin/img/pro_img/<?= $fc['pro_image'] ?>" alt="" class="w-100 h-auto me-2">

                                    </div>
                            <div class="col-9 py-2">
                                <h6 class="mb-2"><?= $fc['pro_name'] ?></h6>
                                <small class="text-start text-muted"> <b> &#8377;<?= $fc['p_selling_price'] ?></b> ( MRP: &#8377;<?= $fc['p_original_price'] ?> )</small><br>
                                <small class="text-muted text-end">QTY: <b><?= $fc['pro_quantity'] ?></b></small>
                                <h6 class="text-end text-muted fs-5 me-3">&#8377;<?= $fc['pro_quantity']*$fc['p_original_price'] ?></h6>
                                

                                </div>
                            </li>
                            <?php
                                    $sub_total += $fc['cart_total'];
                                    $poprice += $fc['pro_quantity']*$fc['p_original_price'];
                                    $psprice += $fc['pro_quantity']*$fc['p_selling_price'];
                                }
                                $discount = $poprice - $psprice;
                            ?>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <span>Discount</span>
                                <span class="text-success">- &#8377;<?= $discount ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between fw-bolder">
                                <span>Sub Total</span>
                                <span>&#8377;<?= $sub_total ?></span>
                            </li>
                            <!-- <li id="cod" class="list-group-item d-flex justify-content-between" style="display: none;">
                                <div class="">
                                <span class="my-0">COD Charges</span>
                                </div>
                                <span class="text-danger">+ &#8377;</span>
                            </li> -->
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="">
                                <span class="my-0">Shipping Charges</span>
                                <!-- <small>EXAMPLECODE</small> -->
                                </div>
                                <span class="text-success">&#8377;<?= $shipping = 0 ?> <span class="text-success">(Free)</span></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between fs-5">
                                <strong>Total Amount </strong>
                                <strong>&#8377;<?= $total=$sub_total//+$shipping ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-center bg-light">
                                <small class="text-success"> You will save &#8377;<?= $discount+$shipping ?> on this order </small>
                            </li>
                        </ul>

                        <!-- <form class="card p-2"> -->
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div> -->
                        <!-- </form> -->
                        <div class="p-2 text-center d-flex justify-content-between">
                            <span class="text-muted"><i class="fas fa-shield-alt me-2"></i>  Safe and Secure Payments. Easy returns. 100% Authentic products.</span>
                        </div>

                        <!-- <a href="index.php" class="text-center"> Shoping Continue </a> -->

                    </div>
                    <div class="col-md-6 col-lg-7">
                        <h4 class="mb-3">Billing address</h4>
                        <form id="checkoutForm" class="needs-validation" novalidate="">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" name="fname" placeholder="" value="<?= $fuser['c_first_name'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                                </div>

                                <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="lname" placeholder="" value="<?= $fuser['c_last_name'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                                </div>

                                <div class="col-12">
                                <label for="mobile" class="form-label">Mobile No.</label>
                                <input type="text" class="form-control" name="mobile" value="<?= $fuser['c_mobile_no'] ?>" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                                </div>

                                <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $fuser['c_email'] ?>" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                                </div>

                                <hr class="my-4">

                                <h4 class=" mt-0 mb-0">Shipping address</h4> 
                                <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <!-- <input type="text" class="form-control" id="address" placeholder="1234 Main St" required=""> -->
                                <textarea class="form-control" name="address" rows="2" required=""></textarea>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                                </div>

                                <div class="col-md-5">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Please enter your city.
                                </div>
                                </div>

                                <div class="col-md-5">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" name="state" required="">
                                <div class="invalid-feedback">
                                    Please enter your state.
                                </div>
                                </div>

                                <div class="col-md-2">
                                <label for="zip" class="form-label">Zip Code</label>
                                <input type="number" class="form-control" name="zip" required="">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Payment</h4>

                            <!-- <div class="my-3 mx-1 row">
                                <div class="form-check col-md-6">
                                <input id="credit_card" name="payment_method" type="radio" class="form-check-input" value="credit_card" required="">
                                <label class="form-check-label" for="credit_card">Credit card</label>
                                </div>
                                <div class="form-check col-md-6">
                                <input id="upi" name="payment_method" type="radio" class="form-check-input" value="upi" data-bs-toggle="modal" data-bs-target="#upi_details" required="">
                                <label class="form-check-label" for="upi">Any Upi Apps</label>
                                </div>
                                <div class="form-check col-md-6">
                                <input id="net_banking" name="payment_method" type="radio" class="form-check-input" value="net_banking" required="">
                                <label class="form-check-label" for="net_banking">Net Banking</label>
                                </div>
                                <div class="form-check col-md-6">
                                <input id="cash" name="payment_method" type="radio" class="form-check-input" value="cash" required="">
                                <label class="form-check-label" for="cash">Cash on Delivery / Pay on Delivery</label>
                                </div>
                            </div> -->

                            <ul class="list-group mb-3">
                                <!-- <li class="list-group-item lh-sm p-3">
                                    <div class="mb-2">
                                        <input id="credit_card" name="payment_method" type="radio" class="form-check-input" value="credit_card">
                                        <label class="ms-2 form-check-label fw-semibold" for="credit_card">Credit card</label>
                                    </div>
                                    <div class="row mt-2 mb-3 mx-3 gy-3" id="credit_card_details" style="display: none;">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="cc-name" placeholder="">
                                                <label for="cc-name">Name on card</label>
                                            </div>
                                            <small class="text-muted">Full name as displayed on card</small>
                                            <div class="invalid-feedback">
                                                Name on card is required
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="cc-number" placeholder="">
                                                <label for="cc-number" class="form-label">Credit card number</label>
                                            </div>
                                            <div class="invalid-feedback">
                                                Credit card number is required
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cc-expiration" class="form-label">Expiration</label>
                                            <input type="text" class="form-control" id="cc-expiration" placeholder="">
                                            <div class="invalid-feedback">
                                                Expiration date required
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cc-cvv" class="form-label">CVV</label>
                                            <input type="text" class="form-control" id="cc-cvv" placeholder="">
                                            <div class="invalid-feedback">
                                                Security code required
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <small class="ms-4 text-muted">Add and secure cards as per RBI guidelines</small>
                                    </div>
                                </li> -->
                                <!-- <li class="list-group-item lh-sm p-3">
                                    <div class="mb-2">
                                        <input id="upi" name="payment_method" type="radio" class="form-check-input" value="upi" required="">
                                        <label class="ms-2 form-check-label" for="upi">UPI</label>
                                    </div>
                                    <div class="text-center">
                                        <small class="text-muted">Pay by any UPI app</small>
                                    </div>
                                </li> -->
                                <!-- <li class="list-group-item lh-sm p-3">
                                    <div class="mb-2">
                                        <input id="net_banking" name="payment_method" type="radio" class="form-check-input" value="net_banking" required="">
                                        <label class="ms-2 form-check-label" for="net_banking">Net Banking</label>
                                    </div>
                                    <div class="row gy-3" id="net_banking_details" style="display: none;">
                                        <span class="mx-2 mt-4 fw-semibold">Popular Banks</span>
                                        <div class="col-md-4">
                                            <div class="form-check m-2">
                                                <input type="radio" name="net_banking" class="form-check-input" id="sbi">
                                                <label for="sbi">
                                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNyIgaGVpZ2h0PSIyNyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTctN2g0MHY0MEgtN3oiLz48cGF0aCBmaWxsPSIjMTZEIiBkPSJNMTIuNiAyN0M1LjQgMjYuNS0uMiAyMC40IDAgMTMgLjIgNiA2LjIgMCAxMy41IDBTMjYuOCA1LjggMjcgMTNjLjIgNy40LTUuNCAxMy41LTEyLjYgMTRWMTZjMS0uNSAxLjctMS42IDEuNS0yLjgtLjQtMS4yLTEuNC0yLTIuNi0ycy0yLjIuOC0yLjQgMmMwIDEuMi41IDIuMyAxLjYgMi43Ii8+PC9nPjwvc3ZnPg==">
                                                    <span class="ms-2">State Bank Of India</span>
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input type="radio" name="net_banking" class="form-check-input" id="hdfc">
                                                <label for="hdfc">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNiIgaGVpZ2h0PSIyNiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTctN2g0MHY0MEgtN3oiLz48cGF0aCBmaWxsPSIjRUQyMzJBIiBkPSJNMCAwaDI2djI2SDAiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNC42IDQuNmgxNi44djE2LjhINC42Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTExLjcgMGgyLjZ2MjZoLTIuNiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0wIDExLjdoMjZ2Mi42SDAiLz48cGF0aCBmaWxsPSIjMDA0QzhGIiBkPSJNOSA5aDh2OEg5Ii8+PC9nPjwvc3ZnPg==">
                                                    <span class="ms-2">HDFC Bank</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check m-2">
                                                <input type="radio" name="net_banking" class="form-check-input" id="icic">
                                                <label for="icic">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNiIgaGVpZ2h0PSIyOCI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTctNmg0MHY0MEgtN3oiLz48cGF0aCBmaWxsPSIjRjk5RDI3IiBkPSJNNy41IDZjNi4zLTYuMiAxNC04IDE3LTMuNiAzIDQuMy40IDEzLTYgMTkuMi02LjIgNi4zLTE0IDgtMTcgMy42LTMtNC4zLS4zLTEzIDYtMTkuMiIvPjxwYXRoIGZpbGw9IiNCMDJBMzAiIGQ9Ik0xMS43IDIuN2MtLjcuNS0xLjQgMS0yIDEuOC01LjYgNS41LTggMTMtNS4yIDE2LjcgMi44IDMuOCA5LjYgMi40IDE1LjMtMyAzLTMgNS02LjUgNi05LjcgMC0yLjQtLjItNC41LTEuMy02QzIyLTEgMTctLjUgMTEuNyAyLjUiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNMTkuMyAyLjVjLjcuNy4zIDIuNC0xIDMuNi0xLjMgMS43LTMgMi0zLjYgMS0uOC0uMy0uMy0yIDEtMy4yIDEuMi0xLjMgMy0xLjcgMy42LTF6bS00LjUgMjIuMmMtMyAyLjItNiAzLjMtOSAzIDEuMyAwIDIuMy0xLjQgMy0zLjMgMS0yIDEuNS0zLjcgMi01LjQuNS0yLjYuNS00LjUuMi01LS41LS42LTEuNy0uNC0zIC40LS42LjMtMS40IDAtLjQtMSAxLTEuMyA1LTQuMiA2LjMtNC42IDEuMi0uNSAzIDAgMi4zIDEuOC0uNCAxLjMtNS44IDE1LjYtMS44IDE0eiIvPjwvZz48L3N2Zz4=">
                                                    <span class="ms-2">ICIC Bank</span>
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input type="radio" name="net_banking" class="form-check-input" id="axic">
                                                <label for="axic">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOCIgaGVpZ2h0PSIyNCI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTYtOGg0MHY0MEgtNnoiLz48cGF0aCBmaWxsPSIjQkM0MTcwIiBkPSJNMjggMjRoLTguN0wxNCAxNWg4LjdtLTQuNC03LjZMOC43IDI0SDBMMTQgMCIvPjwvZz48L3N2Zz4=">
                                                    <span class="ms-2">Axic Bank</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-check m-2">
                                                <input type="radio" name="net_banking" class="form-check-input" id="kotak">
                                                <label for="kotak">
                                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOCIgaGVpZ2h0PSIyNCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxkZWZzPjxwYXRoIGlkPSJhIiBkPSJNMjggMEgwdjIzLjhoMjhWMHoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTYtOGg0MHY0MEgtNnoiLz48bWFzayBpZD0iYiIgZmlsbD0iI2ZmZiI+PHVzZSB4bGluazpocmVmPSIjYSIvPjwvbWFzaz48cGF0aCBmaWxsPSIjMDAzODc0IiBkPSJNMCAxMkMwIDUuMiA2LjMgMCAxNCAwczE0IDUuMyAxNCAxMmMwIDYuNS02LjMgMTEuOC0xNCAxMS44cy0xNC01LjMtMTQtMTIiIG1hc2s9InVybCgjYikiLz48cGF0aCBmaWxsPSIjRUQxQzI0IiBkPSJNMTIuMyAzLjhsMy4yLTFWMjBsLTMuMiAxLjIiIG1hc2s9InVybCgjYikiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNMTQuMiAxNC43QzEyLjggMTYuMyAxMS40IDE4IDkgMThjLTMuNyAwLTUuNC0zLjQtNS40LTYuMyAwLTIuOCAxLjMtNiA0LjgtNiAxLjUgMCAzIDEgNCAyVjEwYy0xLS43LTIuNS0xLTMuNi0xLTIuMiAwLTQuMi43LTQgMyAwIDEuNCAxLjQgMi40IDMgMi40IDIuMiAwIDMuNi0yIDQuNy0zLjZMMTQgOWMxLTEuNiAyLjYtMy4yIDUtMy4yIDMgMCA0LjcgMi40IDUuMiA1SDIzYy0uNS0xLTEuNS0xLjQtMi42LTEuNC0yLjMgMC0zLjggMi01IDMuN2wtMS4yIDJ6TTI0LjUgMTNjLS4zIDIuNi0xLjcgNS00LjggNS0xLjggMC0zLjItMS00LjItMi42di0xLjdjMS4zLjYgMi40IDEuMiAzLjggMS4yIDEuNyAwIDMuMi0xIDMuOC0yaDJ6IiBtYXNrPSJ1cmwoI2IpIi8+PC9nPjwvc3ZnPg==">
                                                    <span class="ms-2">Kotak Mahindra Bank</span>
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input type="radio" name="net_banking" class="form-check-input" id="idfc">
                                                <label for="idfc">
                                                    <img src="admin/img/idfc.png" class="rounded-5" width="30px" height="30px" alt="">
                                                    <span class="ms-2">IDFC FIRST Bank</span>
                                                </label>
                                            </div>
                                        </div>
                                        <span class="mx-2 mt-3 fw-semibold">Other Banks</span>
                                        <div class="col-md-12">
                                            <div class="form-check m-2">
                                                <select class="tU3qwQ"><option value="SELECT_BANK">---Select Bank---</option><option value="AIRTELMONEY">Airtel Payments Bank</option><option value="AUSMALLFINBANK">AU Small Finance Bank</option><option value="BASSIENCATHOLICCOOPB">Bassien Catholic Co-Operative Bank</option><option value="BNPPARIBAS">BNP Paribas</option><option value="BOBAHRAIN">Bank of Bahrain and Kuwait</option><option value="BOBARODA">BOBCARD</option><option value="BOBARODAC">Bank of Baroda Corporate</option><option value="BOBARODAR">Bank of Baroda Retail</option><option value="BOI">Bank of India</option><option value="BOM">Bank of Maharashtra</option><option value="CANARA">Canara Bank</option><option value="CATHOLICSYRIAN">Catholic Syrian Bank</option><option value="CBI">Central Bank</option><option value="CITYUNION">City Union Bank</option><option value="CORPORATION">Corporation Bank</option><option value="COSMOS">Cosmos Co-op Bank</option><option value="DBS">digibank by DBS</option><option value="DCB">DCB BANK LTD</option><option value="DENA">Dena Bank</option><option value="DEUTSCHE">Deutsche Bank</option><option value="DHANBANK">Dhanalakshmi Bank</option><option value="FEDERALBANK">Federal Bank</option><option value="HSBC">HSBC</option><option value="IDBI">IDBI Bank</option><option value="IDFC">IDFC FIRST Bank</option><option value="INDIANBANK">Indian Bank</option><option value="INDUSIND">IndusInd Bank</option><option value="IOB">Indian Overseas Bank</option><option value="JANATABANKPUNE">JANATA SAHAKARI BANK LTD PUNE</option><option value="JKBANK">J&amp;K Bank</option><option value="KARNATAKA">Karnataka Bank</option><option value="KARURVYSYA">Karur Vysya Bank</option><option value="LAKSHMIVILAS">Lakshmi Vilas Bank - Retail</option><option value="LAKSHMIVILASC">Lakshmi Vilas Bank - Corporate</option><option value="PNB">Punjab National Bank</option><option value="PNBC">Punjab National Bank Corporate</option><option value="PNSB">Punjab &amp; Sind Bank</option><option value="PUNJABMAHA">Punjab &amp; Maharashtra Co-op Bank</option><option value="RATNAKAR">RBL Bank Limited</option><option value="RBS">RBS</option><option value="SARASWAT">Saraswat Co-op Bank</option><option value="SHAMRAOVITHAL">Shamrao Vithal Co-op Bank</option><option value="SHIVAMERCOOP">Shivalik Mercantile Co-op Bank</option><option value="SOUTHINDIAN">The South Indian Bank</option><option value="STANC">Standard Chartered Bank</option><option value="TMBANK">Tamilnad Mercantile Bank Limited</option><option value="TNMERCANTILE">Tamil Nadu Merchantile Bank</option><option value="TNSC">TNSC Bank</option><option value="UCO">UCO Bank</option><option value="UNIONBANK">Union Bank of India</option><option value="YESBANK">Yes Bank</option><option value="ZOROACOPBANK">The Zoroastrian Co-Operative Bank</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-sm-center">
                                        <small class="text-muted">This instrument has low success, use UPI or cards for better experience</small>
                                    </div>
                                </li> -->
                                <li class="list-group-item lh-sm p-3">
                                    <div class="d-flex justify-contant-center">
                                        <div class="mb-2 col-6">
                                            <input id="online" name="payment_method" type="radio" class="form-check-input" value="Online Transaction" required="">
                                            <label class="ms-2 form-check-label" for="online">Online Payment</label>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <input id="cash" name="payment_method" type="radio" class="form-check-input" value="Cash on Delivery" required="">
                                            <label class="ms-2 form-check-label" for="cash">Cash on Delivery</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>

                            <!-- <div class="row gy-3" id="credit_card_details" style="display: none;">
                                <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                                </div>

                                <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                                </div>

                                <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                                </div>

                                <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                                </div>
                            </div> -->

                            <!-- <div class="row gy-3" id="net_banking_details" style="display: none;">
                                <div class="col-md-4">
                                    <div class="form-check m-2">
                                        <input type="radio" name="net_banking" class="form-check-input" id="sbi">
                                        <label for="sbi">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNyIgaGVpZ2h0PSIyNyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTctN2g0MHY0MEgtN3oiLz48cGF0aCBmaWxsPSIjMTZEIiBkPSJNMTIuNiAyN0M1LjQgMjYuNS0uMiAyMC40IDAgMTMgLjIgNiA2LjIgMCAxMy41IDBTMjYuOCA1LjggMjcgMTNjLjIgNy40LTUuNCAxMy41LTEyLjYgMTRWMTZjMS0uNSAxLjctMS42IDEuNS0yLjgtLjQtMS4yLTEuNC0yLTIuNi0ycy0yLjIuOC0yLjQgMmMwIDEuMi41IDIuMyAxLjYgMi43Ii8+PC9nPjwvc3ZnPg==">
                                            <span class="ms-2">State Bank Of India</span>
                                        </label>
                                    </div>
                                    <div class="form-check m-2">
                                        <input type="radio" name="net_banking" class="form-check-input" id="hdfc">
                                        <label for="hdfc">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNiIgaGVpZ2h0PSIyNiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTctN2g0MHY0MEgtN3oiLz48cGF0aCBmaWxsPSIjRUQyMzJBIiBkPSJNMCAwaDI2djI2SDAiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNC42IDQuNmgxNi44djE2LjhINC42Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTExLjcgMGgyLjZ2MjZoLTIuNiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0wIDExLjdoMjZ2Mi42SDAiLz48cGF0aCBmaWxsPSIjMDA0QzhGIiBkPSJNOSA5aDh2OEg5Ii8+PC9nPjwvc3ZnPg==">
                                            <span class="ms-2">HDFC Bank</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check m-2">
                                        <input type="radio" name="net_banking" class="form-check-input" id="icic">
                                        <label for="icic">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNiIgaGVpZ2h0PSIyOCI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTctNmg0MHY0MEgtN3oiLz48cGF0aCBmaWxsPSIjRjk5RDI3IiBkPSJNNy41IDZjNi4zLTYuMiAxNC04IDE3LTMuNiAzIDQuMy40IDEzLTYgMTkuMi02LjIgNi4zLTE0IDgtMTcgMy42LTMtNC4zLS4zLTEzIDYtMTkuMiIvPjxwYXRoIGZpbGw9IiNCMDJBMzAiIGQ9Ik0xMS43IDIuN2MtLjcuNS0xLjQgMS0yIDEuOC01LjYgNS41LTggMTMtNS4yIDE2LjcgMi44IDMuOCA5LjYgMi40IDE1LjMtMyAzLTMgNS02LjUgNi05LjcgMC0yLjQtLjItNC41LTEuMy02QzIyLTEgMTctLjUgMTEuNyAyLjUiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNMTkuMyAyLjVjLjcuNy4zIDIuNC0xIDMuNi0xLjMgMS43LTMgMi0zLjYgMS0uOC0uMy0uMy0yIDEtMy4yIDEuMi0xLjMgMy0xLjcgMy42LTF6bS00LjUgMjIuMmMtMyAyLjItNiAzLjMtOSAzIDEuMyAwIDIuMy0xLjQgMy0zLjMgMS0yIDEuNS0zLjcgMi01LjQuNS0yLjYuNS00LjUuMi01LS41LS42LTEuNy0uNC0zIC40LS42LjMtMS40IDAtLjQtMSAxLTEuMyA1LTQuMiA2LjMtNC42IDEuMi0uNSAzIDAgMi4zIDEuOC0uNCAxLjMtNS44IDE1LjYtMS44IDE0eiIvPjwvZz48L3N2Zz4=">
                                            <span class="ms-2">ICIC Bank</span>
                                        </label>
                                    </div>
                                    <div class="form-check m-2">
                                        <input type="radio" name="net_banking" class="form-check-input" id="axic">
                                        <label for="axic">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOCIgaGVpZ2h0PSIyNCI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTYtOGg0MHY0MEgtNnoiLz48cGF0aCBmaWxsPSIjQkM0MTcwIiBkPSJNMjggMjRoLTguN0wxNCAxNWg4LjdtLTQuNC03LjZMOC43IDI0SDBMMTQgMCIvPjwvZz48L3N2Zz4=">
                                            <span class="ms-2">Axic Bank</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check m-2">
                                        <input type="radio" name="net_banking" class="form-check-input" id="kotak">
                                        <label for="kotak">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOCIgaGVpZ2h0PSIyNCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxkZWZzPjxwYXRoIGlkPSJhIiBkPSJNMjggMEgwdjIzLjhoMjhWMHoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNLTYtOGg0MHY0MEgtNnoiLz48bWFzayBpZD0iYiIgZmlsbD0iI2ZmZiI+PHVzZSB4bGluazpocmVmPSIjYSIvPjwvbWFzaz48cGF0aCBmaWxsPSIjMDAzODc0IiBkPSJNMCAxMkMwIDUuMiA2LjMgMCAxNCAwczE0IDUuMyAxNCAxMmMwIDYuNS02LjMgMTEuOC0xNCAxMS44cy0xNC01LjMtMTQtMTIiIG1hc2s9InVybCgjYikiLz48cGF0aCBmaWxsPSIjRUQxQzI0IiBkPSJNMTIuMyAzLjhsMy4yLTFWMjBsLTMuMiAxLjIiIG1hc2s9InVybCgjYikiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNMTQuMiAxNC43QzEyLjggMTYuMyAxMS40IDE4IDkgMThjLTMuNyAwLTUuNC0zLjQtNS40LTYuMyAwLTIuOCAxLjMtNiA0LjgtNiAxLjUgMCAzIDEgNCAyVjEwYy0xLS43LTIuNS0xLTMuNi0xLTIuMiAwLTQuMi43LTQgMyAwIDEuNCAxLjQgMi40IDMgMi40IDIuMiAwIDMuNi0yIDQuNy0zLjZMMTQgOWMxLTEuNiAyLjYtMy4yIDUtMy4yIDMgMCA0LjcgMi40IDUuMiA1SDIzYy0uNS0xLTEuNS0xLjQtMi42LTEuNC0yLjMgMC0zLjggMi01IDMuN2wtMS4yIDJ6TTI0LjUgMTNjLS4zIDIuNi0xLjcgNS00LjggNS0xLjggMC0zLjItMS00LjItMi42di0xLjdjMS4zLjYgMi40IDEuMiAzLjggMS4yIDEuNyAwIDMuMi0xIDMuOC0yaDJ6IiBtYXNrPSJ1cmwoI2IpIi8+PC9nPjwvc3ZnPg==">
                                            <span class="ms-2">Kotak Mahindra Bank</span>
                                        </label>
                                    </div>
                                    <div class="form-check m-2">
                                        <input type="radio" name="net_banking" class="form-check-input" id="idfc">
                                        <label for="idfc">
                                            <img src="admin/img/idfc.png" class="rounded-5" width="14%" height="14%" alt="">
                                            <span class="ms-2">IDFC FIRST Bank</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check m-2">
                                        <input type="radio" name="net_banking" class="form-check-input" id="other_bank">
                                        <label for="other_bank">
                                            <span>Other Bank</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row gy-3" id="net_banking_details" style="display: none;">
                                <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                                </div>

                                <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                                </div>

                                <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                                </div>

                                <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                                </div>
                            </div> -->

                            <!-- Modal -->
                            <!-- <div class="modal fade" id="upi_details" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="upi_details_label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row text-center">
                                                <p class="fs-6 text-danger">Don't press back button or refresh screen untill the payment is complete</p>
                                            </div>
                                            <div class="row text-center">
                                                <small class="fw-bold fs-6">End in : <span id="time"></span> </small>
                                            </div>
                                            <div class="d-flex justify-content-center text-center my-3">
                                                <i class="fs-1 fas fa-luggage-cart"></i> <b class="ms-2 fs-2 d-none d-sm-none d-lg-inline fw-bold">V.COM</b>
                                            </div>
                                            <div class="row text-center"> 
                                                <p class="fw-bold fs-5">Scan to pay with any UPI app</p>
                                            </div>
                                            <div class="d-flex justify-content-center my-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="40%" height="40%" viewBox="0 0 500 500"><rect x="0" y="0" width="500" height="500" fill="#ffffff"/><g transform="scale(17.241)"><g transform="translate(0,0)"><path fill-rule="evenodd" d="M10 0L10 1L8 1L8 3L9 3L9 4L8 4L8 8L6 8L6 9L4 9L4 8L3 8L3 9L2 9L2 8L0 8L0 9L2 9L2 10L4 10L4 11L7 11L7 12L3 12L3 13L4 13L4 14L2 14L2 15L1 15L1 14L0 14L0 15L1 15L1 16L0 16L0 17L1 17L1 16L3 16L3 17L5 17L5 18L4 18L4 19L3 19L3 18L2 18L2 19L3 19L3 20L2 20L2 21L3 21L3 20L4 20L4 21L8 21L8 23L9 23L9 25L8 25L8 26L9 26L9 27L8 27L8 29L10 29L10 28L11 28L11 27L13 27L13 25L14 25L14 27L16 27L16 28L18 28L18 29L19 29L19 28L18 28L18 25L19 25L19 27L20 27L20 29L21 29L21 27L23 27L23 28L22 28L22 29L28 29L28 28L29 28L29 25L28 25L28 28L26 28L26 27L27 27L27 26L26 26L26 24L25 24L25 23L26 23L26 21L27 21L27 24L29 24L29 23L28 23L28 21L29 21L29 20L28 20L28 21L27 21L27 19L25 19L25 20L22 20L22 19L24 19L24 18L27 18L27 17L28 17L28 16L29 16L29 11L28 11L28 12L26 12L26 10L25 10L25 13L24 13L24 9L25 9L25 8L22 8L22 9L21 9L21 6L20 6L20 3L21 3L21 2L20 2L20 1L21 1L21 0L19 0L19 1L18 1L18 2L17 2L17 4L16 4L16 1L17 1L17 0L16 0L16 1L15 1L15 0L14 0L14 1L13 1L13 0ZM9 2L9 3L10 3L10 5L9 5L9 8L8 8L8 9L6 9L6 10L8 10L8 11L11 11L11 13L10 13L10 12L7 12L7 13L6 13L6 14L7 14L7 13L10 13L10 14L9 14L9 15L8 15L8 16L7 16L7 15L6 15L6 16L7 16L7 17L6 17L6 18L7 18L7 19L5 19L5 20L7 20L7 19L8 19L8 21L9 21L9 23L10 23L10 25L11 25L11 26L10 26L10 27L11 27L11 26L12 26L12 24L11 24L11 23L12 23L12 22L13 22L13 20L14 20L14 21L15 21L15 22L14 22L14 23L13 23L13 24L14 24L14 25L15 25L15 26L17 26L17 25L18 25L18 23L20 23L20 22L19 22L19 21L20 21L20 20L19 20L19 21L18 21L18 20L17 20L17 18L18 18L18 19L20 19L20 18L18 18L18 16L20 16L20 17L21 17L21 18L24 18L24 17L21 17L21 16L22 16L22 12L21 12L21 11L19 11L19 9L20 9L20 10L21 10L21 9L20 9L20 8L19 8L19 7L20 7L20 6L19 6L19 7L18 7L18 6L17 6L17 5L19 5L19 3L18 3L18 4L17 4L17 5L16 5L16 6L15 6L15 9L16 9L16 11L15 11L15 10L14 10L14 13L13 13L13 12L12 12L12 11L11 11L11 8L10 8L10 5L11 5L11 3L10 3L10 2ZM12 2L12 6L11 6L11 7L12 7L12 6L13 6L13 7L14 7L14 5L13 5L13 4L14 4L14 3L15 3L15 2L14 2L14 3L13 3L13 2ZM16 6L16 8L17 8L17 6ZM12 8L12 10L13 10L13 9L14 9L14 8ZM26 8L26 9L27 9L27 10L28 10L28 8ZM9 9L9 10L10 10L10 9ZM17 9L17 11L16 11L16 17L17 17L17 16L18 16L18 15L17 15L17 14L18 14L18 13L17 13L17 11L18 11L18 9ZM22 9L22 11L23 11L23 9ZM1 11L1 12L2 12L2 11ZM20 12L20 13L19 13L19 14L20 14L20 16L21 16L21 12ZM11 13L11 14L13 14L13 15L14 15L14 14L13 14L13 13ZM23 13L23 15L24 15L24 16L25 16L25 14L28 14L28 13L25 13L25 14L24 14L24 13ZM4 15L4 16L5 16L5 15ZM27 15L27 16L26 16L26 17L27 17L27 16L28 16L28 15ZM10 16L10 17L11 17L11 16ZM7 17L7 18L9 18L9 19L11 19L11 18L9 18L9 17ZM12 17L12 18L15 18L15 17ZM0 18L0 19L1 19L1 18ZM28 18L28 19L29 19L29 18ZM12 19L12 20L10 20L10 21L12 21L12 20L13 20L13 19ZM0 20L0 21L1 21L1 20ZM17 21L17 23L16 23L16 22L15 22L15 23L14 23L14 24L15 24L15 23L16 23L16 24L17 24L17 23L18 23L18 21ZM21 21L21 24L24 24L24 21ZM10 22L10 23L11 23L11 22ZM22 22L22 23L23 23L23 22ZM19 24L19 25L20 25L20 24ZM23 25L23 26L25 26L25 25ZM20 26L20 27L21 27L21 26ZM13 28L13 29L14 29L14 28ZM0 0L7 0L7 7L0 7ZM1 1L1 6L6 6L6 1ZM2 2L5 2L5 5L2 5ZM22 0L29 0L29 7L22 7ZM23 1L23 6L28 6L28 1ZM24 2L27 2L27 5L24 5ZM0 22L7 22L7 29L0 29ZM1 23L1 28L6 28L6 23ZM2 24L5 24L5 27L2 27Z" fill="#000000"/></g></g></svg>

                                            </div>
                                            <div class="row text-center">
                                                <small class="text">Scan the QR from your mobile using any UPI app such as Google Pay, Phone Pe, Paytm, CRED, Amazone Pay, BHIM etc...</small>
                                            </div>
                                            <div class="row justify-content-center text-center mt-3">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" onkeypress="function demo(){ clearInterval(downloadTimer); }">Back</button>
                                                    <button type="button" class="btn btn-outline-success" id="pay_success" data-bs-dismiss="modal" >Payment Successfull</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <input type="hidden" id="total_amount" name="total" value="<?= $total ?>">
                            <input type="hidden" name="c_id" value="<?= $_SESSION['user']['c_id'] ?>">
                            <button class="w-100 btn btn-warning btn-lg mt-3 fw-semibold fs-5" type="submit" id="place_order">Place Order</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script>
(() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault();
            event.stopPropagation(); 
            if (form.checkValidity()) 
            {   
                let form_data = new FormData($('#checkoutForm')[0]);
                if ($('#online').is(':checked')) 
                {
                    let total = $("#total_amount").val();
                    var options = {
                        "key": "rzp_test_7JsqHnUI4elIH5", // Enter the Key ID generated from the Dashboard
                        "amount": total*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
                        "currency": "INR",
                        "name": "VECOM",
                        "description": "Test Transaction",
                        "image": "vecom.png",//This is a sample Order id. Pass the `id` obtained in the response of Step 1.
                        "handler": function (response){
                            $.ajax({
                                type:'post',
                                url:'add_order.php',
                                cache: false,
                                contentType: false,
                                processData: false,
                                // data:"transaction_id="+response.razorpay_payment_id+"&amt="+amt+"&name="+name,
                                data:form_data,
                                success:function(ans){
                                    // window.location.href="thanks.php";
                                    if (ans === "success") {
                                        Swal.fire({
                                            title: "Order Successfully Placed !",
                                            icon: "success",
                                            confirmButtonText: "Shop Orders",
                                            allowOutsideClick: false,
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = 'invoice.php';
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Something went wrong!",
                                            footer: '<a href="#">'+ans+'</a>'
                                        });
                                    }
                                }
                            });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                } 
                else 
                {
                    $.ajax({
                        type:'post',
                        url:'add_order.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        // data:"transaction_id="+response.razorpay_payment_id+"&amt="+amt+"&name="+name,
                        data:form_data,
                        success:function(ans){
                            // window.location.href="thanks.php";
                            if (ans === "success") {
                                Swal.fire({
                                    title: "Order Successfully Placed !",
                                    icon: "success",
                                    confirmButtonText: "Shop Orders",
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'invoice.php';
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Something went wrong!",
                                    footer: '<a href="#">'+ans+'</a>'
                                });
                            }
                        }
                    });
                }
                // $.ajax({
                //     url: 'add_order.php',
                //     cache: false,
                //     contentType: false,
                //     processData: false,
                //     data: form_data,
                //     type: 'POST',
                //     success: function(ans) {
                //         if (ans === "success") {
                //         alert(ans);
                //         window.location.href = 'index.php';
                //         } else {
                //         alert(ans);
                //         }
                //     }
                // });
            } 
            else 
            {
                form.classList.add('was-validated');
            }
        }, false);
    });
})();
</script>
<?php
    include("footer.php");
?>
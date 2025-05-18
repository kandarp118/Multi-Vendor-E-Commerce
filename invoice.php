<!-- <!DOCTYPE html> -->

<?php
  include("connection.php");
  session_start();
  if (isset($_SESSION['user'])) 
  {
    $c_id = $_SESSION['user']['c_id'];
    $sel_order = "SELECT * FROM orders WHERE c_id='$c_id' AND o_id = (SELECT MAX(o_id) FROM orders)";
    $order_ans = mysqli_query($c,$sel_order);
    $forder = mysqli_fetch_array($order_ans);
    $o_id = $forder['o_id'];
?>
  
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- <link rel="stylesheet" href="bo.css"> -->
        <link rel="stylesheet" href="invoice.css" type="text/css" media="all" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <!-- <script src="pdf.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
        <style>
          @media print {
             footer{
              display: none;
             } 
            }
        </style>
    </head>
  
    <body style="background-color: lightgoldenrodyellow;" >
      <div id="invoice">
      <div class="container d-flex justify-content-center mt-50 mb-75" style="padding: 20px 10px 20px 10px; " > 
          <!-- <div class="row p-3"> 
            <a href="#"><- back</a>
          </div> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="px-14 py-6">
                          <table class="w-full m-5 border-collapse border-spacing-0">
                            <tbody>
                              <tr>
                                <td class="w-full align-top">
                                  <div>
                                    <h1 style="font-size: 2.5vw;color: #ffc107;">
                                      <i class=" fas fa-luggage-cart" style="font-size: 3.5vw;"></i>
                                      <b class="font-bold text-warning" style="font-size:xx-large; font-weight:700;">VECOM</b>
                                    </h1>
                                  </div>
                                </td>
                  
                                <td class="align-top">
                                  <div class="text-sm">
                                    <table class="border-collapse border-spacing-0">
                                      <tbody>
                                        <tr>
                                          <td class="border-r pr-4">
                                            <div>
                                              <p class="whitespace-nowrap font-bold text-right">Date</p>
                                              <p class="whitespace-nowrap font-bold text-main text-right"><?= date(' F j, Y') ?></p>
                                            </div>
                                          </td>
                                          <td class="pl-4">
                                            <div>
                                              <p class="whitespace-nowrap font-bold text-left">Invoice No.</p>
                                              <p class="whitespace-nowrap font-bold text-main text-left">2024<?= $forder['o_id'].$forder['c_id'] ?></p>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                  
                        <div class="bg-slate-100 px-14 py-6" style="margin: 20px 45px 20px 45px;">
                          <!-- <table class="w-full border-collapse border-spacing-0"> -->
                            <!-- <tbody>
                              <tr>
                              <td class="w-1/2 align-top text-left">
                                  <div class="text-sm text-neutral-600">
                                    <p class="font-bold" style="font-size: 1.5vw;">Customer Company</p>
                                    <br>
                                    <p>Name : <?= $forder['c_f_name']." ".$forder['c_l_name'] ?></p>
                                    <p>Number : <?= $forder['c_mobile_no'] ?></p>
                                    <p>E-Mail : <?= $forder['c_email'] ?></p>
                                    <p>Address : <?= $forder['c_address'] ?></p>
                                    <p>City : <?= $forder['c_city'] ?></p>
                                    <p>Pin Code : <?= $forder['c_pin_code'] ?></p>
                                  </div>
                                </td>
                                <td class="w-1/2 align-top text-left">
                                  <div class="text-sm text-neutral-600">
                                    <p class="font-bold" style="font-size: 1.5vw;">Contact Us</p>
                                    <br>
                                    <div class="text-left">
                                      <p>vecom@gmail.com<i class="fa fa-map-marker-alt text-warning me-3"></i></p>
                                      <br>
                                      <p><i class="fa fa-envelope text-warning me-3"></i></p>
                                      <br>
                                      <p><i class="fa fa-phone-alt text-warning me-3"></i></p>
                                    </div>
                                  </div>
                                </td>
                                
                              </tr>
                            </tbody>
                          </table> -->
                          <div style="display:flex; justify-content: space-between;">
                            <div>
                              <div class=" text-neutral-600">
                                <p class="" style="font-size: 18px; font-weight: 700; margin-bottom: 15px;">Invoice To </p>
                                <!-- <br> -->
                                <p class=""><?= $forder['c_f_name']." ".$forder['c_l_name']."," ?></p>
                                <!-- <p>Number : <?php //$forder['c_mobile_no'] ?></p> -->
                                <p class=""><?= $forder['c_email'] ?></p> 
                                <p class=""><?= $forder['c_address']."," ?></p>
                                <p class=""><?= $forder['c_city']." - ".$forder['c_pin_code']."," ?></p>
                                <p><?= $forder['c_state'] ?></p>
                                <!-- <p>Pin Code :</p> -->
                              </div>
                            </div>
                            <div>
                            <div class=" text-neutral-600">
                              <!-- <br> -->
                              <p class="" style="font-size: 18px; font-weight: 700; margin-bottom: 15px;">Contact Us</p>
                              <!-- <br> -->
                              <div class="text-left">
                                <p class=""><i class="fa fa-map-marker-alt"  style="margin-right: 10px; margin-bottom: 10px;"></i>Amreli-365601, Gujarat </p>
                                <!-- <br> -->
                                <p class=""><i class="fa fa-envelope" style="margin-right: 10px; margin-bottom: 10px;"></i> vecom2425@gmail.com</p>
                                <!-- <br> -->
                                <p class=""><i class="fa fa-phone-alt" style="margin-right: 10px;"></i> +91 76220 45046</p>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="px-14 py-10 text-sm text-neutral-700">
                          <table class="w-full border-collapse border-spacing-0">
                            <thead>
                              <tr>
                                <td class="border-b-2 border-main pb-3 pl-3  text-main">No.</td>
                                <td class="border-b-2 border-main pb-3 pl-3 text-center text-main">Images</td>
                                <td class="border-b-2 border-main pb-3 pl-2 text-center text-main">Product details</td>
                                <td class="border-b-2 border-main pb-3 pl-2 text-center text-main">Base Price</td>
                                <td class="border-b-2 border-main pb-3 pl-2 text-center text-main">IGST</td>
                                <td class="border-b-2 border-main pb-3 pl-2 text-center text-main">Gst Amount</td>
                                <td class="border-b-2 border-main pb-3 pl-2 text-center text-main">Selling Price</td>
                                <td class="border-b-2 border-main pb-3 pl-2 text-center text-main">Quantity</td>
                                <!-- <td class="border-b-2 border-main pb-3 pl-2 text-center font-bold text-main">Shiping</td> -->
                                <td class="border-b-2 border-main pb-3 pl-2 text-center text-main">Subtotal</td>
                                <!-- <td class="border-b-2 border-main pb-3 pl-2 pr-3 text-right font-bold text-main">Subtotal + VAT</td> -->
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sel_pro_order = "SELECT * FROM order_master INNER JOIN product ON order_master.p_id=product.p_id WHERE order_master.o_id='$o_id'";
                                $sel_pro_order_ans = mysqli_query($c,$sel_pro_order);
                                if ($sel_pro_order_ans) {
                                  $n = 1; 
                                  $total = 0;
                                  $scgst_amount = 0;
                                  while($fpo=mysqli_fetch_array($sel_pro_order_ans))
                                  {
                                ?>
                                <tr>
                                  <td class="border-b py-3 pl-3"><?= $n."." ?></td>
                                  <td class="border-b py-3 pl-3" style="height: 70px; width: 100px; margin-right:10px;"> <img src="./admin/img/pro_img/<?= $fpo['p_image'] ?>" alt="" style="width: 75px; height: auto;"></td>
                                  <td class="border-b py-3 pl-2 text-center"><?php echo $fpo['p_name']; ?></td>
                                  <td class="border-b py-3 pl-2 text-center">&#8377;<?= $fpo['p_purchase_price'] ?></td>
                                  <td class="border-b py-3 pl-2 text-center"><?= ($fpo['p_tax_rate']*100) ?>%</td>
                                  <td class="border-b py-3 pl-2 text-center">&#8377;<?= $fpo['p_tax_amount'] ?></td>
                                  <td class="border-b py-3 pl-2 text-center">&#8377;<?= $fpo['p_selling_price'] ?></td>
                                  <td class="border-b py-3 pl-2 text-center"><?= $fpo['p_quantity'] ?></td>
                                  <!-- <td class="border-b py-3 pl-2 text-center">20%</td> -->
                                  <td class="border-b py-3 pl-2 text-center">&#8377;<?= $fpo['p_total'] ?></td>
                                  <!-- <td class="border-b py-3 pl-2 pr-3 text-right">$180.00</td> -->
                                </tr>
                                <?php
                                    $csgst = ($fpo['p_tax_rate'] * 100) / 2;
                                    $scgst_amount += $fpo['p_tax_amount'];
                                    $total += $fpo['p_total'];
                                    $n++;
                                  }
                                }
                                else {
                                  echo "error"; 
                                }
                                ?>
                              <tr>
                                <td colspan="9">
                                  <table class="w-full border-collapse border-spacing-0">
                                    <tbody>
                                      <tr>
                                        <td class="w-full"></td>
                                        <td>
                                          <table class="w-full border-collapse border-spacing-0">
                                            <tbody>
                                            <tr>
                                                <br>
                                                <td class=" p-3">
                                                  <div class="whitespace-nowrap font-bold " style="font-weight: 700;">Total GST :</div>
                                                </td>
                                                <td class=" p-3 text-end">
                                                  <div class="whitespace-nowrap font-bold" style="font-weight: 700;">&#8377;<?= $scgst_amount ?></div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <br>
                                                <td class=" p-3">
                                                  <div class="whitespace-nowrap font-bold " style="font-weight: 700;">S-GST :</div>
                                                </td>
                                                <td class=" p-3 text-end">
                                                  <div class="whitespace-nowrap font-bold" style="font-weight: 700;">&#8377;<?= $scgst_amount/2 ?></div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <br>
                                                <td class=" p-3">
                                                  <div class="whitespace-nowrap font-bold " style="font-weight: 700;">C-GST :</div>
                                                </td>
                                                <td class=" p-3 text-end">
                                                  <div class="whitespace-nowrap font-bold" style="font-weight: 700;">&#8377;<?= $scgst_amount/2 ?></div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <br>
                                                <td class="bg-main p-3">
                                                  <div class="whitespace-nowrap font-bold text-white" style="font-weight: 700;">Total Amount:</div>
                                                </td>
                                                <td class="bg-main p-3 text-end">
                                                  <div class="whitespace-nowrap font-bold text-white" style="font-weight: 700;">&#8377;<?= $total ?></div>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="px-14 text-neutral-700">
                          <p class="text-main font-bold" style="font-size:larger; margin-bottom: 5px;">Payment Details:  </p>
                          <p class="font-bold">Payment Method: <?= $forder['payment_method'] ?></p>
                        </div>
                        <!-- <div class="px-14 py-10 text-sm text-neutral-700">
                          <p class="text-main font-bold">Notes</p>
                          <p class="italic">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries
                            for previewing layouts and visual mockups.</p>
                          </dvi>
                        </div> -->
                      </div>
                </div>
            </div>
            
        </div>
      </div>
        
        <div class="row p-3" style="margin-top: 50px;">
              <footer class="fixed bottom-0 left-0 bg-slate-100 w-full text-neutral-600 text-center text-xs py-3">
                <div id="btn_print_pdf" class="invoice-btn-section clearfix d-print-none">
                    <center style="display: flex; justify-content: space-around;">
                      <a class="font-bold" href="order.php" style="font-size: 1vw;"><i class="fas fa-shopping-bag" style="font-size: 1.5vw; font-weight: bold; margin-right:14px;"></i>Show your orders</a>
                      <div>
                        <!-- <span style="margin: 20px; font-size: 1vw;"> </span> -->
                        <!-- <a href="" style="font-size: 1vw;"><i class="fa-brands fa-whatsapp" style="font-size: 1.5vw; font-weight: bold; margin-right:10px;"></i> Whatsapp</a> -->
                        <!-- <span style="margin: 20px; font-size: 1vw;">|</span> -->
                        <button class="font-bold" type="button" onclick="printDiv('invoice')" style="font-size: 1vw;"><i class="fa fa-print" style="font-size: 1.5vw; font-weight: bold; margin-right:10px;"></i> Print Invoice</button>
                        <span style="margin: 20px; font-size: 1vw;">|</span>
                        <button class="font-bold" type="button" onclick="download('invoice')" style="font-size: 1vw;"><i class="fa-solid fa-file-arrow-down" style="font-size: 1.5vw; font-weight: bold; margin-right:10px;"></i> Download as PDF </button> 
                      </div>
                    </center>
                </div>
              </footer>
            </div>
      <script>
        function printDiv(divId) {
          var printContents = document.getElementById(divId).innerHTML;
          var originalContents = document.body.innerHTML;
  
          document.body.innerHTML = printContents;
  
          window.print();
  
          document.body.innerHTML = originalContents;
      }
      function download(divID) {
          const invoice = this.document.getElementById(divID);
          console.log(invoice);
          console.log(window);
          var opt = {
              margin: 1,
              filename: 'myfile.pdf',
              image: { type: 'jpeg', quality: 0.98 },
              html2canvas: { scale: 2 },
              jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
          };
          html2pdf().from(invoice).save();
          // html2pdf().from(invoice).set(opt).save();
      }
      </script>
    </body>
  </html>
<?php
  } else {
    # code...
  }
?>
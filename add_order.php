<?php 
    include("connection.php");
    session_start();

    if (isset($_POST['c_id'])) 
    {
        $c_id = $_POST['c_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['zip'];
        $pay_method = $_POST['payment_method'];
        $total = $_POST['total'];
        $date = date('d/m/Y h:i:s', time());
        $add_order = "INSERT INTO orders VALUES('?','$c_id','$fname','$lname','$mobile','$email','$address','$city','$pincode','$state','$pay_method','$date')";
        $order_ans = mysqli_query($c,$add_order);

        if ($order_ans) 
        {
            $sel_order = "SELECT * FROM orders WHERE c_id='$c_id' AND o_id = (SELECT MAX(o_id) FROM orders)";
            $order_ans = mysqli_query($c,$sel_order);
            $forder = mysqli_fetch_array($order_ans);
            $o_id = $forder['o_id'];
            $sel_cart = "SELECT * FROM cart WHERE c_id='$c_id'";
            $cart_ans = mysqli_query($c,$sel_cart);
            $data = array();
            while ($fcart = mysqli_fetch_assoc($cart_ans))
            {  
                $data[] = $fcart;
            }

            foreach($data as $frow){
                $pro_order = "INSERT INTO order_master VALUES('?','".$o_id."','".$frow['p_id']."','".$frow['pro_image']."','".$frow['pro_name']."','".$frow['pro_price']."','".$frow['pro_quantity']."','".$frow['cart_total']."',NULL)";
                $pro_order_ans = mysqli_query($c,$pro_order);
                if ($pro_order_ans == false)
                {
                    echo "error in order product";
                    echo $pro_order;
                    break;
                }
            }
            if ($pro_order_ans) 
            {
                $del_cart="DELETE FROM cart WHERE c_id = '$c_id'";
                $del_ans=mysqli_query($c,$del_cart);
                if ($del_ans) {
                    $_SESSION['status_order'] = "add".$_SESSION['user']['c_id'];                  
                    echo "success";  
                } else {
                    echo "error in delete cart";
                }
            }
        }
        else 
        {
            echo "error in place order";
        }
    }
    else 
    {
        echo "c_id is not set";
    }
?>